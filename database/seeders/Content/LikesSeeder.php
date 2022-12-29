<?php

namespace Database\Seeders\Content;

use App\Models\Like;
use Illuminate\Database\Seeder;

class LikesSeeder extends Seeder
{
    private $count = 350;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Like::factory()->count($this->count)
            ->create();
    }
}
