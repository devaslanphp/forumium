<?php

namespace App\Http\Livewire\Discussion;

use App\Models\Discussion;
use App\Models\Reply;
use Livewire\Component;

class Replies extends Component
{
    public Discussion $discussion;
    public Reply|null $selectedReply = null;
    public $limitPerPage = 10;
    public $disableLoadMore = false;
    public $onlyBest = false;
    public $onlyBestEnabled = false;

    protected $listeners = [
        'replyAdded' => 'updateReplies',
        'replyUpdated' => 'updateReplies',
        'replyDeleted' => 'updateReplies',
        'discussionEdited' => 'updateReplies'
    ];

    public function mount(): void
    {
        $this->onlyBestEnabled = $this->discussion->replies()->where('is_best', true)->count() > 0;
    }

    public function render()
    {
        $replies = $this->loadData();
        return view('livewire.discussion.replies', compact('replies'));
    }

    public function updateReplies(): void
    {
        $this->replies = $this->discussion->replies()->get();
        $this->selectedReply = null;
    }

    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 6;
    }

    public function loadData()
    {
        $query = Reply::query();
        $query->where('discussion_id', $this->discussion->id);

        if ($this->onlyBest) {
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

    public function toggleOnlyBest(): void
    {
        $this->onlyBest = !$this->onlyBest;
    }
}
