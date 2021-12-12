<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Status;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Visibility;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $john = User::factory()->create([
            "name" => 'john doe',
            'email' => 'john@gmail.com',
            "username" => 'johndoe',
            "is_admin" => '1',
            'password' => '12345678'
        ]);

        $jane = User::factory()->create([
            "name" => 'jane doe',
            "username" => 'janedoe',
            'email' => 'jane@gmail.com',
            'password' => '12345678'
        ]);

        Post::factory(3)->create([
            "user_id" => $john->id
        ]);

        Status::factory()->create(['name' => 'draft', 'slug' => 'draft']);
        Status::factory()->create(['name' => 'published', 'slug' => 'published']);

        $john->followers()->attach(User::factory(5)->create());
        $jane->followings()->attach(User::factory(5)->create());

        Visibility::factory()->create(['user_id' => $jane->id]);
    }

}
