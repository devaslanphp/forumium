<?php

namespace App\Http\Livewire\Discussion;

use App\Models\Discussion;
use App\Models\Reply as ReplyModel;
use Filament\Facades\Filament;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class Reply extends Component implements HasForms
{
    use InteractsWithForms;

    public Discussion $discussion;
    public ReplyModel|null $reply = null;

    public function mount(): void
    {
        $data = [];
        if ($this->reply) {
            $data['content'] = $this->reply->content;
        }
        $this->form->fill($data);
    }

    public function render()
    {
        return view('livewire.discussion.reply');
    }

    protected function getFormSchema(): array
    {
        return [
            RichEditor::make('content')
                ->label('Reply content')
                ->required()
        ];
    }

    public function submit(): void
    {
        $data = $this->form->getState();
        if ($this->reply) {
            $this->reply->content = $data['content'];
            $this->reply->save();
            $message = 'Reply updated successfully';
        } else {
            ReplyModel::create([
                'user_id' => auth()->user()->id,
                'discussion_id' => $this->discussion->id,
                'content' => $data['content']
            ]);
            $message = 'Reply added successfully';
        }
        Filament::notify('success', $message);
        $this->emit('replyAdded');
        $this->emit('replyUpdated');
        if ($this->reply) {
            $this->dispatchBrowserEvent('replyUpdated');
        } else {
            $this->dispatchBrowserEvent('replyAdded');
        }
        if ($this->reply) {
            $data['content'] = $this->reply->content;
        }
        $this->form->fill($data);
    }
}
