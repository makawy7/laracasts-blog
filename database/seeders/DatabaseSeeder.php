<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        // \App\Models\User::truncate();
        // \App\Models\Post::truncate();
        // \App\Models\Category::truncate();
        // \App\Models\Comment::truncate();
        
 
        \App\Models\User::factory(5)->create();
        \App\Models\Post::factory(90)->create();
        \App\Models\Category::factory(20)->create();
        \App\Models\Comment::factory(340)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
