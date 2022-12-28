<?php

namespace App\Filament\Widgets;

use App\Models\Comment;
use App\Models\Discussion;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class LatestComments extends BaseWidget
{
    protected static ?int $sort = 4;

    protected function getTableQuery(): Builder
    {
        return Comment::query()
            ->withCount('likes')
            ->with(['user'])
            ->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('user.name')
                ->label('User'),

            Tables\Columns\TextColumn::make('source')
                ->label('Discussion')
                ->formatStateUsing(function ($record) {
                    if ($record->source_type == Discussion::class) {
                        $discussion = $record->source;
                    } else {
                        $discussion = $record->source->discussion;
                    }
                    return $discussion->name;
                }),

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
                ->url(function ($record) {
                    if ($record->source_type == Discussion::class) {
                        $discussion = $record->source;
                    } else {
                        $discussion = $record->source->discussion;
                    }
                    return route('discussion', [
                        'discussion' => $discussion,
                        'slug' => Str::slug($discussion->name)
                    ]);
                }, true)
        ];
    }
}
