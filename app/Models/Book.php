<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['asin', 'title', 'cost', 'price','royalty'];

    public function sales()
    {
        return $this->hasMany(Sales::class);
    }
}

