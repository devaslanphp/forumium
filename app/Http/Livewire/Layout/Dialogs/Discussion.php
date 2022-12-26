<?php

namespace App\Http\Livewire\Layout\Dialogs;

use App\Models\Discussion as DiscussionModel;
use App\Models\DiscussionTag;
use App\Models\Tag;
use Filament\Facades\Filament;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\Str;
use Livewire\Component;

class Discussion extends Component implements HasForms
{
    use InteractsWithForms;

    public DiscussionModel|null $discussion = null;

    public function mount(): void
    {
        $data = [];
        if ($this->discussion) {
            $data['name'] = $this->discussion->name;
            $data['content'] = $this->discussion->content;
            $data['tags'] = $this->discussion->tags->pluck('id')->toArray();
        }
        $this->form->fill($data);
    }

    public function render()
    {
        return view('livewire.layout.dialogs.discussion');
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make()
                ->columns(5)
                ->schema([
                    TextInput::make('name')
                        ->label('Discussion title')
                        ->required()
                        ->columnSpan(3)
                        ->maxLength(255),

                    Select::make('tags')
                        ->label('Tags')
                        ->required()
                        ->multiple()
                        ->columnSpan(2)
                        ->maxItems(3)
                        ->options(Tag::all()->pluck('name', 'id'))
                ]),

            RichEditor::make('content')
                ->label('Discussion content')
                ->required()
        ];
    }

    public function submit(): void
    {
        $data = $this->form->getState();
        $update = false;
        if ($this->discussion) {
            $this->discussion->name = $data['name'];
            $this->discussion->content = $data['content'];
            $this->discussion->save();
            DiscussionTag::where('discussion_id', $this->discussion->id)->delete();
            $update = true;
            $discussion = $this->discussion;
        } else {
            $discussion = DiscussionModel::create([
                'name' => $data['name'],
                'user_id' => auth()->user()->id,
                'content' => $data['content']
            ]);
        }
        foreach ($data['tags'] as $tag) {
            DiscussionTag::create([
                'discussion_id' => $discussion->id,
                'tag_id' => $tag
            ]);
        }
        Filament::notify(
            'success',
            ($update ? 'Discussion updated successfully' : 'Discussion created successfully'),
            !$update
        );
        if ($update) {
            $this->emit('discussionEdited');
        } else {
            $this->redirect(route('discussion', [
                'discussion' => $discussion,
                'slug' => Str::slug($discussion->name)
            ]));
        }
    }

    public function cancel(): void
    {
        $this->emit('updateDiscussionCanceled');
    }
}
