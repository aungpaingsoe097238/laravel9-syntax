<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Aung Paing Soe',
             'email' => 'aps@gmail.com',
             'password' => Hash::make('password')
         ]);

        $categories = ['IT News','Sport','Food & Drink','Travel'];
        foreach ($categories as $category){
            Category::factory()->create([
                'title' => $category,
                'slug'  => Str::slug($category),
                'user_id' => User::inRandomOrder()->first()->id
            ]);
        }

        Post::factory(50)->create();

    }
}
