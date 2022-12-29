<?php

namespace Database\Seeders\Content;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    private $count = 150;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::factory()->count($this->count)
            ->create();
    }
}
