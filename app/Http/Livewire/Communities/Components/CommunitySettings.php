<?php

namespace App\Http\Livewire\Communities\Components;

use App\Models\Community;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Component;

class CommunitySettings extends Component implements HasForms
{
    use InteractsWithForms;

    public Community $community;

    public function mount()
    {
        $this->form->fill(
            $this->community->toArray()
        );
    }

    public function render()
    {
        return view('livewire.communities.components.community-settings')
            ->layout('components.layout-profile', ['user' => auth()->user(), 'title' => "Edit {$this->community->name}"]);
    }

    public function getFormSchema(): array
    {
        return [
            TextInput::make('name'),
            Grid::make()
                ->schema([
                    FileUpload::make('logo')
                        ->directory('images')
                        ->image(),
                    FileUpload::make('feature_image')
                        ->directory('images')
                        ->image()
                ]),

            Fieldset::make('Media')
                ->schema([
                    FileUpload::make('banner_images')
                        ->imageCropAspectRatio('1:1')
                        ->enableReordering()
                        ->directory('images')
                        ->image()
                        ->multiple(),
                 /*   Repeater::make('banner_youtube_urls')
                        ->schema([
                            TextInput::make('banner_youtube_urls')
                                ->label('Youtube URL')
                                ->helperText('Paste url from YouTube'),
                        ]),*/
                ])
                ->columns(1),
            Textarea::make('long_description'),
            Textarea::make('short_description')
                ->rows(2),
            Repeater::make('links')
                ->schema([
                    TextInput::make('name')
                        ->required(),
                    TextInput::make('url')
                        ->required(),
                ]),
            Toggle::make('is_paid')
                ->reactive()
                ->default(false),
            Toggle::make('is_public')
                ->default(false),
            TextInput::make('monthly_payment')->mask(fn(TextInput\Mask $mask) => $mask->money(prefix: '$ ',
                thousandsSeparator: ',', decimalPlaces: 2))
                ->hidden(fn($get) => !$get('is_paid')),
        ];
    }

    public function submit()
    {
        $data = $this->form->getState();

        $this->community->fill($data);
        $this->community->slug = Str::slug($data['name']);
        $this->community->creator()->associate(auth()->user());

        if(!Arr::get($data,'logo')){
            $this->community->logo = 'images/logo-placeholder-image.png';
        }

        $this->community->save();

        return redirect()->to(route('profile.communities'));
    }

    public function delete()
    {
        $this->community->delete();
    }
}
