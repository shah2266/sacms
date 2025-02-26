<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'company_name' => $this->faker->unique()->company,
            'short_name' => $this->faker->companySuffix,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'website' => $this->faker->url,
            'favicon' => 'favicon.ico',
            'image' => 'logo.png',
            'business_model' => $this->faker->word,
            'number_of_offices' => $this->faker->numberBetween(1, 10),
            'mission_statement' => $this->faker->sentence(),
            'vision_statement' => $this->faker->sentence(),
            'copy_right_statement' => $this->faker->sentence(),
            'founded_date' => $this->faker->dateTimeBetween('-20 years', 'now'),
            'employee_count' => $this->faker->numberBetween(1, 500),
            'facebook' => $this->faker->url,
            'youtube' => $this->faker->url,
            'linkedin' => $this->faker->url,
            'licence_key' => 'dev_shah', // Default value
            'status' => $this->faker->boolean ? 0 : 1, // Randomly set active or inactive
        ];
    }
}
