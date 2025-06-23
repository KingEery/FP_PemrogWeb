<?php
// app/Http/Controllers/FreeTrialController.php - NEW

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Consultant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class FreeTrialController extends Controller
{
    // ✅ Store method untuk free trial form
    public function store(Request $request)
    {
        try {
            // Validate input
            $validated = $request->validate([
                'full_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'date' => 'required|date|after_or_equal:today',
                'time' => 'required|string',
                'notes' => 'required|string|max:1000',
                'mentor_id' => 'required|exists:consultants,id',
                'duration' => 'nullable|integer',
                'type' => 'nullable|string'
            ]);

            // Create booking record for free trial
            $bookingData = [
                'consultant_id' => $validated['mentor_id'],
                'full_name' => $validated['full_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'booking_date' => $validated['date'],
                'booking_time' => $validated['time'],
                'duration' => $validated['duration'] ?? 30, // Default 30 minutes
                'type' => 'free',
                'topic' => 'Free Trial Consultation',
                'notes' => $validated['notes'],
                'amount' => 0,
                'status' => 'confirmed' // Free trials are auto-confirmed
            ];

            // Create booking
            $booking = Booking::create($bookingData);

            // Redirect with success message
            return redirect()->back()->with('success', 'Free trial berhasil didaftarkan! Kami akan menghubungi Anda segera.');

        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Data tidak valid. Silakan periksa kembali.');

        } catch (\Exception $e) {
            Log::error('Free trial creation failed: ' . $e->getMessage());
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    // ✅ API methods untuk dashboard
    public function index(Request $request)
    {
        try {
            $freeTrials = Booking::with('consultant')
                ->where('type', 'free')
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Data free trial berhasil dimuat',
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
}
