<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postcontroller;
use App\Http\Controllers\usercontroller;

Route::get('/', function () {
    $posts =[];
    if (auth()->check()) {
        $posts = auth()->user()->userscoolposts()->latest()->get();
    }
    return view('home', ['posts' => $posts]);
});
Route::post('/register', [usercontroller::class, 'register']);
Route::post('/logout', [usercontroller::class, 'logout']);
Route::post('/login', [usercontroller::class, 'login']);

// blog post related routes
Route::Post('/create-post', [postcontroller::class, 'createpost']);
Route::get('/edit-post/{post}', [postcontroller::class, 'showeditscreen']);
Route::put('/edit-post/{post}', [postcontroller::class, 'actuallyupdatepost']);
Route::delete('/delete-post/{post}', [postcontroller::class, 'deletepost']);
