<?php

namespace App\Http\Livewire;

use App\Models\Discussion;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class Discussions extends Component implements HasForms
{
    use InteractsWithForms;

    public $discussions;
    public $tag;
    public $selectedSort;
    public $q;

    public function mount()
    {
        $this->q = request('q');
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
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                $this->selectedSort = 'Oldest discussions';
                break;
            case 'trending':
                $query->withCount('comments')
                    ->orderBy('comments_count', 'desc')
                    ->orderBy('created_at', 'desc');
                $this->selectedSort = 'Trending discussions (Most commented)';
                break;
            case 'most-liked':
                $query->withCount('likes')
                    ->orderBy('likes_count', 'desc')
                    ->orderBy('created_at', 'desc');
                $this->selectedSort = 'Most liked discussions';
                break;
            case 'latest':
            default:
                $query->orderBy('created_at', 'desc');
                $this->selectedSort = 'Latest discussions';
                break;
        }

        if ($this->q) {
            $query->where(
                fn($query) => $query
                    ->where('name', 'like', '%' . $this->q . '%')
                    ->orWhere('content', 'like', '%' . $this->q . '%')
                    ->orWhereHas('tags', fn($query) => $query->where('name', 'like', '%' . $this->q . '%'))
            );
        }

        $this->discussions = $query->get();
    }
}
