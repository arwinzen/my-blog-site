<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiPostController;
use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// create sanctum access token
Route::post('/sanctum/token', [ApiAuthController::class, 'create']);

// protected routes
Route::middleware('auth:sanctum')->group(function (){
    Route::get('/posts', [ApiPostController::class, 'index']);
    Route::get('/posts/{post}', [ApiPostController::class, 'show']);
});

// destroy access token
Route::middleware('auth:sanctum')->post('/logout', [ApiAuthController::class, 'destroy']);

//Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
//    $request->user()->tokens()->delete();
//
//    return response('Loggedout', 200);
//});

//Route::get('/posts', function (){
//   return Post::latest()->exclude(['body'])->paginate(5);
//});
//
//Route::get('/posts/{post}', function (Post $post){
//    return $post;
//});

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});





