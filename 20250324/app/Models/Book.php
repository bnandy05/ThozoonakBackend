<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    protected $table = "books";

    use HasFactory;
    protected $fillable = ['title', 'author', 'description', 'genre', 'published_year'];
    public function reviews() {
        return $this->hasMany(Review::class);
    }
}
