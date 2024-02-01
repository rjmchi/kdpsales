<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $fillable = ['order_date', 'royalty_date', 'qty', 'royalty', 'book_id'];

    public function book() {
        return $this->belongsTo(Book::class);
    }
}



