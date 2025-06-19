<?php
// app/Http/Controllers/FreeTrialController.php

namespace App\Http\Controllers;

use App\Models\FreeTrial;
use App\Models\Consultan;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FreeTrialController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = FreeTrial::with(['consultan']);

            // Filter by consultant (for consultant dashboard)
            if (Auth::check() && Auth::user()->consultan) {
                $query->where('consultan_id', Auth::user()->consultan->id);
            }

            // Filter by status
            if ($request->has('status')) {
                if ($request->status === 'active') {
                    $query->active();
                } elseif ($request->status === 'inactive') {
                    $query->where('is_active', false);
                } elseif ($request->status === 'expired') {
                    $query->where('valid_until', '<', now());
                }
            }

            // Filter by consultant for admin
            if ($request->has('consultan_id')) {
                $query->where('consultan_id', $request->consultan_id);
            }

            $freeTrials = $query->orderBy('created_at', 'desc')
                ->paginate($request->get('per_page', 15));

            return response()->json([
                'success' => true,
                'data' => $freeTrials
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat data free trial',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'consultan_id' => 'nullable|exists:consultans,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:15|max:120',
            'max_participants' => 'required|integer|min:1|max:100',
            'valid_until' => 'nullable|date|after:today',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'requirements' => 'nullable|string'
        ]);

        try {
            // Set consultant ID if user is consultant
            if (!$validated['consultan_id'] && Auth::check() && Auth::user()->consultan) {
                $validated['consultan_id'] = Auth::user()->consultan->id;
            }

            $freeTrial = FreeTrial::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Free trial berhasil dibuat',
                'data' => $freeTrial->load('consultan')
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat free trial',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $freeTrial = FreeTrial::with(['consultan', 'bookings'])->findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $freeTrial
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Free trial tidak ditemukan'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $freeTrial = FreeTrial::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:15|max:120',
            'max_participants' => 'required|integer|min:1|max:100',
            'valid_until' => 'nullable|date|after:today',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'requirements' => 'nullable|string'
        ]);

        try {
            $freeTrial->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Free trial berhasil diperbarui',
                'data' => $freeTrial->load('consultan')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui free trial',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $freeTrial = FreeTrial::findOrFail($id);

            // Check if there are bookings
            if ($freeTrial->bookings()->exists()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak dapat menghapus free trial yang memiliki booking'
                ], 422);
            }

            $freeTrial->delete();

            return response()->json([
                'success' => true,
                'message' => 'Free trial berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus free trial',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function toggleStatus(Request $request, $id)
    {
        try {
            $freeTrial = FreeTrial::findOrFail($id);
            $freeTrial->update(['is_active' => !$freeTrial->is_active]);

            return response()->json([
                'success' => true,
                'message' => 'Status free trial berhasil diubah',
                'data' => $freeTrial
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengubah status',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function duplicate(Request $request, $id)
    {
        try {
            $original = FreeTrial::findOrFail($id);

            $duplicate = $original->replicate();
            $duplicate->title = $original->title . ' (Copy)';
            $duplicate->used_slots = 0;
            $duplicate->save();

            return response()->json([
                'success' => true,
                'message' => 'Free trial berhasil diduplikasi',
                'data' => $duplicate->load('consultan')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menduplikasi free trial',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getParticipants($id)
    {
        try {
            $freeTrial = FreeTrial::findOrFail($id);
            $participants = $freeTrial->bookings()
                ->with('user')
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $participants
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat data peserta',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function exportParticipants($id)
    {
        try {
            $freeTrial = FreeTrial::with('bookings.user')->findOrFail($id);
            $participants = $freeTrial->bookings;

            $filename = 'participants_' . str_replace(' ', '_', $freeTrial->title) . '_' . date('Y-m-d_His') . '.csv';

            return response()->stream(
                function () use ($participants) {
                    $handle = fopen('php://output', 'w');

                    // Header CSV
                    fputcsv($handle, ['ID', 'Nama', 'Email', 'Telepon', 'Status', 'Tanggal Daftar']);

                    // Data rows
                    foreach ($participants as $participant) {
                        fputcsv($handle, [
                            $participant->id,
                            $participant->full_name,
                            $participant->email,
                            $participant->phone,
                            $participant->status,
                            $participant->created_at->format('Y-m-d H:i:s')
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
                'message' => 'Gagal mengexport data peserta',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getAvailableSlots(Request $request, $id)
    {
        try {
            $freeTrial = FreeTrial::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => [
                    'available_slots' => $freeTrial->available_slots,
                    'max_participants' => $freeTrial->max_participants,
                    'used_slots' => $freeTrial->used_slots,
                    'can_be_claimed' => $freeTrial->canBeClaimed()
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat data slot',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getStatistics()
    {
        try {
            $stats = [
                'total_trials' => FreeTrial::count(),
                'active_trials' => FreeTrial::active()->count(),
                'total_participants' => Booking::whereNotNull('free_trial_id')->count(),
                'completed_trials' => FreeTrial::whereHas('bookings', function($q) {
                    $q->where('status', 'completed');
                })->count(),
                'average_participants' => FreeTrial::avg('used_slots'),
                'upcoming_trials' => FreeTrial::active()
                    ->where('date', '>=', today())
                    ->count()
            ];

            return response()->json([
                'success' => true,
                'data' => $stats
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat statistik',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Public method for claiming free trial
    public function claim(Request $request, $id)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'notes' => 'nullable|string'
        ]);

        DB::beginTransaction();
        try {
            $freeTrial = FreeTrial::findOrFail($id);

            if (!$freeTrial->canBeClaimed()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Free trial tidak tersedia atau sudah penuh'
                ], 422);
            }

            // Create booking
            $booking = Booking::create([
                'user_id' => Auth::id(),
                'consultan_id' => $freeTrial->consultan_id,
                'free_trial_id' => $freeTrial->id,
                'full_name' => $validated['full_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'date' => $freeTrial->date,
                'time' => $freeTrial->time,
                'duration' => $freeTrial->duration,
                'type' => 'free',
                'notes' => $validated['notes'] ?? null,
                'status' => 'confirmed',
                'amount' => 0
            ]);

            // Increment used slots
            $freeTrial->incrementUsedSlots();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Berhasil mendaftar free trial',
                'data' => $booking->load(['consultan', 'freeTrial'])
            ], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Gagal mendaftar free trial',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
