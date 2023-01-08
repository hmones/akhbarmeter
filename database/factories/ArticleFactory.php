<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'url'        => fake()->url,
            'title'      => fake()->sentence,
            'date'       => fake()->date,
            'image'      => fake()->imageUrl,
            'content'    => fake()->paragraphs(30),
            'author'     => fake()->name,
            'comment'    => fake()->sentence,
            'active'     => 1,
            'is_fake'    => fake()->boolean,
            'score_at'   => null,
            'fetched_at' => now(),
            'created_at' => now(),
        ];
    }
}
