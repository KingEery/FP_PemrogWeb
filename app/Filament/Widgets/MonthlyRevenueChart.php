<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\ChartWidget;

class MonthlyRevenueChart extends ChartWidget
{
    protected static ?string $heading = 'Pendapatan Bulanan';

    protected function getData(): array
    {
        // Get monthly revenue data
        $bookings = Booking::selectRaw('
                MONTH(created_at) as month,
                SUM(amount) as total
            ')
            ->whereBetween('created_at', [
                now()->startOfYear(),
                now()->endOfYear()
            ])
            ->groupBy('month')
            ->get();

        // Prepare data for all 12 months
        $monthlyData = collect(range(1, 12))->map(function ($month) use ($bookings) {
            $booking = $bookings->firstWhere('month', $month);
            return $booking ? ($booking->total / 1000000) : 0; // Convert to millions
        });

        // Month abbreviations in Indonesian
        $monthLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'];

        return [
            'datasets' => [
                [
                    'label' => 'Pendapatan (Juta Rp)',
                    'data' => $monthlyData->toArray(),
                    'backgroundColor' => '#7c3aed',
                    'borderColor' => '#7c3aed',
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $monthLabels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'title' => [
                        'display' => true,
                        'text' => 'Juta Rupiah'
                    ]
                ],
                'x' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Bulan'
                    ]
                ]
            ],
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'top',
                ],
                'tooltip' => [
                    'callbacks' => [
                        'label' => function($context) {
                            return 'Rp ' . number_format($context->raw, 2) . ' juta';
                        }
                    ]
                ]
            ]
        ];
    }
}