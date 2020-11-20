<?php

namespace Database\Factories;

use App\Models\blogs;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class blogsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = blogs::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->title,
            'body' => $this->faker->paragraph,
            'filename' => $this->faker->text,
            'category' => $this->faker->text
        ];
    }
}
