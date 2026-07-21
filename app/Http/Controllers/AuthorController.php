<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Language;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $authors = Author::withCount('books')
            ->when($request->search, fn($q) => $q->where('name', 'like', "%{$request->search}%"))
            ->when($request->country, fn($q) => $q->where('country', $request->country))
            ->orderBy('name')
            ->paginate(12);

        $languages = Language::orderBy('name')->get();

        return view('authors.index', compact('authors', 'languages'));
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

    // public function create()
    // {
    //     return view('authors.create');
    // }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name'       => 'required|string|max:255',
    //         'birth_date' => 'nullable|date',
    //         'country'    => 'nullable|string|max:255',
    //     ]);

    //     Author::create($validated);

    //     return redirect()->route('authors.index')->with('success', 'Author created successfully.');
    // }

    // public function edit(Author $author)
    // {
    //     return view('authors.edit', compact('author'));
    // }

    // public function update(Request $request, Author $author)
    // {
    //     $validated = $request->validate([
    //         'name'       => 'required|string|max:255',
    //         'birth_date' => 'nullable|date',
    //         'country'    => 'nullable|string|max:255',
    //     ]);

    //     $author->update($validated);

    //     return redirect()->route('authors.index')->with('success', 'Author updated successfully.');
    // }

    // public function destroy(Author $author)
    // {
    //     $author->delete();

    //     return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
    // }
}