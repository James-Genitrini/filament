<?php

namespace App\Filament\Widgets;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TestWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('New Users', User::count())
                ->description('New users in the last 30 days')
                ->color('success')
                ->icon('heroicon-o-user')
                ->chart([1,3,5,10,20,50]),
            Stat::make('New Posts', Post::count())
                ->description('New posts in the last 30 days')
                ->color('success')
                ->icon('heroicon-o-document')
                ->chart([1,3,5,10,20,32, 48]),
            Stat::make('New Comments', Comment::count())
                ->description('New comments in the last 30 days')
                ->color('success')
                ->icon('heroicon-o-chat-bubble-bottom-center')
                ->chart([1,3,5,10,20,23, 100, 47])
        ];
    }
}
