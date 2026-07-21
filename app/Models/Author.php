<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /** @use HasFactory<\Database\Factories\AuthorFactory> */
    use HasFactory;

    protected $fillable = [
    'name',
    'surname',
    'birth_date',
    'death_date',
    'bio'
    ];

    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
