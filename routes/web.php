<?php

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

/** **** */
