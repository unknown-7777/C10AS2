<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Language;
use App\Models\Publisher;
use App\Models\Year;

class HomeController extends Controller
{
    public function index()
    {
        $categories     = Category::all();
        $authors        = Author::all();
        $languages      = Language::all();
        $publishers     = Publisher::all();
        $years          = Year::all();
        
        return view('home.index', compact('categories', 'authors', 'languages', 'publishers','years'),
        [
            'bookCount'     => Book::count(),
            'authorCount'   => Author::count(),
            'categoryCount' => Category::count(),
            'books'   => Book::with(['author', 'category', 'year', 'language', 'publisher'])
                                   ->latest()
                                   ->paginate(10),
        ]);
    }
}
