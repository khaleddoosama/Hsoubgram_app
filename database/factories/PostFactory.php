<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use illuminate\Support\Str;
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
        $images=['1.png','2.png','3.png','4.png','5.png','6.png'];
        return [
            'description'=>fake()->sentence(),
            'slug'=>Str::slug(fake()->sentence(6)),  //'Amazaing laravel tips and triks here'-> 'amazing-laravel-tips-and-tricks-here'
            'image'=>'posts/'.fake()->randomElement($images),
            'user_id'=>User::factory(),
        ];
    }
}