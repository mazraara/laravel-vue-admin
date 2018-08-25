<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @package App
 * @property string $name
 * @property string $description
 * @property string $quantity
 * @property string $user_id
 */
class Product extends Model
{
    protected $fillable = ['name', 'description', 'quantity'];

    protected $attributes = [
        'user_id' => 1,
    ];

    protected $appends = ['category_csv'];

    public static function boot()
    {
        parent::boot();

        Product::observe(new \App\Observers\UserActionObserver);
    }

    /**
     * The categories that belong to the product.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_product');

    }

    /**
     * Get the images for the product.
     */
    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }

    /**
     * Get the images for the product.
     */
    public function prices()
    {
        return $this->hasMany('App\ProductQuantityPrice');
    }


    /**
     * Get the size for the product.
     */
    public function size()
    {
        return $this->hasMany('App\Size');
    }

    /**
     * Get the color for the product.
     */
    public function colour()
    {
        return $this->hasOne('App\Color');
    }

    /**
     * Get product categories in csv format.
     */
    public function getCategoryCsvAttribute()
    {
        $productCategory = [];
        foreach ($this->categories as $category) {
            $productCategory[] = $category->name;
        }
        return $this->category_csv = implode(',', $productCategory);
    }

}
