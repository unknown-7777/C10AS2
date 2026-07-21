<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/books', [BookController::class, 'index'])->name('books.index.link');

Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show.link');

Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index.link');

Route::get('/authors/{author}', [AuthorController::class, 'show'])->name('authors.show.link');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index.link');

Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show.link');



