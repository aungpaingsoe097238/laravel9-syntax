<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        $description = $this->faker->realText(2000);
        return [
            'title' => $title,
            'slug'  => Str::slug($title),
            'description' => $description,
            'excerpt' => Str::words($description,50,'...'),
            'category_id' => Category::all()->random()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }
}
