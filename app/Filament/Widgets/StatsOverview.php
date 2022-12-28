<?php

namespace App\Filament\Widgets;

use App\Models\Comment;
use App\Models\Discussion;
use App\Models\Like;
use App\Models\Reply;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getCards(): array
    {
        return [
            Card::make('Discussions', Discussion::count())
                ->descriptionIcon('heroicon-o-view-list')
                ->description('Total discussions created')
                ->color('primary'),

            Card::make('Replies', Reply::count())
                ->descriptionIcon('heroicon-o-chat-alt')
                ->description('Total replies done')
                ->color('warning'),

            Card::make('Comments', Comment::count())
                ->descriptionIcon('heroicon-o-chat-alt-2')
                ->description('Total comments added')
                ->color('danger'),

            Card::make('Likes', Like::count())
                ->descriptionIcon('heroicon-o-thumb-up')
                ->description('Total likes registered')
                ->color('success'),
        ];
    }
}
