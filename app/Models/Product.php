<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table='products';
protected $fillable = [
    'category_id', 'name', 'desc', 'price', 'quantity', 'rate', 'image', 'status',
    'old_price','discount','smalldesc','is_featured','top_selling','delivers_in','sku','tags',
    'weight','dimensions','brand'
]; 
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
        public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * Calculate the discounted price
     */
    public function getDiscountedPriceAttribute()
    {
        if ($this->discount && $this->discount > 0) {
            return $this->price - ($this->price * $this->discount / 100);
        }
        return $this->price;
    }

    /**
     * Check if product is in stock
     */
    public function getInStockAttribute()
    {
        return $this->quantity > 0;
    }
}
