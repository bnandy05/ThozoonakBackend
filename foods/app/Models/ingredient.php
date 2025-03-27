<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ingredient extends Model
{
    use HasFactory;

    protected $table = "ingredients";
    
    protected $fillable = ['name'];

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'food_ingredient');
    }
}
