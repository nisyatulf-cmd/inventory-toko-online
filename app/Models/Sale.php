<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'qty', 'total_price', 'date'];

    public function product() { return $this->belongsTo(Product::class); }

    protected static function booted()
    {
        static::created(function ($sale) {
            $sale->product->decrement('stock', $sale->qty);
        });
    }
}