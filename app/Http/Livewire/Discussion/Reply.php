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

    public function mount(): void
    {
        $this->form->fill();
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
        ReplyModel::create([
            'user_id' => auth()->user()->id,
            'discussion_id' => $this->discussion->id,
            'content' => $data['content']
        ]);
        Filament::notify('success', 'Reply added successfully');
        $this->emit('replyAdded');
        $this->dispatchBrowserEvent('replyAdded');
        $this->form->fill();
    }
}
