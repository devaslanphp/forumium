<?php

namespace App\Filament\Widgets;

use App\Models\Discussion;
use App\Models\Like;
use App\Models\Reply;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class LatestLikes extends BaseWidget
{
    protected static ?int $sort = 5;

    protected function getTableQuery(): Builder
    {
        return Like::query()
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
                    } elseif ($record->source_type == Reply::class) {
                        $discussion = $record->source->discussion;
                    } elseif ($record->source->source_type == Discussion::class) {
                        $discussion = $record->source->source;
                    } else {
                        $discussion = $record->source->source->discussion;
                    }
                    return $discussion->name;
                }),
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
                    } elseif ($record->source_type == Reply::class) {
                        $discussion = $record->source->discussion;
                    } elseif ($record->source->source_type == Discussion::class) {
                        $discussion = $record->source->source;
                    } else {
                        $discussion = $record->source->source->discussion;
                    }
                    return route('discussion', [
                        'discussion' => $discussion,
                        'slug' => Str::slug($discussion->name)
                    ]);
                }, true)
        ];
    }
}
