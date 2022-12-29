<?php

namespace Database\Seeders\Content;

use App\Core\FollowerConstants;
use App\Models\Discussion;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DiscussionsSeeder extends Seeder
{
    private $count = 50;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discussion::factory()->count($this->count)
            ->create()
            ->each(function (Discussion $discussion) {
                // Link tags
                $tagsCount = collect([1, 2, 3])->random();
                $tags = Tag::all();
                $tags->random($tagsCount)
                    ->each(function ($tag) use ($discussion) {
                        $discussion
                            ->tags()
                            ->attach($tag->id);
                    });

                // Link followers
                $usersCount = collect([1, 2, 3])->random();
                $users = User::all();
                $users->random($usersCount)
                    ->each(function ($user) use ($discussion) {
                        $discussion
                            ->followers()
                            ->attach(
                                $user->id,
                                [
                                    'type' => collect(array_column(FollowerConstants::cases(), 'value'))->random(1)[0]
                                ]
                            );
                    });
            });
    }
}
