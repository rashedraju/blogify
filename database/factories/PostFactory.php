<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => User::factory(),
            "category_id" => Category::factory(),
            "title" => $this->faker->sentence(),
            'thumbnail' => 'thumbnails\ChVR4ZCDhRMB9yVljrrw8LEWT4dnA0zsI3pLotLl.png',
            "slug" => $this->faker->slug(),
            "excerpt" => $this->faker->sentence(),
            "body" => $this->faker->paragraph(),
        ];
    }
}
