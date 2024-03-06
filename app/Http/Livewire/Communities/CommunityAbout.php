<?php

namespace App\Http\Livewire\Communities;

use App\Models\Community;
use Livewire\Component;

class CommunityAbout extends Component
{
    public string $title;
    public Community $community;
    public $selectedImage = null;

    public function mount()
    {
        if($this->community->banner_images){
            $this->selectedImage = $this->community->banner_images[0];
        }
    }

    public function selectImage($selectedImage)
    {
        $this->selectedImage = $selectedImage;
    }


    public function render()
    {
        return view('livewire.communities.community-about')
            ->layout('components.layout', ['community'=>$this->community]);
    }
}
