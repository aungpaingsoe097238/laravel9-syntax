<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Aung Paing Soe',
            'role' => 'admin',
            'email' => 'aps@gmail.com',
            'password' => Hash::make('password')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Editor',
            'role' => 'editor',
            'email' => 'editor@gmail.com',
            'password' => Hash::make('password')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Author',
            'role' => 'author',
            'email' => 'author@gmail.com',
            'password' => Hash::make('password')
        ]);


    }
}
