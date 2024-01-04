<?php

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/** one to one relationship **/

Route::get('/user/{id}',function($id){
    $user = \App\Models\User::findOrFail($id);
    if($user->profile){
     //dd($user->profile->mobile);
    }
    $user->profile->updateOrCreate(['user_id'=>$user->id],["mobile"=>"+216224292"]);
    $user->profile=$user->profile->fresh();
    dd($user->profile->mobile);

});

Route::get('/profile/{id}',function($id){
    $profile = \App\Models\Profile::findOrFail($id);
    dd($profile->user);
});

/** */

/** eager loading */

Route::get('/users',function(){

    /** this give load so bad with 9.26s and 136 query */
    // $users=\App\Models\User::all();
    /** Solution is eager loading with 1.54 and 2 query  */
    $users=\App\Models\User::with('profile')->get();
    Debugbar::info($users);
    foreach ($users as $user) {
        Debugbar::info($user->profile);
    }
    return view("welcome");


});

/** */

/** one to many relationship */
Route::get('/user/{id}/posts',function($id){
    $user = \App\Models\User::findOrFail($id);
    foreach ($user->posts as $post) {
        Debugbar::info($post->title);
    }
    return view('welcome');
});

Route::get('post/{id}/user',function($id){
    $post = \App\Models\Post::findOrFail($id);
    Debugbar::info($post->user->name);
    return view('welcome');
});

/** */

/** many to many relationship */

Route::get('categories',function(){
    $categories=\App\Models\Category::with('posts')->get();
    //$categories=\App\Models\Category::all();
    foreach ($categories as $category) {
        // to attach category to posts
        //$category->posts()->attach([1,2,3]);
        // to detach
        //$category->posts()->detach([1,2,3]);
        // to sync only the id's in array with be there
        $category->posts()->sync([1,3]);
        Debugbar::info($category->posts);
    }
    return view('welcome');
});

Route::get('posts',function(){
    $posts=\App\Models\Post::with('categories')->get();
    //$posts=\App\Models\Post::all();
    foreach ($posts as $post) {
        Debugbar::info($post->categories);
    }
    return view('welcome');
});

/** */

/** polymorph relationship */
Route::get('post/photos/{id}',function($id){
    $post=\App\Models\Post::findOrFail($id);
    Debugbar::info($post->photos);
    return view('welcome');
});

Route::get('user/photos/{id}',function($id){
    $user=\App\Models\User::findOrFail($id);
    Debugbar::info($user->photos);
    return view('welcome');
});

Route::get('user/addPhoto/{id}',function($id){
    $user=\App\Models\User::findOrFail($id);
    $user->photos()->create([
        'url'=>"https://via.placeholder.com/640x480.png/0000aa?text=qui"
    ]);
    return view('welcome');
});
/** */
