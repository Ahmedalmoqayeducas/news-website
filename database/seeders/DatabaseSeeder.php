<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(50)->create();
        \App\Models\Post::factory(100)->create();
        \App\Models\comment::factory(500)->create();
        \App\Models\Like::factory(900)->create();
        \App\Models\Admin::factory(10)->create();
        \App\Models\Admin::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
        ]);
    }
}
