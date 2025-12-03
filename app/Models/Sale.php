<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['order_date', 'royalty_date', 'qty', 'royalty', 'book_id'];

    public function book() {
        return $this->belongsTo(Book::class);
    }
}
