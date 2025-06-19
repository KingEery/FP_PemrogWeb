<?php
// app/Http/Controllers/ConsultanController.php

namespace App\Http\Controllers;

use App\Models\Consultan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ConsultanController extends Controller
{
    public function index()
    {
        try {
            $consultans = Consultan::with('user')
                ->active()
                ->get();

            return response()->json([
                'success' => true,
                'data' => $consultans
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat data consultan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:consultans,email',
            'phone' => 'nullable|string|max:20',
            'position' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'specialty' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'experience' => 'nullable|integer|min:0',
            'rating' => 'nullable|numeric|min:0|max:5',
            'price_per_hour' => 'nullable|numeric|min:0',
            'photo_profile' => 'nullable|image|max:2048'
        ]);

        DB::beginTransaction();
        try {
            // Create user account
            $user = \App\Models\User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt('defaultpassword'), // Should be changed on first login
                'email_verified_at' => now()
            ]);

            // Handle photo upload
            if ($request->hasFile('photo_profile')) {
                $path = $request->file('photo_profile')->store('consultans/photos', 'public');
                $validated['photo_profile'] = $path;
            }

            $validated['user_id'] = $user->id;
            $consultan = Consultan::create($validated);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Consultan berhasil ditambahkan',
                'data' => $consultan->load('user')
            ], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan consultan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $consultan = Consultan::with(['user', 'bookings'])->findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $consultan
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Consultan tidak ditemukan'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $consultan = Consultan::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:consultans,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'position' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'specialty' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'experience' => 'nullable|integer|min:0',
            'rating' => 'nullable|numeric|min:0|max:5',
            'price_per_hour' => 'nullable|numeric|min:0',
            'photo_profile' => 'nullable|image|max:2048'
        ]);

        DB::beginTransaction();
        try {
            // Handle photo upload
            if ($request->hasFile('photo_profile')) {
                // Delete old photo
                if ($consultan->photo_profile) {
                    Storage::disk('public')->delete($consultan->photo_profile);
                }
                $path = $request->file('photo_profile')->store('consultans/photos', 'public');
                $validated['photo_profile'] = $path;
            }

            $consultan->update($validated);

            // Update user data
            $consultan->user->update([
                'name' => $validated['name'],
                'email' => $validated['email']
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Consultan berhasil diperbarui',
                'data' => $consultan->load('user')
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui consultan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $consultan = Consultan::findOrFail($id);

        DB::beginTransaction();
        try {
            // Delete photo if exists
            if ($consultan->photo_profile) {
                Storage::disk('public')->delete($consultan->photo_profile);
            }

            // Delete consultan (will cascade to bookings)
            $consultan->delete();

            // Delete user account
            $consultan->user->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Consultan berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus consultan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function statistics()
    {
        try {
            $stats = [
                'total_consultans' => Consultan::count(),
                'active_consultans' => Consultan::active()->count(),
                'total_bookings' => \App\Models\Booking::count(),
                'completed_bookings' => \App\Models\Booking::completed()->count(),
                'total_revenue' => \App\Models\Booking::where('status', 'completed')->sum('amount'),
                'average_rating' => Consultan::avg('rating')
            ];

            return response()->json([
                'success' => true,
                'data' => $stats
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat statistik'
            ], 500);
        }
    }
}
