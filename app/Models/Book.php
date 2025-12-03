<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['asin', 'title', 'cost', 'price','royalty'];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function scopeWithOrderedSales($query) {
        return $query->with(['sales' => function ($q) {
            $q->orderBy('order_date');
        }]);
    }


}
