<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FactCheckingArticle>
 */
class FactCheckingArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'dbid' => $this->faker->unique()->randomNumber(),
            'claim_description' => $this->faker->text(),
            'title' => $this->faker->text(),
            'summary' => $this->faker->text(),
        ];
    }
}
