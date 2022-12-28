<?php

namespace App\Filament\Widgets;

use App\Models\Reply;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class LatestReplies extends BaseWidget
{
    protected static ?int $sort = 3;

    protected function getTableQuery(): Builder
    {
        return Reply::query()
            ->withCount('comments')
            ->withCount('likes')
            ->with(['discussion', 'user'])
            ->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('user.name')
                ->label('User'),

            Tables\Columns\TextColumn::make('discussion.name')
                ->label('Discussion'),

            Tables\Columns\TextColumn::make('comments_count')
                ->label('Comments'),

            Tables\Columns\TextColumn::make('likes_count')
                ->label('Likes')
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('view')
                ->label('View')
                ->icon('heroicon-s-eye')
                ->color('secondary')
                ->url(fn ($record) => route('discussion', [
                    'discussion' => $record->discussion,
                    'slug' => Str::slug($record->discussion->name)
                ]), true)
        ];
    }
}
