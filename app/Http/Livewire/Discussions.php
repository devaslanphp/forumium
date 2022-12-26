<?php

namespace App\Http\Livewire;

use App\Models\Discussion;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Filament\Forms\Contracts\HasForms;

class Discussions extends Component implements HasForms
{
    use InteractsWithForms;

    public $discussions;
    public $tag;

    public function mount()
    {
        $this->form->fill([
            'sort' => 'latest'
        ]);
        $this->loadData();
    }

    public function render()
    {
        return view('livewire.discussions');
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make()
                ->columns(12)
                ->schema([
                    Select::make('sort')
                        ->disableLabel()
                        ->disablePlaceholderSelection()
                        ->options([
                            'latest' => 'Latest',
                            'oldest' => 'Oldest',
                            'trending' => 'Trending',
                            'most-liked' => 'Most liked',
                        ])
                        ->columnSpan([
                            12,
                            'lg' => 3
                        ])
                        ->reactive()
                        ->afterStateUpdated(function () {
                            $this->loadData();
                        })
                        ->extraAttributes([
                            'class' => 'disabled:bg-slate-100'
                        ])
                ])
        ];
    }

    public function loadData(): void
    {
        $data = $this->form->getState();
        $sort = $data['sort'] ?? 'latest';

        $query = Discussion::query();

        if ($this->tag) {
            $query->whereHas('tags', function ($query) {
                return $query->where('tags.id', $this->tag);
            });
        }

        switch ($sort) {
            case 'latest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'trending':
                $query->withCount('comments')
                    ->orderBy('comments_count', 'desc')
                    ->orderBy('created_at', 'desc');
                break;
            case 'most-liked':
                $query->withCount('likes')
                    ->orderBy('likes_count', 'desc')
                    ->orderBy('created_at', 'desc');
                break;
        }

        if (request('q')) {
            $query->where(
                fn($query) => $query
                    ->where('name', 'like', '%' . request('q') . '%')
                    ->orWhere('content', 'like', '%' . request('q') . '%')
            );
        }

        $this->discussions = $query->get();
    }
}