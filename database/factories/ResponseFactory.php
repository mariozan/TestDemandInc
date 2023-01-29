<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResponseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = $this->faker->randomElement(User::select('id')->pluck('id')->toArray());
        $blog = $this->faker->randomElement(Blog::select('id')->pluck('id')->toArray());

        return [
            'text' => $this->faker->realText(255),
            'user_id' => $user,
            'blog_id' => $blog,
            'image' => $this->faker->imageUrl(),
        ];
    }
}
