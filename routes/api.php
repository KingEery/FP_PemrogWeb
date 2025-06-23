<?php 
// routes/api.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardConsultanController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\FreeTrialController;
use Illuminate\Support\Facades\DB;


// Tambahkan di bagian atas routes/api.php sebelum Route::prefix('v1')
Route::get('/test-stats', function () {
    try {
        // Test database connection
        DB::connection()->getPdo();
        
        // Test model queries
        $consultantCount = App\Models\Consultant::count();
        $bookingCount = App\Models\Booking::count();
        
        return response()->json([
            'database' => 'connected',
            'consultant_count' => $consultantCount,
            'booking_count' => $bookingCount,
            'status' => 'ok'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTraceAsString()
        ], 500);
    }
});


// Public API routes (tidak perlu authentication)
Route::prefix('public')->group(function () {
    // Consultant routes
    Route::get('/consultants', [ConsultantController::class, 'publicIndex']);
    Route::get('/consultants/{id}', [ConsultantController::class, 'publicShow']);
    
    // Free trial routes
    Route::get('/free-trials', [FreeTrialController::class, 'publicIndex']);
    Route::get('/free-trials/{id}', [FreeTrialController::class, 'publicShow']);
    
    // Booking availability
    Route::get('/available-slots', [BookingController::class, 'getAvailableSlots']);
});
// ✅ Dashboard endpoints dengan prefix v1
Route::prefix('v1')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/stats', [DashboardConsultanController::class, 'getStats']);
        Route::get('/bookings', [DashboardConsultanController::class, 'apiBookings']);
        Route::get('/bookings/{id}', [DashboardConsultanController::class, 'getBookingDetail']);
        Route::put('/bookings/{id}/status', [DashboardConsultanController::class, 'updateBookingStatus']);
        Route::get('/chart-data', [DashboardConsultanController::class, 'chartData']);
    });
    
    // ✅ Consultant management endpoints dengan prefix v1
    Route::prefix('consultants')->group(function () {
        Route::get('/', [ConsultantController::class, 'index']);
        Route::post('/', [ConsultantController::class, 'store']);
        Route::get('/{id}', [ConsultantController::class, 'show']);
        Route::put('/{id}', [ConsultantController::class, 'update']);
        Route::delete('/{id}', [ConsultantController::class, 'destroy']);
    });
    
    // ✅ Booking endpoints dengan prefix v1
    Route::prefix('bookings')->group(function () {
        Route::get('/available-slots', [BookingController::class, 'getAvailableSlots']);
        Route::get('/', [BookingController::class, 'index']);
        Route::post('/', [BookingController::class, 'store']);
        Route::get('/{id}', [BookingController::class, 'show']);
        Route::put('/{id}', [BookingController::class, 'update']);
        Route::delete('/{id}', [BookingController::class, 'destroy']);
    });
});

// ✅ Public endpoints (tanpa versioning, untuk akses publik)
Route::prefix('public')->group(function () {
    Route::get('/consultants', [ConsultantController::class, 'publicIndex']);
    Route::get('/consultants/{id}', [ConsultantController::class, 'publicShow']);
    Route::get('/free-trials', [FreeTrialController::class, 'publicIndex']);
    Route::get('/free-trials/{id}', [FreeTrialController::class, 'publicShow']);
});
