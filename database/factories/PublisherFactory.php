<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PublisherFactory extends Factory
{
    public function definition(): array
    {
        $ar = 'ar_JO';

        return [
            'name' => ['en' => fake()->name, 'ar' => fake($ar)->name],
            'description' => ['en' => fake()->paragraphs(10), 'ar' => fake($ar)->paragraphs(10)],
            'url' => fake()->url,
            'image' => fake()->imageUrl,
            'active' => 1,
            'hashtags' => (string) str(fake()->sentence)->prepend('#')->replace(' ', ' #'),
            'title_xpath' => '',
            'content_xpath' => '',
            'image_xpath' => '',
            'author_xpath' => '',
        ];
    }
}
