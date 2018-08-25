<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductQuantityPrice extends Model
{
    /**
     * Get the product that owns the pricing.
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
