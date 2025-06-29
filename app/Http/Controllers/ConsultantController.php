<?php
// app/Http/Controllers/ConsultantController.php - UPDATED

namespace App\Http\Controllers;

use App\Models\Consultant;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ConsultantController extends Controller
{
    public function show($id = null)
    {
        try {
            if (!$id) {
                $consultant = Consultant::where('is_active', true)->first();
            } else {
                $consultant = Consultant::where('is_active', true)->findOrFail($id);
            }

            if (!$consultant) {
                return redirect()->back()->with('error', 'Consultant tidak ditemukan');
            }

            return view('mentoring.profil_consultan', compact('consultant'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Consultant tidak ditemukan');
        }
    }

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
                'total_reviews',
                'position',
                'company',
                'location'
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

    public function getAllConsultants()
    {
        try {
            $consultants = Consultant::active()
                ->select('id', 'name', 'specialty', 'rating', 'profile_image', 'position', 'company')
                ->orderBy('rating', 'desc')
                ->orderBy('name', 'asc')
                ->get();

            return response()->json([
                'success' => true,
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
}