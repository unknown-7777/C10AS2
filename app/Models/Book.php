<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'code',
        'page_count',
        'description',
        'author_id',
        'category_id',
        'year_id',
        'language_id',
        'publisher_id',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}