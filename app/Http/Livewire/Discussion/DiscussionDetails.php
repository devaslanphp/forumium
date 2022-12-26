<?php

namespace App\Http\Livewire\Discussion;

use App\Models\Comment;
use App\Models\Discussion;
use App\Models\Like;
use Filament\Facades\Filament;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Livewire\Component;

class DiscussionDetails extends Component implements HasForms
{
    use InteractsWithForms;

    public Discussion $discussion;
    public int $likes = 0;
    public int $comments = 0;
    public bool $showComments = false;
    public Comment|null $comment = null;
    public bool $edit = false;

    protected $listeners = [
        'commentSaved',
        'doDeleteComment',
        'discussionEdited',
        'updateDiscussionCanceled',
        'doDeleteDiscussion'
    ];

    public function mount(): void
    {
        $this->form->fill();
        $this->initDetails();
    }

    public function render()
    {
        if (!$this->discussion) {
            $this->skipRender();
        }
        return view('livewire.discussion.discussion-details');
    }

    protected function getFormSchema(): array
    {
        return [
            Textarea::make('content')
                ->label('Comment content')
                ->required()
                ->rows(2)
                ->placeholder('Type your comment here...')
                ->helperText('You can write a comment containing up to 300 characters.')
                ->maxLength(300)
        ];
    }

    public function addComment(): void
    {
        $this->comment = new Comment();
        $this->form->fill();
    }

    public function editComment(Comment $comment): void
    {
        $this->comment = $comment;
        $this->form->fill([
            'content' => $comment->content
        ]);
    }

    public function cancelComment(): void
    {
        $this->comment = null;
        $this->form->fill();
    }

    public function deleteComment(int $comment): void
    {
        Notification::make()
            ->warning()
            ->title('Delete confirmation')
            ->body('Are you sure you want to delete this comment?')
            ->actions([
                Action::make('confirm')
                    ->label('Confirm')
                    ->color('danger')
                    ->button()
                    ->close()
                    ->emit('doDeleteComment', ['comment' => $comment]),

                Action::make('cancel')
                    ->label('Cancel')
                    ->close()
            ])
            ->persistent()
            ->send();
    }

    public function doDeleteComment(int $comment): void
    {
        Comment::where('id', $comment)->delete();
        $this->emit('commentSaved');
    }

    public function saveComment(): void
    {
        $data = $this->form->getState();
        $this->comment->content = $data['content'];
        if (!$this->comment->id) {
            $this->comment->user_id = auth()->user()->id;
            $this->comment->source_id = $this->discussion->id;
            $this->comment->source_type = Discussion::class;
        }
        $this->comment->save();
        $this->emit('commentSaved');
        Filament::notify('success', 'Comment successfully saved.');
    }

    public function commentSaved(): void
    {
        $this->cancelComment();
        $this->discussion->refresh();
        $this->initDetails();
    }

    private function initDetails(): void
    {
        $this->likes = $this->discussion->likes()->count();
        $this->comments = $this->discussion->comments()->count();
    }

    public function toggleLike(): void
    {
        $like = Like::where('user_id', auth()->user()->id)->where('source_id', $this->discussion->id)->where('source_type', Discussion::class)->first();
        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'user_id' => auth()->user()->id,
                'source_id' => $this->discussion->id,
                'source_type' => Discussion::class
            ]);
        }
        $this->discussion->refresh();
        $this->initDetails();
    }

    public function toggleCommentLike(int $comment): void
    {
        $like = Like::where('user_id', auth()->user()->id)->where('source_id', $comment)->where('source_type', Comment::class)->first();
        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'user_id' => auth()->user()->id,
                'source_id' => $comment,
                'source_type' => Comment::class
            ]);
        }
        $this->discussion->refresh();
    }

    public function toggleComments(): void
    {
        $this->showComments = !$this->showComments;
    }

    public function editDiscussion(): void
    {
        $this->edit = true;
    }

    public function discussionEdited(): void
    {
        $this->discussion->refresh();
        $this->edit = false;
    }

    public function updateDiscussionCanceled(): void
    {
        $this->edit = false;
    }

    public function deleteDiscussion(): void
    {
        Notification::make()
            ->warning()
            ->title('Delete confirmation')
            ->body('Are you sure you want to delete this discussion?')
            ->actions([
                Action::make('confirm')
                    ->label('Confirm')
                    ->color('danger')
                    ->button()
                    ->close()
                    ->emit('doDeleteDiscussion', ['discussion' => $this->discussion->id]),

                Action::make('cancel')
                    ->label('Cancel')
                    ->close()
            ])
            ->persistent()
            ->send();
    }

    public function doDeleteDiscussion(int $discussion): void
    {
        Discussion::where('id', $discussion)->delete();
        Filament::notify('success', 'Discussion deleted successfully', true);
        $this->redirect(route('home'));
    }
}
