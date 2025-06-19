<?php
// app/Http/Controllers/BookingController.php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Consultan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = Booking::with(['user', 'consultan']);

            // Filter by status
            if ($request->has('status')) {
                $query->where('status', $request->status);
            }

            // Filter by date range
            if ($request->has('start_date') && $request->has('end_date')) {
                $query->whereBetween('date', [$request->start_date, $request->end_date]);
            }

            // Filter by type
            if ($request->has('type')) {
                $query->where('type', $request->type);
            }

            $bookings = $query->orderBy('date', 'desc')
                ->orderBy('time', 'desc')
                ->paginate($request->get('per_page', 15));

            return response()->json([
                'success' => true,
                'data' => $bookings
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat data booking',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'consultan_id' => 'required|exists:consultans,id',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'duration' => 'required|integer|min:30|max:120',
            'type' => 'required|in:paid,free',
            'topic' => 'nullable|string|max:255',
            'notes' => 'nullable|string'
        ]);

        DB::beginTransaction();
        try {
            $consultan = Consultan::findOrFail($validated['consultan_id']);

            // Check availability
            $existingBooking = Booking::where('consultan_id', $validated['consultan_id'])
                ->where('date', $validated['date'])
                ->where('time', $validated['time'])
                ->whereIn('status', ['pending', 'confirmed'])
                ->exists();

            if ($existingBooking) {
                return response()->json([
                    'success' => false,
                    'message' => 'Jadwal tidak tersedia'
                ], 422);
            }

            // Calculate amount
            if ($validated['type'] === 'paid') {
                $validated['amount'] = ($consultan->price_per_hour / 60) * $validated['duration'];
            } else {
                $validated['amount'] = 0;
            }

            // Set user_id properly
            $validated['user_id'] = Auth::check() ? Auth::id() : null;
            $validated['status'] = 'pending';

            $booking = Booking::create($validated);

            // Send confirmation email (uncomment when ready)
            // Mail::to($booking->email)->send(new BookingConfirmation($booking));

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Booking berhasil dibuat',
                'data' => $booking->load(['user', 'consultan'])
            ], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat booking',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $booking = Booking::with(['user', 'consultan'])->findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $booking
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Booking tidak ditemukan'
            ], 404);
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled'
        ]);

        try {
            $booking = Booking::findOrFail($id);
            $oldStatus = $booking->status;
            $booking->update(['status' => $validated['status']]);

            // Generate meeting link if confirmed
            if ($validated['status'] === 'confirmed' && !$booking->meeting_link) {
                $booking->update([
                    'meeting_link' => 'https://meet.google.com/xyz-' . uniqid()
                ]);
            }

            // Send notification email based on status change
            // $this->sendStatusNotification($booking, $oldStatus);

            return response()->json([
                'success' => true,
                'message' => 'Status booking berhasil diperbarui',
                'data' => $booking->load(['user', 'consultan'])
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui status booking',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $booking = Booking::findOrFail($id);

            if ($booking->status === 'completed') {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak dapat menghapus booking yang sudah selesai'
                ], 422);
            }

            $booking->delete();

            return response()->json([
                'success' => true,
                'message' => 'Booking berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus booking',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function exportCsv(Request $request)
    {
        try {
            $bookings = Booking::with(['user', 'consultan'])
                ->orderBy('date', 'desc')
                ->get();

            $filename = 'bookings_export_' . date('Y-m-d_His') . '.csv';

            return response()->stream(
                function () use ($bookings) {
                    $handle = fopen('php://output', 'w');

                    // Header CSV
                    fputcsv($handle, ['ID', 'Nama', 'Email', 'Telepon', 'Consultan', 'Tanggal', 'Waktu', 'Durasi', 'Tipe', 'Status', 'Amount', 'Dibuat']);

                    // Data rows
                    foreach ($bookings as $booking) {
                        fputcsv($handle, [
                            $booking->id,
                            $booking->full_name,
                            $booking->email,
                            $booking->phone,
                            $booking->consultan->name ?? '-',
                            $booking->date->format('Y-m-d'),
                            $booking->time,
                            $booking->duration . ' menit',
                            $booking->type,
                            $booking->status,
                            'Rp ' . number_format($booking->amount, 0, ',', '.'),
                            $booking->created_at->format('Y-m-d H:i:s')
                        ]);
                    }

                    fclose($handle);
                },
                200,
                [
                    'Content-Type' => 'text/csv',
                    'Content-Disposition' => 'attachment; filename="' . $filename . '"',
                ]
            );
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengexport data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getAvailableSlots(Request $request)
    {
        $validated = $request->validate([
            'consultan_id' => 'required|exists:consultans,id',
            'date' => 'required|date|after_or_equal:today'
        ]);

        try {
            $bookedSlots = Booking::where('consultan_id', $validated['consultan_id'])
                ->where('date', $validated['date'])
                ->whereIn('status', ['pending', 'confirmed'])
                ->pluck('time')
                ->map(function ($time) {
                    return Carbon::parse($time)->format('H:i');
                })
                ->toArray();

            $availableSlots = [];
            $startTime = Carbon::parse('09:00');
            $endTime = Carbon::parse('17:00');

            while ($startTime < $endTime) {
                $timeSlot = $startTime->format('H:i');
                if (!in_array($timeSlot, $bookedSlots)) {
                    $availableSlots[] = $timeSlot;
                }
                $startTime->addHour();
            }

            return response()->json([
                'success' => true,
                'data' => $availableSlots
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat slot waktu',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
