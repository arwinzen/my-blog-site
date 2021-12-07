<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ApiPostController extends Controller
{
    public function index(){
        return Post::latest()->exclude(['body'])->paginate(5);
    }

    public function show(Post $post){
        return $post;
    }
}
