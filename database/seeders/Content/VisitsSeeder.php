<?php

namespace Database\Seeders\Content;

use App\Models\DiscussionVisit;
use Illuminate\Database\Seeder;

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
            ->create();
    }
}
