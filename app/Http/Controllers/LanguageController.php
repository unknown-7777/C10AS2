<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    // public function index()
    // {
    //     $languages = Language::withCount('books')->orderBy('name')->get();

    //     return view('languages.index', compact('languages'));
    // }

    public function show(Language $language)
    {
        return redirect()->route('books.index.link', ['language_id' => $language->id]);
    }
}

