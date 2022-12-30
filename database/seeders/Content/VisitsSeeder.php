<?php

namespace Database\Seeders\Content;

use App\Models\DiscussionVisit;
use Illuminate\Database\Seeder;
use Stevebauman\Location\Facades\Location;

class VisitsSeeder extends Seeder
{
    private $count = 1000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiscussionVisit::factory()->count($this->count)
            ->create()
            ->each(function (DiscussionVisit $visit) {
                $ip = fake()->ipv4();
                $location = Location::get($ip);
                $visit->meta = [
                    'ip' => $ip,
                    'browser' => fake()->userAgent(),
                    'location' => $location ? $location->toArray() : []
                ];
                $visit->save();
            });
    }
}
