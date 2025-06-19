<?php
// app/Http/Controllers/DashboardConsultanController.php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\FreeTrial;
use App\Models\Consultan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardConsultanController extends Controller
{
    public function dashboard()
    {
        try {
            // Ambil data konsultan pertama sebagai contoh (atau buat logika sesuai kebutuhan)
            $consultan = Consultan::first();

            // Jika tidak ada data konsultan, buat data dummy atau tampilkan pesan
            if (!$consultan) {
                // Anda bisa membuat data dummy atau menampilkan view dengan pesan
                $consultan = (object) [
                    'id' => 1,
                    'name' => 'Konsultan Demo',
                    'email' => 'demo@example.com',
                    'rating' => 4.5,
                    'specialization' => 'General Consulting'
                ];
            }

            return view('mentoring.dashboard_consultant', compact('consultan'));

        } catch (\Exception $e) {
            // Jika terjadi error, tetap tampilkan dashboard dengan data kosong
            $consultan = (object) [
                'id' => 1,
                'name' => 'Konsultan Demo',
                'email' => 'demo@example.com',
                'rating' => 0,
                'specialization' => 'General Consulting'
            ];

            return view('mentoring.dashboard_consultant', compact('consultan'));
        }
    }

    public function getStats()
    {
        try {
            // Ambil konsultan pertama atau gunakan ID tertentu
            $consultan = Consultan::first();

            if (!$consultan) {
                // Return data dummy jika tidak ada konsultan
                $stats = [
                    'total_bookings' => 0,
                    'pending_bookings' => 0,
                    'completed_bookings' => 0,
                    'cancelled_bookings' => 0,
                    'total_revenue' => 0,
                    'average_rating' => 0,
                    'active_free_trials' => 0,
                    'total_free_trial_participants' => 0,
                    'this_month_bookings' => 0,
                    'this_month_revenue' => 0
                ];
            } else {
                $stats = [
                    'total_bookings' => $consultan->bookings()->count(),
                    'pending_bookings' => $consultan->bookings()->where('status', 'pending')->count(),
                    'completed_bookings' => $consultan->bookings()->where('status', 'completed')->count(),
                    'cancelled_bookings' => $consultan->bookings()->where('status', 'cancelled')->count(),
                    'total_revenue' => $consultan->bookings()->where('status', 'completed')->sum('amount'),
                    'average_rating' => $consultan->rating ?? 0,
                    'active_free_trials' => $consultan->freeTrials()->active()->count(),
                    'total_free_trial_participants' => $consultan->freeTrials()->sum('used_slots'),
                    'this_month_bookings' => $consultan->bookings()
                        ->whereMonth('created_at', now()->month)
                        ->whereYear('created_at', now()->year)
                        ->count(),
                    'this_month_revenue' => $consultan->bookings()
                        ->where('status', 'completed')
                        ->whereMonth('created_at', now()->month)
                        ->whereYear('created_at', now()->year)
                        ->sum('amount')
                ];
            }

            return response()->json([
                'success' => true,
                'data' => $stats
            ]);
        } catch (\Exception $e) {
            // Return data dummy jika terjadi error
            $stats = [
                'total_bookings' => 0,
                'pending_bookings' => 0,
                'completed_bookings' => 0,
                'cancelled_bookings' => 0,
                'total_revenue' => 0,
                'average_rating' => 0,
                'active_free_trials' => 0,
                'total_free_trial_participants' => 0,
                'this_month_bookings' => 0,
                'this_month_revenue' => 0
            ];

            return response()->json([
                'success' => true,
                'data' => $stats
            ]);
        }
    }

    public function chartData(Request $request)
    {
        try {
            $consultan = Consultan::first();
            $period = $request->get('period', 'monthly');

            if (!$consultan) {
                // Return data dummy untuk chart
                return response()->json([
                    'success' => true,
                    'data' => [
                        'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        'bookings' => [0, 0, 0, 0, 0, 0],
                        'revenue' => [0, 0, 0, 0, 0, 0]
                    ]
                ]);
            }

            switch ($period) {
                case 'daily':
                    $chartData = $this->getDailyChartData($consultan);
                    break;
                case 'weekly':
                    $chartData = $this->getWeeklyChartData($consultan);
                    break;
                case 'yearly':
                    $chartData = $this->getYearlyChartData($consultan);
                    break;
                default:
                    $chartData = $this->getMonthlyChartData($consultan);
                    break;
            }

            return response()->json([
                'success' => true,
                'data' => $chartData
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => true,
                'data' => [
                    'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    'bookings' => [0, 0, 0, 0, 0, 0],
                    'revenue' => [0, 0, 0, 0, 0, 0]
                ]
            ]);
        }
    }

    private function getDailyChartData($consultan)
    {
        $days = [];
        $bookings = [];
        $revenue = [];

        // Get data for last 30 days
        for ($i = 29; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $dayBookings = $consultan->bookings()
                ->whereDate('created_at', $date->format('Y-m-d'))
                ->count();

            $dayRevenue = $consultan->bookings()
                ->where('status', 'completed')
                ->whereDate('created_at', $date->format('Y-m-d'))
                ->sum('amount');

            $days[] = $date->format('M d');
            $bookings[] = $dayBookings;
            $revenue[] = $dayRevenue;
        }

        return [
            'labels' => $days,
            'bookings' => $bookings,
            'revenue' => $revenue
        ];
    }

    private function getWeeklyChartData($consultan)
    {
        $weeks = [];
        $bookings = [];
        $revenue = [];

        // Get data for last 12 weeks
        for ($i = 11; $i >= 0; $i--) {
            $startOfWeek = Carbon::now()->subWeeks($i)->startOfWeek();
            $endOfWeek = Carbon::now()->subWeeks($i)->endOfWeek();

            $weekBookings = $consultan->bookings()
                ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->count();

            $weekRevenue = $consultan->bookings()
                ->where('status', 'completed')
                ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->sum('amount');

            $weeks[] = 'Week ' . $startOfWeek->format('M d');
            $bookings[] = $weekBookings;
            $revenue[] = $weekRevenue;
        }

        return [
            'labels' => $weeks,
            'bookings' => $bookings,
            'revenue' => $revenue
        ];
    }

    private function getMonthlyChartData($consultan)
    {
        $months = [];
        $bookings = [];
        $revenue = [];

        // Get data for last 12 months
        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);

            $monthBookings = $consultan->bookings()
                ->whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();

            $monthRevenue = $consultan->bookings()
                ->where('status', 'completed')
                ->whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->sum('amount');

            $months[] = $month->format('M Y');
            $bookings[] = $monthBookings;
            $revenue[] = $monthRevenue;
        }

        return [
            'labels' => $months,
            'bookings' => $bookings,
            'revenue' => $revenue
        ];
    }

    private function getYearlyChartData($consultan)
    {
        $years = [];
        $bookings = [];
        $revenue = [];

        // Get data for last 5 years
        for ($i = 4; $i >= 0; $i--) {
            $year = Carbon::now()->subYears($i)->year;

            $yearBookings = $consultan->bookings()
                ->whereYear('created_at', $year)
                ->count();

            $yearRevenue = $consultan->bookings()
                ->where('status', 'completed')
                ->whereYear('created_at', $year)
                ->sum('amount');

            $years[] = $year;
            $bookings[] = $yearBookings;
            $revenue[] = $yearRevenue;
        }

        return [
            'labels' => $years,
            'bookings' => $bookings,
            'revenue' => $revenue
        ];
    }

    public function recentBookings()
    {
        try {
            $consultan = Consultan::first();

            if (!$consultan) {
                return response()->json([
                    'success' => true,
                    'data' => []
                ]);
            }

            $recentBookings = $consultan->bookings()
                ->with(['user', 'service'])
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get()
                ->map(function ($booking) {
                    return [
                        'id' => $booking->id,
                        'user_name' => $booking->user->name ?? 'Unknown User',
                        'service_name' => $booking->service->name ?? 'N/A',
                        'date' => $booking->booking_date,
                        'time' => $booking->booking_time,
                        'status' => $booking->status,
                        'amount' => $booking->amount,
                        'created_at' => $booking->created_at->format('d M Y H:i')
                    ];
                });

            return response()->json([
                'success' => true,
                'data' => $recentBookings
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => true,
                'data' => []
            ]);
        }
    }

    public function upcomingBookings()
    {
        try {
            $consultan = Consultan::first();

            if (!$consultan) {
                return response()->json([
                    'success' => true,
                    'data' => []
                ]);
            }

            $upcomingBookings = $consultan->bookings()
                ->with(['user', 'service'])
                ->where('status', 'confirmed')
                ->where('booking_date', '>=', now()->format('Y-m-d'))
                ->orderBy('booking_date', 'asc')
                ->orderBy('booking_time', 'asc')
                ->limit(10)
                ->get()
                ->map(function ($booking) {
                    return [
                        'id' => $booking->id,
                        'user_name' => $booking->user->name ?? 'Unknown User',
                        'service_name' => $booking->service->name ?? 'N/A',
                        'date' => $booking->booking_date,
                        'time' => $booking->booking_time,
                        'status' => $booking->status,
                        'amount' => $booking->amount
                    ];
                });

            return response()->json([
                'success' => true,
                'data' => $upcomingBookings
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => true,
                'data' => []
            ]);
        }
    }

    public function freeTrialStats()
    {
        try {
            $consultan = Consultan::first();

            if (!$consultan) {
                $freeTrialStats = [
                    'total_free_trials' => 0,
                    'active_free_trials' => 0,
                    'completed_free_trials' => 0,
                    'total_participants' => 0,
                    'conversion_rate' => 0
                ];
            } else {
                $freeTrialStats = [
                    'total_free_trials' => $consultan->freeTrials()->count(),
                    'active_free_trials' => $consultan->freeTrials()->active()->count(),
                    'completed_free_trials' => $consultan->freeTrials()->completed()->count(),
                    'total_participants' => $consultan->freeTrials()->sum('used_slots'),
                    'conversion_rate' => $this->calculateConversionRate($consultan)
                ];
            }

            return response()->json([
                'success' => true,
                'data' => $freeTrialStats
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => true,
                'data' => [
                    'total_free_trials' => 0,
                    'active_free_trials' => 0,
                    'completed_free_trials' => 0,
                    'total_participants' => 0,
                    'conversion_rate' => 0
                ]
            ]);
        }
    }

    private function calculateConversionRate($consultan)
    {
        $totalFreeTrialParticipants = $consultan->freeTrials()->sum('used_slots');
        $convertedBookings = $consultan->bookings()
            ->where('is_from_free_trial', true)
            ->count();

        if ($totalFreeTrialParticipants == 0) {
            return 0;
        }

        return round(($convertedBookings / $totalFreeTrialParticipants) * 100, 2);
    }

    public function topServices()
    {
        try {
            $consultan = Consultan::first();

            if (!$consultan) {
                return response()->json([
                    'success' => true,
                    'data' => []
                ]);
            }

            $topServices = $consultan->bookings()
                ->select('service_id', DB::raw('COUNT(*) as booking_count'), DB::raw('SUM(amount) as total_revenue'))
                ->with('service')
                ->groupBy('service_id')
                ->orderBy('booking_count', 'desc')
                ->limit(5)
                ->get()
                ->map(function ($booking) {
                    return [
                        'service_name' => $booking->service->name ?? 'N/A',
                        'booking_count' => $booking->booking_count,
                        'total_revenue' => $booking->total_revenue
                    ];
                });

            return response()->json([
                'success' => true,
                'data' => $topServices
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => true,
                'data' => []
            ]);
        }
    }
}
