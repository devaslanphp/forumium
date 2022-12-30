<?php

namespace App\Http\Livewire\Profile;

use App\Models\Discussion;
use Livewire\Component;

class Discussions extends Component
{
    public $user;
    public $limitPerPage = 10;
    public $disableLoadMore = false;
    public $follow = null;
    public $totalCount = 0;

    protected $listeners = [
        'loadMore'
    ];

    public function render()
    {
        $discussions = $this->loadData();
        return view('livewire.profile.discussions', compact('discussions'));
    }

    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 6;
    }

    public function loadData()
    {
        $query = Discussion::query();

        if ($this->follow) {
            $query->whereHas('followers', function ($query) {
                return $query->where('followers.user_id', $this->user->id)
                    ->where('type', $this->follow);
            });
        } else {
            $query->where('user_id', $this->user->id);
        }

        $data = $query->paginate($this->limitPerPage);
        if ($data->hasMorePages()) {
            $this->disableLoadMore = false;
        } else {
            $this->disableLoadMore = true;
        }

        $this->totalCount = $data->total();

        return $data;
    }
}
