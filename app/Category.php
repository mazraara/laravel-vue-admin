<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $hidden = ['pivot'];

    /**
     * The users that belong to the role.
     */
    public function products()
    {
        return $this->belongsToMany('App\Product', 'category_product');
    }
}
