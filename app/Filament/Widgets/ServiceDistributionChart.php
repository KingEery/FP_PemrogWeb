<?php

namespace App\Filament\Widgets;

use App\Models\Consultant;
use Filament\Widgets\ChartWidget;

class ServiceDistributionChart extends ChartWidget
{
    protected static ?string $heading = 'Distribusi Layanan';

    protected function getData(): array
    {
        $specialties = Consultant::select('specialty')
            ->selectRaw('count(*) as count')
            ->groupBy('specialty')
            ->get();

        return [
            'labels' => $specialties->pluck('specialty'),
            'datasets' => [
                [
                    'label' => 'Jumlah Mentor',
                    'data' => $specialties->pluck('count'),
                    'backgroundColor' => [
                        '#7c3aed', '#5b21b6', '#4c1d95', '#3730a3', '#312e81', '#1e40af', '#1e3a8a'
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}