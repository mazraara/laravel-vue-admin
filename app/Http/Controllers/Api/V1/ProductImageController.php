<?php

namespace App\Http\Controllers\Api\V1;

use App\ProductImage;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductImage as ProductImageResource;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;

class ProductImageController extends Controller
{
    public function index()
    {
        return new ProductImageResource(ProductImage::with(['product'])->get());
    }

    public function show($id)
    {
        $product = ProductImage::with(['product'])->findOrFail($id);

        return new ProductImageResource($product);
    }

    public function store(StoreImageRequest $request)
    {

        $product = ProductImage::create($request->all());
        
        if ($request->hasFile('file_name')) {
            $product->addMedia($request->file('file_name'))->toMediaCollection('file_name');
        }

        return (new ProductImageResource($product))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateImageRequest $request, $id)
    {

        $product = ProductImage::findOrFail($id);
        $product->update($request->all());
        
        if (! $request->input('file_name') && $product->getFirstMedia('file_name')) {
            $product->getFirstMedia('file_name')->delete();
        }
        if ($request->hasFile('file_name')) {
            $product->addMedia($request->file('file_name'))->toMediaCollection('file_name');
        }

        return (new ProductImageResource($product))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {

        $product = ProductImage::findOrFail($id);
        $product->delete();

        return response(null, 204);
    }
}
