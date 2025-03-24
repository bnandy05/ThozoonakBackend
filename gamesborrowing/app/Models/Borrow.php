<?php

namespace App\Models;

use App\Models\Games;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $table = 'borrows';

    public $timestamps = false;

    protected $fillable = ['game_id', 'borrower_name', 'borrowed_at', 'returned_at'];

    public function game()
    {
        return $this->belongsTo(Games::class, 'game_id');
    }
}
