<?php
// app/Http/Controllers/BookingController.php - UPDATED untuk web form submission

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Consultant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class BookingController extends Controller
{
    // ✅ Store method untuk web form (dari profil consultant)
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
                'duration' => 'required|integer|min:30|max:180',
                'topic' => 'nullable|string|max:500',
                'notes' => 'nullable|string|max:1000',
                'mentor_id' => 'required|exists:consultants,id',
                'type' => 'required|in:free,paid'
            ]);

            // Map form fields to database fields
            $bookingData = [
                'consultant_id' => $validated['mentor_id'],
                'full_name' => $validated['full_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'booking_date' => $validated['date'],
                'booking_time' => $validated['time'],
                'duration' => $validated['duration'],
                'type' => $validated['type'],
                'topic' => $validated['topic'] ?? '',
                'notes' => $validated['notes'] ?? '',
                'status' => 'pending'
            ];

            // Get consultant untuk calculate amount
            $consultant = Consultant::findOrFail($validated['mentor_id']);
            
            // Calculate amount
            if ($validated['type'] === 'free') {
                $bookingData['amount'] = 0;
                $bookingData['status'] = 'confirmed'; // Free trials auto-confirmed
            } else {
                // Calculate based on hourly rate and duration
                $hourlyRate = $consultant->hourly_rate ?? 150000; // Default rate
                $bookingData['amount'] = ($hourlyRate / 60) * $validated['duration'];
                $bookingData['status'] = 'pending'; // Paid bookings need confirmation
            }

            // Create booking
            $booking = Booking::create($bookingData);

            // Redirect with success message
            return redirect()->back()->with('success', 'Booking berhasil dibuat! Kami akan menghubungi Anda segera.');

        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Data tidak valid. Silakan periksa kembali.');

        } catch (\Exception $e) {
            Log::error('Booking creation failed: ' . $e->getMessage());
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    // ✅ API method untuk dashboard
    public function index(Request $request)
    {
        try {
            $query = Booking::with('consultant');

            // Apply filters
            if ($request->has('status') && $request->status !== '') {
                $query->where('status', $request->status);
            }

            if ($request->has('type') && $request->type !== '') {
                $query->where('type', $request->type);
            }

            $bookings = $query->orderBy('created_at', 'desc')->get();

            // Transform data for API response
            $transformedBookings = $bookings->map(function($booking) {
                return [
                    'id' => $booking->id,
                    'full_name' => $booking->full_name,
                    'email' => $booking->email,
                    'phone' => $booking->phone,
                    'booking_date' => $booking->booking_date,
                    'booking_time' => $booking->booking_time,
                    'duration' => $booking->duration,
                    'type' => $booking->type,
                    'status' => $booking->status,
                    'topic' => $booking->topic,
                    'notes' => $booking->notes,
                    'amount' => $booking->amount,
                    'consultant_name' => $booking->consultant ? $booking->consultant->name : 'Unknown',
                    'consultant_specialty' => $booking->consultant ? $booking->consultant->specialty : '',
                    'created_at' => $booking->created_at->format('Y-m-d H:i:s'),
                    'formatted_date' => $booking->created_at->format('d M Y'),
                    'formatted_time' => $booking->created_at->format('H:i')
                ];
            });

            return response()->json([
                'success' => true,
                'message' => 'Data booking berhasil dimuat',
                'data' => $transformedBookings
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat data booking',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

