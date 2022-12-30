<?php

namespace Database\Factories;

use App\Models\Discussion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discussion>
 */
class DiscussionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->text(100),
            'content' => '<p>' . fake()->paragraphs(3, true) . '</p>',
            'user_id' => User::all()->random()->id,
            'is_resolved' => collect([true, false])->random(),
            'is_public' => collect([true, false])->random(),
            'is_locked' => collect([true, false])->random(),
        ];
    }
}
