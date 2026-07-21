<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Language;
use App\Models\Publisher;
use App\Models\Year;
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
    }

    public function show(Book $book)
    {
        $book->load(['author', 'category', 'year', 'language', 'publisher']);
    
        $relatedByAuthor = Book::with(['category'])
            ->where('author_id', $book->author_id)
            ->where('id', '!=', $book->id)
            ->take(4)
            ->get();
    
        $relatedByCategory = Book::with(['author'])
            ->where('category_id', $book->category_id)
            ->where('id', '!=', $book->id)
            ->whereNotIn('id', $relatedByAuthor->pluck('id'))
            ->take(4)
            ->get();
    
        return view('books.show', compact('book', 'relatedByAuthor', 'relatedByCategory'));
    }
}