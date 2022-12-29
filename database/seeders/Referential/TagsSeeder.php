<?php

namespace Database\Seeders\Referential;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    private $data = [
        [
            "name" => "Test Posting",
            "color" => "#B59E8C",
            "icon" => "fa-solid fa-vial",
            "description" => "Test out Flarum in this tag. Discussions in this tag will be deleted every so often.",
        ],
        [
            "name" => "Support",
            "color" => "#4B93D1",
            "icon" => "fa-solid fa-wrench",
            "description" => "Get help setting up, using, and customising Flarum.",
        ],
        [
            "name" => "Meta",
            "color" => "#EF564F",
            "icon" => "fa-solid fa-bullhorn",
            "description" => "Discussion about this community: its organisation and how we can improve it.",
        ],
        [
            "name" => "Praise",
            "color" => "#9354CA",
            "icon" => "fa-solid fa-hand-holding-heart",
            "description" => "Share you thanks for Flarum, its team or any of the participants in our ecosystem.",
        ],
        [
            "name" => "Proposals",
            "color" => "#a22581",
            "icon" => "fa-solid fa-check-to-slot",
            "description" => "Feature requests, design suggestions to become actionable tasks",
        ],
        [
            "name" => "Extensions",
            "color" => "#48BF83",
            "icon" => "fa-solid fa-plug",
            "description" => "Announce your extensions and provide help to users in this area. For requests/ideas, post in Feedback. For help building extensions, post in Dev > Extensibility.",
        ],
        [
            "name" => "Dev",
            "color" => "#414141",
            "icon" => "fa-solid fa-code",
            "description" => "For developers. Get help hacking core, building extensions, themes, and translations.",
        ],
        [
            "name" => "Resources",
            "color" => "#626C78",
            "icon" => "fa-solid fa-suitcase",
            "description" => "Share Flarum-related resources and services here: hosting, jobs, etc.",
        ],
        [
            "name" => "Off-topic",
            "color" => "#D68B4F",
            "icon" => "fa-solid fa-quote-right",
            "description" => "Off-topic discussions that don't fit into any other categories.",
        ],
        [
            "name" => "Feedback",
            "color" => "#9354CA",
            "icon" => "fa-solid fa-comment-dots",
            "description" => "For discussing Flarum core features and design. For issues use Support.",
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
            if (!Tag::where('name', $item['name'])->count()) {
                Tag::create($item);
            }
        }
    }
}
