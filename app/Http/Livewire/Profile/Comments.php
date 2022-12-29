<?php

namespace App\Http\Livewire\Profile;

use App\Models\Comment;
use App\Models\Reply;
use Livewire\Component;

class Comments extends Component
{
    public $user;
    public $limitPerPage = 10;
    public $disableLoadMore = false;

    protected $listeners = [
        'loadMore'
    ];

    public function render()
    {
        $comments = $this->loadData();
        return view('livewire.profile.comments', compact('comments'));
    }

    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 6;
    }

    public function loadData()
    {
        $query = Comment::query();
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
