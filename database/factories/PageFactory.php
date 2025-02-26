<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'template'      => 'default',
            'title'         => $this->faker->unique()->word,
            'slug'          => $this->faker->unique()->slug,
            'content'       => $this->faker->text(100),
            'seo_title'     => $this->faker->word,
            'seo_description'   => $this->faker->text(100),
            'seo_keywords'      => $this->faker->word
        ];
    }
}
