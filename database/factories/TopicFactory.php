<?php

namespace Database\Factories;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

class TopicFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'         => ['en' => $this->faker->sentence, 'ar' => $this->faker->sentence],
            'description'   => ['en' => $this->faker->paragraphs(10), 'ar' => $this->faker->paragraphs(10)],
            'image'         => $this->faker->imageUrl,
            'tags'          => [['value' => $this->faker->word], ['value' => $this->faker->word]],
            'type'          => $this->faker->randomElement(Topic::TYPES),
            'author_name'   => $this->faker->name,
            'author_avatar' => $this->faker->imageUrl
        ];
    }
}
