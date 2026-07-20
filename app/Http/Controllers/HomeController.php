<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'bookCount'     => Book::count(),
            'authorCount'   => Author::count(),
            'categoryCount' => Category::count(),
            'recentBooks'   => Book::with(['author', 'category', 'year', 'language', 'publisher'])
                                   ->latest()
                                   ->take(10)
                                   ->get(),
        ]);
    }
}
