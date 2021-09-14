<?php

namespace Database\Factories;

use Str;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
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
            'title' => $this->faker->sentence(),
            'description' => $this->faker->text(),
            'content' => $this->faker->text(1000),
            'representative_image_path' => "https://picsum.photos/id/" . rand(1, 999) . "/1920/1080",
            'creator_id' => User::factory(),
            'updater_id' => User::factory(),
        ];
    }
}
