<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = $this->faker->randomElement(User::select('id')->pluck('id')->toArray());

        return [
            'title' => $this->faker->realText(25),
            'text' => $this->faker->realText(255),
            'user_id' => $user,
            'image' => $this->faker->imageUrl(),
        ];
    }
}
