<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Response;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{   

    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();

        $blog = Blog::select('id')->pluck('id')->toArray();
        $user = User::select('id')->pluck('id')->toArray();

        for($i=0; $i < count($blog); $i++) {
            for($j=0; $j < 5; $j++) {
                Response::create([
                    'user_id' => $faker->randomElement($user),
                    'blog_id' => $blog[$i],
                    'text' => $faker->realText(255),
                    'image' => $faker->imageUrl()
                ]);
        }
        }
    }
}
