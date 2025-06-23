<?php
// app/Http/Controllers/ConsultantController.php - UPDATED

namespace App\Http\Controllers;

use App\Models\Consultant;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ConsultantController extends Controller
{
    // ✅ Index method untuk API v1
    public function index(Request $request)
    {
        try {
            $query = Consultant::query();

            // Apply filters
            if ($request->has('status') && $request->status !== '') {
                $query->where('is_active', $request->status === 'active');
            }

            if ($request->has('specialty') && $request->specialty !== '') {
                $query->where('specialty', 'like', '%' . $request->specialty . '%');
            }

            $consultants = $query->orderBy('name', 'asc')->get();

            return response()->json([
                'success' => true,
                'message' => 'Data consultant berhasil dimuat',
                'data' => $consultants
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat data consultant',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Public Index - untuk menampilkan daftar consultant
    public function publicIndex(Request $request)
    {
        try {
            $consultants = Consultant::select(
                'id', 
                'name', 
                'email', 
                'specialty', 
                'rating', 
                'hourly_rate as price_per_hour',
                'is_active',
                'bio',
                'phone',
                'profile_image',
                'total_reviews'
            )
                ->when($request->status, function($query, $status) {
                    return $query->where('is_active', $status === 'active');
                })
                ->when($request->specialty, function($query, $specialty) {
                    return $query->where('specialty', 'like', '%' . $specialty . '%');
                })
                ->when($request->specialization, function($query, $specialization) {
                    return $query->where('specialty', 'like', '%' . $specialization . '%');
                })
                ->where('is_active', true)
                ->orderBy('name', 'asc')
                ->get();

            // ✅ Update total mentors di dashboard
            $totalMentors = $consultants->count();

            return response()->json([
                'success' => true,
                'message' => 'Data consultant berhasil dimuat',
                'data' => $consultants,
                'total' => $totalMentors
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat data consultant',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Store - untuk menyimpan consultant baru
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:consultants,email',
                'phone' => 'nullable|string|max:20',
                'bio' => 'nullable|string',
                'specialty' => 'required|string|max:255',
                'rating' => 'nullable|numeric|min:0|max:5',
                'hourly_rate' => 'nullable|numeric|min:0',
                'profile_image' => 'nullable|string',
                'is_active' => 'boolean'
            ]);

            // ✅ Set default values
            $validated['rating'] = $validated['rating'] ?? 5.0;
            $validated['hourly_rate'] = $validated['hourly_rate'] ?? 0;
            $validated['is_active'] = $validated['is_active'] ?? true;
            $validated['total_reviews'] = 0;

            $consultant = Consultant::create($validated);
            
            return response()->json([
                'success' => true,
                'message' => 'Consultant berhasil disimpan',
                'data' => $consultant
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak valid',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan consultant',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Show - untuk menampilkan detail consultant
    public function show($id)
    {
        try {
            $consultant = Consultant::findOrFail($id);
            
            return response()->json([
                'success' => true,
                'data' => $consultant
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Consultant tidak ditemukan',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    // Update - untuk mengupdate consultant
    public function update(Request $request, $id)
    {
        try {
            $consultant = Consultant::findOrFail($id);
            
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:consultants,email,' . $id,
                'phone' => 'nullable|string|max:20',
                'bio' => 'nullable|string',
                'specialty' => 'required|string|max:255',
                'rating' => 'nullable|numeric|min:0|max:5',
                'hourly_rate' => 'nullable|numeric|min:0',
                'profile_image' => 'nullable|string',
                'is_active' => 'boolean'
            ]);

            $consultant->update($validated);
            
            return response()->json([
                'success' => true,
                'message' => 'Consultant berhasil diupdate',
                'data' => $consultant
            ]);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak valid',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengupdate consultant',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Destroy - untuk menghapus consultant
    public function destroy($id)
    {
        try {
            $consultant = Consultant::findOrFail($id);
            $consultant->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Consultant berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus consultant',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Public Show - untuk menampilkan detail consultant di public
    public function publicShow($id)
    {
        try {
            $consultant = Consultant::where('is_active', true)->findOrFail($id);
            
            return response()->json([
                'success' => true,
                'data' => $consultant
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Consultant tidak ditemukan',
                'error' => $e->getMessage()
            ], 404);
        }
    }
}
