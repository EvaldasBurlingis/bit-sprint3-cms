<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'      => $this->faker->sentence(),
            'user_id'    => 1,
            'status_id'  => $this->faker->numberBetween(1,2),
            'slug'       => $this->faker->unique()->slug(),
            'created_at' => now()
        ];
    }
}
