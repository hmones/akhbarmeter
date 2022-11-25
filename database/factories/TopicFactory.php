<?php

namespace Database\Factories;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

class TopicFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'         => $this->faker->sentence,
            'description'   => $this->faker->paragraphs(10),
            'image'         => $this->faker->imageUrl,
            'tags'          => [$this->faker->word, $this->faker->word],
            'type'          => $this->faker->randomElement(Topic::TYPES),
            'author_name'   => $this->faker->name,
            'author_avatar' => $this->faker->imageUrl
        ];
    }
}
