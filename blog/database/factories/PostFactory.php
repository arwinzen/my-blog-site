<?php

namespace Database\Factories;

use App\Models\Category;
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
            //
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'slug' => $this->faker->slug(),
            'thumbnail' =>  'thumbnails/lbyjRpFYsS32SWQUXXONaI6tl0M6MmV210ju6lTE.jpg',
            'title' => $this->faker->sentence(),
            // faker->paragraphs returns an array, whose elements can be joined using implode.
            // we're separating each array element by a </p> and an <p>
//            'excerpt' => '<p>' . implode('<p></p>', $this->faker->paragraphs(2)) . '</p>',
//            'body' => '<p>' . implode('<p></p>', $this->faker->paragraphs(6)) . '</p>',
            'excerpt' => $this->faker->paragraphs(2, true),
            'body' => $this->faker->paragraphs(6, true),
        ];
    }
}
