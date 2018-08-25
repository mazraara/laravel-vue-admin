<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class ProductImage extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['product_id'];
    protected $appends = ['file_name', 'file_link'];
    protected $with = ['media'];

    public static function boot()
    {
        parent::boot();

        ProductImage::observe(new \App\Observers\UserActionObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'product_id' => 'integer|exists:products,id|max:4294967295|nullable',
            'file_name' => 'file|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'product_id' => 'integer|exists:products,id|max:4294967295|nullable',
            'file_name' => 'nullable'
        ];
    }

    public function getFileNameAttribute()
    {
        return $this->getFirstMedia('file_name');
    }

    /**
     * @return string
     */
    public function getFileLinkAttribute()
    {
        $file = $this->getFirstMedia('file_name');
        if (! $file) {
            return null;
        }

        return '<a href="' . $file->getUrl() . '" target="_blank">' . $file->file_name . '</a>';
    }

    /**
     * Get the product that owns the image.
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
