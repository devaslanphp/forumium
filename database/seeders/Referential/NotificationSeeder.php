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
            "name" => "Someone sets my reply as a best answer",
        ],
        [
            "name" => "Someone commented to one of my posts",
        ],
        [
            "name" => "Someone likes one of my posts",
        ],
        [
            "name" => "My account points are updated after an action",
        ],
        [
            "name" => "My discussion is locked by a moderator / administrator",
        ],
        [
            "name" => "My discussion is unlocked by a moderator / administrator",
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
