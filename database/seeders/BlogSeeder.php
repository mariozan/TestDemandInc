<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Response;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::factory()
            ->count(10000)
            ->create();
        
    }
}
