<?php

namespace App\Http\Livewire\Layout\Dialogs;

use App\Models\Comment;
use App\Models\Discussion;
use App\Models\Reply;
use Livewire\Component;

class Likes extends Component
{
    public Discussion|Reply|Comment $model;
    public $likes;

    protected $listeners = [
        'likesUpdated'
    ];

    public function mount()
    {
        $this->initData();
    }

    public function render()
    {
        return view('livewire.layout.dialogs.likes');
    }

    public function likesUpdated(int $id)
    {
        if ($this->model->id == $id) {
            $this->model->refresh();
            $this->initData();
        }
    }

    private function initData()
    {
        $this->likes = $this->model->likes->sortByDesc('created_at');
    }
}
