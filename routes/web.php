<?php

use App\Http\Livewire\Category;
use App\Http\Livewire\Post;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get("/category", Category::class)->name("category");
    Route::get("/post", Post::class)->name("post");

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



require __DIR__ . '/auth.php';