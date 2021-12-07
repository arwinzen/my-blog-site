<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index(){
        return view('admin.posts.index', [
           'posts' => Post::latest()->paginate(50)
        ]);
    }

    // show a form to create a post
    public function create(){
//        dd(strtolower(auth()->user()->username));
        return view('admin.posts.create');
    }

    // create post based on input from user
    public function store(){
//        dd(request()->all());
        // upload file to local storage and save the path to a variable
        $path = request()->file('thumbnail')->store('thumbnails');

        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => ['required', 'image'],
            'slug' => ['required', Rule::unique('posts','slug')],
            'excerpt' => 'required',
            'body' => 'required',
            // make sure that category_id provided exists in the database
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/');
    }

    public function edit(Post $post){
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post){
        // validate input fields for update of post
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'slug' => ['required', Rule::unique('posts','slug')->ignore($post->id)],
            'excerpt' => 'required',
            'body' => 'required',
            // make sure that category_id provided exists in the database
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        //
        if( isset($attributes['thumbnail'])){
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
//        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        // update post
        $post->update($attributes);

        return back()->with('success', 'Post successfully updated.');
    }

    public function destroy(Post $post){
        $post->delete();

        return back()->with('success','Post deleted.');
    }
}
