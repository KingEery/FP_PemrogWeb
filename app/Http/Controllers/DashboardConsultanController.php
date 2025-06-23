<?php
// app/Http/Controllers/DashboardConsultanController.php - DIPERBAIKI

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\FreeTrial;
use App\Models\Consultant;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardConsultanController extends Controller
{
    public function dashboard()
    {
        try {
            $consultan = Consultant::first();

            if (!$consultan) {
                $consultan = (object) [
                    'id' => 1,
                    'name' => 'Konsultan Demo',
                    'email' => 'demo@example.com',
                    'rating' => 4.5,
                    'specialty' => 'General Consulting'
                ];
            }

            return view('mentoring.dashboard_consultant', compact('consultan'));

        } catch (\Exception $e) {
            $consultan = (object) [
                'id' => 1,
                'name' => 'Konsultan Demo',
                'email' => 'demo@example.com',
                'rating' => 0,
                'specialty' => 'General Consulting'
            ];

            return view('mentoring.dashboard_consultant', compact('consultan'));
        }
    }

    // PERBAIKAN: Method untuk API bookings
    public function apiBookings(Request $request)
    {
        try {
            $consultan = Consultant::first();

            if (!$consultan) {
                return response()->json([
                    'success' => true,
                    'data' => []
                ]);
            }

            $query = Booking::with(['consultant', 'freeTrial'])
                ->where('consultant_id', $consultan->id);

            // Filter berdasarkan status
            if ($request->has('status') && $request->status !== '') {
                $query->where('status', $request->status);
            }

            // Filter berdasarkan tipe
            if ($request->has('type') && $request->type !== '') {
                $query->where('type', $request->type);
            }

            // Filter berdasarkan tanggal
            if ($request->has('date')) {
                $query->whereDate('booking_date', $request->date);
            }

            // Filter berdasarkan pencarian nama
            if ($request->has('search') && $request->search !== '') {
                $query->where('full_name', 'like', '%' . $request->search . '%');
            }

            $bookings = $query->orderBy('booking_date', 'desc')
                              ->orderBy('booking_time', 'desc')
                              ->get();

            // PERBAIKAN: Format data untuk respons API dengan field yang benar
            $formattedBookings = $bookings->map(function ($booking) {
                return [
                    'id' => $booking->id,
                    'consultant_id' => $booking->consultant_id,
                    'consultant_name' => $booking->consultant->name ?? 'N/A',
                    'full_name' => $booking->full_name, // PERBAIKAN: Gunakan full_name
                    'email' => $booking->email,
                    'phone' => $booking->phone ?? '-',
                    'booking_date' => Carbon::parse($booking->booking_date)->format('d M Y'),
                    'booking_time' => Carbon::parse($booking->booking_time)->format('H:i'),
                    'duration' => $booking->duration ?? 60,
                    'type' => $booking->type,
                    'status' => $booking->status,
                    'amount' => (float) ($booking->amount ?? 0),
                    'topic' => $booking->topic ?? '-',
                    'notes' => $booking->notes ?? '',
                    'meeting_link' => $booking->meeting_link,
                    'is_free_trial' => $booking->free_trial_id ? true : false,
                    'free_trial_title' => $booking->freeTrial->title ?? 'N/A',
                    'created_at' => $booking->created_at->format('d M Y H:i'),
                    'updated_at' => $booking->updated_at->format('d M Y H:i')
                ];
            });

            return response()->json([
                'success' => true,
                'data' => $formattedBookings
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat daftar booking',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // PERBAIKAN: Method untuk memperbarui status booking
    public function updateBookingStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        try {
            $booking = Booking::findOrFail($id);
            $oldStatus = $booking->status;

            // Logika untuk free trial slots
            if ($booking->free_trial_id && $booking->freeTrial) {
                // Jika status berubah dari confirmed/pending ke cancelled
                if (in_array($oldStatus, ['confirmed', 'pending']) && $request->status === 'cancelled') {
                    $booking->freeTrial->decrementUsedSlots();
                }

                // Jika status berubah dari cancelled ke confirmed/pending
                if ($oldStatus === 'cancelled' && in_array($request->status, ['confirmed', 'pending'])) {
                    if (!$booking->freeTrial->hasAvailableSlots()) {
                        return response()->json([
                            'success' => false,
                            'message' => 'Slot free trial sudah penuh.'
                        ], 422);
                    }
                    $booking->freeTrial->incrementUsedSlots();
                }
            }

            $booking->status = $request->status;

            // Update meeting link jika status menjadi 'confirmed' dan belum ada link
            if ($request->status === 'confirmed' && !$booking->meeting_link) {
                $booking->meeting_link = $booking->generateMeetingLink();
            }

            $booking->save();

            return response()->json([
                'success' => true,
                'message' => 'Status booking berhasil diperbarui',
                'data' => $booking->load(['consultant', 'freeTrial'])
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui status booking',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // PERBAIKAN: Method untuk mendapatkan detail booking
    public function getBookingDetail($id)
    {
        try {
            $booking = Booking::with(['consultant', 'freeTrial'])->findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $booking->id,
                    'consultant_id' => $booking->consultant_id,
                    'consultant_name' => $booking->consultant->name ?? 'N/A',
                    'full_name' => $booking->full_name, // PERBAIKAN: Gunakan full_name
                    'email' => $booking->email,
                    'phone' => $booking->phone ?? '-',
                    'booking_date' => Carbon::parse($booking->booking_date)->format('d M Y'),
                    'booking_time' => Carbon::parse($booking->booking_time)->format('H:i'),
                    'duration' => $booking->duration ?? 60,
                    'type' => $booking->type ?? 'paid',
                    'status' => $booking->status,
                    'amount' => (float) ($booking->amount ?? 0),
                    'topic' => $booking->topic ?? '-',
                    'notes' => $booking->notes ?? '',
                    'meeting_link' => $booking->meeting_link,
                    'is_free_trial' => $booking->free_trial_id ? true : false,
                    'free_trial_title' => $booking->freeTrial->title ?? 'N/A',
                    'created_at' => $booking->created_at->format('d M Y H:i'),
                    'updated_at' => $booking->updated_at->format('d M Y H:i')
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Booking tidak ditemukan',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    // Method untuk mendapatkan data chart
    public function chartData(Request $request)
    {
        try {
            $consultan = Consultant::first();

            if (!$consultan) {
                return response()->json(['success' => true, 'data' => ['labels' => [], 'data' => []]]);
            }

            $period = $request->get('period', 'week');
            $labels = [];
            $data = [];

            if ($period === 'week') {
                for ($i = 6; $i >= 0; $i--) {
                    $date = Carbon::now()->subDays($i);
                    $labels[] = $date->format('D, d M');
                    $count = Booking::where('consultant_id', $consultan->id)
                                    ->whereDate('booking_date', $date)
                                    ->where('status', 'completed')
                                    ->count();
                    $data[] = $count;
                }
            } elseif ($period === 'month') {
                for ($i = 29; $i >= 0; $i--) {
                    $date = Carbon::now()->subDays($i);
                    $labels[] = $date->format('d M');
                    $count = Booking::where('consultant_id', $consultan->id)
                                    ->whereDate('booking_date', $date)
                                    ->where('status', 'completed')
                                    ->count();
                    $data[] = $count;
                }
            } elseif ($period === 'year') {
                for ($i = 11; $i >= 0; $i--) {
                    $month = Carbon::now()->subMonths($i);
                    $labels[] = $month->format('M Y');
                    $count = Booking::where('consultant_id', $consultan->id)
                                    ->whereYear('booking_date', $month->year)
                                    ->whereMonth('booking_date', $month->month)
                                    ->where('status', 'completed')
                                    ->count();
                    $data[] = $count;
                }
            }

            return response()->json(['success' => true, 'data' => ['labels' => $labels, 'data' => $data]]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat data chart',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Method untuk mendapatkan statistik
    public function getStats()
    {
        try {
            $consultan = Consultant::first();

            if (!$consultan) {
                return response()->json([
                    'success' => true,
                    'data' => [
                        'total_bookings' => 0,
                        'completed_bookings' => 0,
                        'pending_bookings' => 0,
                        'cancelled_bookings' => 0,
                        'total_revenue' => 0,
                        'free_trials_used' => 0
                    ]
                ]);
            }

            $totalBookings = Booking::where('consultant_id', $consultan->id)->count();
            $completedBookings = Booking::where('consultant_id', $consultan->id)
                                        ->where('status', 'completed')
                                        ->count();
            $pendingBookings = Booking::where('consultant_id', $consultan->id)
                                      ->where('status', 'pending')
                                      ->count();
            $cancelledBookings = Booking::where('consultant_id', $consultan->id)
                                        ->where('status', 'cancelled')
                                        ->count();
            $totalRevenue = Booking::where('consultant_id', $consultan->id)
                                   ->where('status', 'completed')
                                   ->sum('amount');
            $freeTrialsUsed = Booking::where('consultant_id', $consultan->id)
                                     ->where('type', 'free')
                                     ->where('status', 'completed')
                                     ->count();

            return response()->json([
                'success' => true,
                'data' => [
                    'total_bookings' => $totalBookings,
                    'completed_bookings' => $completedBookings,
                    'pending_bookings' => $pendingBookings,
                    'cancelled_bookings' => $cancelledBookings,
                    'total_revenue' => $totalRevenue,
                    'free_trials_used' => $freeTrialsUsed
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat statistik',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
