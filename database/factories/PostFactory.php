<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            "user_id"     => User::factory(),
            "category_id" => Category::factory(),
            "title"       => $this->faker->sentence(),
            'thumbnail'   => 'thumbnails\illustration-1.png',
            "slug"        => $this->faker->slug(),
            "excerpt"     => $this->faker->sentence(),
            "status_id"   => 2,
            "body"        => $this->faker->paragraph()
        ];
    }
}
