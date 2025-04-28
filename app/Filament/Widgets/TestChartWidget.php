<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Flowframe\Trend\Trend;

class TestChartWidget extends ChartWidget
{
    use InteractsWithPageFilters;
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $startDate = $this->filters['startDate'];
        $endDate = $this->filters['endDate'];

        $data = Trend::model(User::class)
            ->between(start: $startDate ? Carbon::parse($startDate) : now()->subMonths(6), end: $endDate ? Carbon::parse($endDate) : now())
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
