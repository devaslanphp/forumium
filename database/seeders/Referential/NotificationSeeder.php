<?php

namespace Database\Seeders\Referential;

use App\Models\Notification;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    private $data = [
        [
            "name" => "Someone edited my discussion",
        ],
        [
            "name" => "Someone posts in a discussion I'm following",
        ],
        [
            "name" => "Someone locks my discussion",
        ],
        [
            "name" => "When one of my posts is up/down voted",
        ],
        [
            "name" => "Someone sets my reply as a best answer",
        ],
        [
            "name" => "A best answer is set in a discussion I participated in",
        ],
        [
            "name" => "Someone commented to one of my posts",
        ],
        [
            "name" => "Someone mentions me in a post",
        ],
        [
            "name" => "Someone likes one of my posts",
        ],
        [
            "name" => "A moderator warns me",
        ],
        [
            "name" => "Someone creates a discussion in a tag I'm following",
        ],
        [
            "name" => "My account points are updated after an action",
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $item) {
            if (!Notification::where('name', $item['name'])->count()) {
                Notification::create($item);
            }
        }
    }
}
