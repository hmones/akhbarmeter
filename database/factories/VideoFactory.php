<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'       => fake()->sentence,
            'url'         => fake()->url,
            'description' => fake()->paragraph,
            'tags'        => [fake()->word, fake()->word],
            'icon'        => fake()->imageUrl
        ];
    }
}
