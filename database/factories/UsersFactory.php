<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Users>
 */
class UsersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $emailDomain = '@bulsu.edu.ph';
        $name = $this->faker->unique()->userName; 
        $now = Carbon::now();
        $fourMonthsAgo = $now->subMonths(4);
        
        return [
            'image' => $this->faker->imageUrl(),
            'name' => $this->faker->name,
            'email' => $name . $emailDomain,
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // You can customize the password as needed
            'type' => 'student',
            'trusted' => 0,
            'is_disabled' => 0,
            'remember_token' => Str::random(10),
            'created_at' => $this->faker->dateTimeBetween($fourMonthsAgo, 'now'), // Random date within the last 4 months
        ];
    }
}
