<?php

namespace Database\Seeders\Content;

use App\Models\Reply;
use Illuminate\Database\Seeder;

class RepliesSeeder extends Seeder
{
    private $count = 80;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reply::factory()->count($this->count)
            ->create();
    }
}
