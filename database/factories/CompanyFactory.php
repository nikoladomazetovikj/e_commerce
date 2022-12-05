<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'company_name' => fake()->company(),
            'company_address' => fake()->address(),
            'company_phone' => fake()->phoneNumber(),
            'company_email' => fake()->companyEmail()
        ];
    }
}
