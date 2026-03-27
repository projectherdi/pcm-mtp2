<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PostStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Berita', Post::count())
                ->description('Total berita saat ini')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('success'),
        ];
    }
}