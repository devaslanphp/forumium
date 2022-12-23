<?php

namespace App\Http\Livewire\Discussion;

use App\Models\Like;
use App\Models\Reply;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Livewire\Component;

class ReplyDetails extends Component
{
    public Reply $reply;
    public int $likes = 0;
    public int $comments = 0;
    public bool $edit = false;

    protected $listeners = [
        'doDelete'
    ];

    public function mount(): void
    {
        $this->initDetails();
    }

    public function render()
    {
        return view('livewire.discussion.reply-details');
    }

    private function initDetails(): void
    {
        $this->likes = $this->reply->likes()->count();
        $this->comments = $this->reply->comments()->count();
    }

    public function toggleLike(): void
    {
        $like = Like::where('user_id', auth()->user()->id)->where('source_id', $this->reply->id)->where('source_type', Reply::class)->first();
        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'user_id' => auth()->user()->id,
                'source_id' => $this->reply->id,
                'source_type' => Reply::class
            ]);
        }
        $this->reply->refresh();
        $this->initDetails();
    }

    public function delete(): void
    {
        Notification::make()
            ->warning()
            ->title('Delete confirmation')
            ->body('Are you sure you wan to delete this reply?')
            ->actions([
                Action::make('confirm')
                    ->label('Confirm')
                    ->color('danger')
                    ->button()
                    ->close()
                    ->emit('doDelete', ['reply' => $this->reply->id]),

                Action::make('cancel')
                    ->label('Cancel')
                    ->close()
            ])
            ->persistent()
            ->send();
    }

    public function doDelete(int $reply): void
    {
        Reply::where('id', $reply)->delete();
        $this->emit('replyDeleted');
    }

    public function edit(): void
    {
        $this->edit = true;
    }
}
