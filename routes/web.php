<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowPosts;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('posts', ShowPosts::class)->name('posts');
Route::get('post/{id}',function($id){
    return view('post',compact('id'));
})->name('post-detail');

Route::get('home',function(){
    return view('home');
});

Route::get('posts-datatable',function(){
    return view('postsdatatable');
})->name('postsdatatable');

Route::post('store',[PostController::class, 'store'])->name('posts.store');

Route::post('comment',[CommentController::class, 'store'])->name('comment.store');
