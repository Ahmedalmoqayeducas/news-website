<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type=['sport','local','international'];
        $number=random_int(1,6);
        return [
            'title'=>fake()->title(),
            'description'=>fake()->text(),
            'type'=>$type[rand(0,2)],
            'image'=>"$number.jpg",
            'user_id'=>fake()->numberBetween(1,User::count()),
            'created_at'=>fake()->dateTimeBetween('-1 year','now'),
        ];
    }
}
