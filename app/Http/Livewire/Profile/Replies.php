<?php

namespace App\Http\Livewire\Profile;

use App\Models\Discussion;
use App\Models\Reply;
use Livewire\Component;

class Replies extends Component
{
    public $user;
    private $limitPerPage = 10;
    public $disableLoadMore = false;

    protected $listeners = [
        'loadMore'
    ];

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        $replies = $this->loadData();
        return view('livewire.profile.replies', compact('replies'));
    }

    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 6;
    }

    public function loadData()
    {
        $query = Reply::query();
        $query->where('user_id', $this->user->id);

        $data = $query->paginate($this->limitPerPage);
        if ($data->hasMorePages()) {
            $this->disableLoadMore = false;
        } else {
            $this->disableLoadMore = true;
        }

        return $data;
    }
}
