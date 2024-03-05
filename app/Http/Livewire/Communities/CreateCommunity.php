<?php

namespace App\Http\Livewire\Communities;

use App\Models\Community;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateCommunity extends Component implements HasForms
{
    use InteractsWithForms;

    public Community $community;

    public function mount(): void
    {
        $this->form->fill();
        $this->community = new Community();
    }

    public function render()
    {
        return view('livewire.communities.create-community')
            ->layout('components.blank-layout');
    }

    public function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->label('Group Name')
                ->helperText('You can change this later')
                ->unique('communities'),
            Grid::make()
                ->schema([
                    Toggle::make('is_paid')
                        ->reactive()
                        ->default(false),
                    Toggle::make('is_public'),
                ]),
            TextInput::make('monthly_payment')->mask(fn(TextInput\Mask $mask) => $mask->money(prefix: '$ ',
                thousandsSeparator: ',', decimalPlaces: 2))
                ->hidden(fn($get) => !$get('is_paid')),
        ];
    }

    /**
     * @return RedirectResponse
     */
    public function submit()
    {
        $data = $this->form->getState();

        $this->community->fill($data);
        $this->community->slug = Str::slug($data['name']);
        $this->community->creator()->associate(auth()->user());

        $this->community->save();

        return redirect()->to(route('profile.communities'));
    }
}
