<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyMenu extends Model
{
    protected $table = "menus";

    protected $fillable = ['name', 'description', 'category', 'price'];
}
