<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => ['en' => $this->faker->sentence, 'ar' => $this->faker->sentence],
            'url' => 'https://www.youtube.com/embed/7Dy8ymLWeU0?list=RD7Dy8ymLWeU0',
            'description' => ['en' => $this->faker->paragraphs(10), 'ar' => $this->faker->paragraphs(10)],
            'tags' => [['value' => $this->faker->word], ['value' => $this->faker->word]],
            'icon' => $this->faker->imageUrl,
        ];
    }
}
