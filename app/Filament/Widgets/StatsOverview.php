<?php

namespace App\Filament\Widgets;

use App\Models\Consultant;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Mentor', Consultant::count())
                ->icon('heroicon-o-user-group')
                ->color('primary'),
            Stat::make('Mentor Aktif', Consultant::where('is_active', true)->count())
                ->icon('heroicon-o-check-circle')
                ->color('success'),
            Stat::make('Mentor Non-Aktif', Consultant::where('is_active', false)->count())
                ->icon('heroicon-o-x-circle')
                ->color('danger'),
        ];
    }
}