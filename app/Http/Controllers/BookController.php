<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

     public function index(Request $request)
     {
         $books = Book::with(['author', 'category', 'year', 'language', 'publisher'])
             ->when($request->search, fn($q) => $q->where('title', 'like', "%{$request->search}%"))
             ->when($request->author_id, fn($q) => $q->where('author_id', $request->author_id))
             ->when($request->category_id, fn($q) => $q->where('category_id', $request->category_id))
             ->when($request->language_id, fn($q) => $q->where('language_id', $request->language_id))
             ->when($request->publisher_id, fn($q) => $q->where('publisher_id', $request->publisher_id))
             ->when($request->year_id, fn($q) => $q->where('year_id', $request->year_id))
             ->paginate(15);
     
         return view('books.index', [
             'books'      => $books,
             'categories' => Category::orderBy('name')->get(),
             'authors'    => Author::orderBy('name')->get(),
             'languages'  => Language::orderBy('name')->get(),
             'publishers' => Publisher::orderBy('name')->get(),
             'years'      => Year::orderBy('value', 'desc')->get(),
         ]);


    public function show(Book $book)
    {
        //
    }
}
