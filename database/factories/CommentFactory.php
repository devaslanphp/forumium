<?php

namespace Database\Factories;

use App\Models\Discussion;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $source = $this->randomSource();
        return [
            'content' => fake()->text(300),
            'user_id' => User::all()->random()->id,
            'source_id' => $source->id,
            'source_type' => get_class($source),
        ];
    }

    private function randomSource(): Model
    {
        $sourceType = collect([Discussion::class, Reply::class])->random();
        $data = call_user_func($sourceType . '::all');
        $source = null;
        if (!$data->isEmpty()) {
            $source = $data->random();
        }
        if ($sourceType && $source) {
            return $source;
        } else {
            return $this->randomSource();
        }
    }
}
