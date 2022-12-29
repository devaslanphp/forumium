<?php

namespace Database\Seeders;

use Database\Seeders\Content\CommentsSeeder;
use Database\Seeders\Content\DiscussionsSeeder;
use Database\Seeders\Content\LikesSeeder;
use Database\Seeders\Content\PointsSeeder;
use Database\Seeders\Content\RepliesSeeder;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Content
        $this->call(DiscussionsSeeder::class);
        $this->call(RepliesSeeder::class);
        $this->call(CommentsSeeder::class);
        $this->call(LikesSeeder::class);
        $this->call(PointsSeeder::class);
    }
}
