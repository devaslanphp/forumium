<?php

namespace Database\Factories;

use App\Models\Discussion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reply>
 */
class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'content' => '<p>' . fake()->paragraphs(3, true) . '</p>',
            'user_id' => User::all()->random()->id,
            'discussion_id' => Discussion::all()->random()->id,
            'is_best' => collect([true, false])->random(),
        ];
    }
}
