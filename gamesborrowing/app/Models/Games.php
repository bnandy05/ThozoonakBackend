<?php

namespace App\Models;

use App\Models\Borrow;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;
    
    protected $table = 'games';

    protected $fillable = ['title', 'publisher', 'available_copies'];

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
