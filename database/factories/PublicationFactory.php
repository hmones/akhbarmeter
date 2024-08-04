<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PublicationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => ['en' => $this->faker->sentence, 'ar' => $this->faker->sentence],
            'description' => ['en' => $this->faker->paragraphs(10), 'ar' => $this->faker->paragraphs(10)],
            'image' => $this->faker->imageUrl,
            'file' => $this->faker->imageUrl,
            'tags' => [['value' => $this->faker->word], ['value' => $this->faker->word]],
            'min_to_read' => $this->faker->numberBetween(1, 50),
            'author_name' => $this->faker->name,
            'author_avatar' => $this->faker->imageUrl,
        ];
    }
}
