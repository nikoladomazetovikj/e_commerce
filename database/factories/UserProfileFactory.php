<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = UserProfile::class;

    public function definition()
    {
        $users = User::all();
        return [
            'user_id' => $this->faker->unique()->numberBetween(1, $users->count()),
            'country' => fake()->country(),
            'city' => fake()->city(),
            'zip_code' => fake()->countryCode(),
            'street' => fake()->address(),
            'phone_number' => fake()->phoneNumber(),
        ];
    }
}
