<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HeroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'page_id' => $this->faker->numberBetween(1, 3),
            'title' => $this->faker->unique()->sentence(3),
            'title_color' => $this->faker->hexColor,
            'sub_title' => $this->faker->sentence(5),
            'sub_title_color' => $this->faker->hexColor,
            'short_description' => $this->faker->paragraph(),
            'bg_color' => $this->faker->hexColor,
            'image' => $this->faker->imageUrl(),
            'link1' => $this->faker->url(),
            'link2' => $this->faker->url(),
            'type' => $this->faker->randomElement(['banner', 'slider']),
            'status' => $this->faker->boolean(80), // 80% chance of being active (1)
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
