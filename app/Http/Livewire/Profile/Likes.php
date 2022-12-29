<?php

namespace App\Http\Livewire\Profile;

use App\Models\Like;
use Livewire\Component;

class Likes extends Component
{
    public $user;
    public $limitPerPage = 10;
    public $disableLoadMore = false;

    protected $listeners = [
        'loadMore'
    ];

    public function render()
    {
        $likes = $this->loadData();
        return view('livewire.profile.likes', compact('likes'));
    }

    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 6;
    }

    public function loadData()
    {
        $query = Like::query();
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
