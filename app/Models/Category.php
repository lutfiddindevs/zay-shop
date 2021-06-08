<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Cart;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function product() {
        return $this->hasOne(Product::class, 'category_id', 'id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

}
