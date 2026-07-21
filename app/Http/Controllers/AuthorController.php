<?php
namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;
class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $authors = Author::withCount('books')
            ->when($request->search, fn($q) => $q->where(function($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                  ->orWhere('surname', 'like', "%{$request->search}%");
            }))
            ->when($request->country, fn($q) => $q->where('country', $request->country))
            ->orderBy('name')
            ->paginate(12);

        $countries = Author::whereNotNull('country')
            ->distinct()
            ->orderBy('country')
            ->pluck('country');

        return view('authors.index', compact('authors', 'countries'));
    }

    public function show(Author $author)
    {
        $author->loadCount('books')
               ->load(['books.category', 'books.year', 'books.language', 'books.publisher']);
        $categoryIds = $author->books->pluck('category_id')->unique();
        $relatedAuthors = Author::withCount('books')
            ->whereHas('books', fn($q) => $q->whereIn('category_id', $categoryIds))
            ->where('id', '!=', $author->id)
            ->take(6)
            ->get();
        return view('authors.show', compact('author', 'relatedAuthors'));
    }
}