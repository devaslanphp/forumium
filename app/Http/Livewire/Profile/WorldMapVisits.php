<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class WorldMapVisits extends Component
{
    public $user;
    public $data = [];

    public function mount(): void
    {
        $this->initVisitsData();
    }

    public function render()
    {
        return view('livewire.profile.world-map-visits');
    }

    private function initVisitsData(): void
    {
        $data = collect();
        $visits = $this->user->discussionVisits()->whereNotNull('meta')->get();
        foreach ($visits as $visit) {
            if ($visit->meta->location) {
                if ($data->where('id', $visit->meta->location->countryCode)->count()) {
                    $data->filter(fn($item) => $item['id'] == $visit->meta->location->countryCode)
                        ->each(fn($item) => $item['value'] += 1);
                } else {
                    $data->push(collect([
                        'id' => $visit->meta->location->countryCode,
                        'name' => $visit->meta->location->countryName,
                        'value' => 1
                    ]));
                }
            }
        }
        $this->data = $data->toArray();
    }
}
