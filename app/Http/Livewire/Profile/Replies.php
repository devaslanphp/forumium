<?php

namespace App\Http\Livewire\Profile;

use App\Models\Reply;
use Livewire\Component;

class Replies extends Component
{
    public $user;
    public $limitPerPage = 10;
    public $disableLoadMore = false;

    public bool $isBest = false;

    protected $listeners = [
        'loadMore'
    ];

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

        if ($this->isBest) {
            $query->where('is_best', true);
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
