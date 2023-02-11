<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PostFactory extends Factory
{

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5),
            'slug' => $this->faker->slug,
            'category_id' => $this->faker->randomElement(range(1, 20)),
            'user_id' => $this->faker->randomElement(range(1, 5)),
            'excerpt' => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
            'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(6)) . '</p>',
        ];
    }
}
