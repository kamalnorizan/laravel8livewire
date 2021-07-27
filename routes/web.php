<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowPosts;
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
});

Route::get('home',function(){
    return view('home');
});




