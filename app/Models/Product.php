<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'sku',
        'name',
        'category_id',
        'purchase_price',
        'selling_price',
        'stock',
        'minimum_stock',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Dipakai di ProductController@destroy.
    // Hapus dua fungsi ini kalau model SaleItem / PurchaseItem belum ada.
    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class);
    }
}