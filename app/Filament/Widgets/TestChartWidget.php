<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;

class TestChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $data = Trend::model(User::class)
            ->between(start: now()->subMonths(6), end: now())
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'New Users',
                    'data' => $data->map(fn ($item) => $item->aggregate),
                    'backgroundColor' => '#4CAF50',
                ],
            ],
            'labels' => $data->map(fn ($item) => $item->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
