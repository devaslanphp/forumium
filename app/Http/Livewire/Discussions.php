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

    private $limitPerPage = 10;
    public $disableLoadMore = false;
    public $tag;
    public $selectedSort;
    public $q;

    protected $listeners = [
        'loadMore'
    ];

    public function mount()
    {
        $this->q = request('q');
        $this->form->fill([
            'sort' => 'latest'
        ]);
    }

    public function render()
    {
        $discussions = $this->loadData();
        return view('livewire.discussions', compact('discussions'));
    }

    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 6;
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

    public function loadData()
    {
        $data = $this->form->getState();
        $sort = $data['sort'] ?? 'latest';

        $query = Discussion::query();

        if (!auth()->user() || !auth()->user()->hasVerifiedEmail()) {
            $query->where('is_public', true);
        }

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

        $data = $query->paginate($this->limitPerPage);
        if ($data->hasMorePages()) {
            $this->disableLoadMore = false;
        } else {
            $this->disableLoadMore = true;
        }

        return $data;
    }
}
