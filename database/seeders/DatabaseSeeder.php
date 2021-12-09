<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Status;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            "name" => 'john doe',
            'email' => 'john@gmail.com',
            "is_admin" => '1',
            'password' => '12345678'
        ]);

        Post::factory(3)->create([
            "user_id" => $user->id
        ]);

        Status::factory()->create(['name' => 'draft', 'slug' => 'draft']);
        Status::factory()->create(['name' => 'published', 'slug' => 'published']);
    }

}
