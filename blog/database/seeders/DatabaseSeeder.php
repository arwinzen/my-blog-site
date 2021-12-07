<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        User::truncate();
//        Post::truncate();
//        Category::truncate();

         $user = \App\Models\User::factory()->create([
             'name' => 'Arwin Goo',
             'username' => 'arwinzen',
             'email' => 'arwin@mail.com',
             'password' => 'password'
         ]);

         Post::factory(5)->create([
             'user_id' => $user->id
         ]);

//         $personal = Category::create([
//             'name' => 'Personal',
//             'slug' => 'personal'
//         ]);
//
//         $family = Category::create([
//             'name' => 'Family',
//             'slug' => 'family'
//         ]);
//
//         $work = Category::create([
//             'name' => 'Work',
//             'slug' => 'work'
//         ]);
//
//         Post::create([
//            'user_id' => $user->id,
//             'category_id' => $personal->id,
//             'title' => 'My Personal Post',
//             'slug' => 'my-personal-post',
//             'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
//             'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Diam quis enim lobortis scelerisque fermentum dui faucibus in. Bibendum ut tristique et egestas quis. In massa tempor nec feugiat nisl pretium fusce. Tincidunt id aliquet risus feugiat in. Viverra tellus in hac habitasse platea dictumst. Faucibus in ornare quam viverra. Nulla pellentesque dignissim enim sit amet venenatis urna cursus. Vestibulum rhoncus est pellentesque elit. Blandit aliquam etiam erat velit scelerisque in dictum. Amet mauris commodo quis imperdiet massa tincidunt nunc.</p>'
//         ]);
//
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' => $family->id,
//            'title' => 'My Family Post',
//            'slug' => 'my-family-post',
//            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
//            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Diam quis enim lobortis scelerisque fermentum dui faucibus in. Bibendum ut tristique et egestas quis. In massa tempor nec feugiat nisl pretium fusce. Tincidunt id aliquet risus feugiat in. Viverra tellus in hac habitasse platea dictumst. Faucibus in ornare quam viverra. Nulla pellentesque dignissim enim sit amet venenatis urna cursus. Vestibulum rhoncus est pellentesque elit. Blandit aliquam etiam erat velit scelerisque in dictum. Amet mauris commodo quis imperdiet massa tincidunt nunc.</p>'
//        ]);
//
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' => $work->id,
//            'title' => 'My Work Post',
//            'slug' => 'my-work-post',
//            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
//            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Diam quis enim lobortis scelerisque fermentum dui faucibus in. Bibendum ut tristique et egestas quis. In massa tempor nec feugiat nisl pretium fusce. Tincidunt id aliquet risus feugiat in. Viverra tellus in hac habitasse platea dictumst. Faucibus in ornare quam viverra. Nulla pellentesque dignissim enim sit amet venenatis urna cursus. Vestibulum rhoncus est pellentesque elit. Blandit aliquam etiam erat velit scelerisque in dictum. Amet mauris commodo quis imperdiet massa tincidunt nunc.</p>'
//        ]);
    }
}
