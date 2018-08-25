<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\ProductPrice;
use App\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product as ProductResource;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\ProductImage;
use App\ProductQuantityPrice;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    public function index()
    {
        return new ProductResource(Product::with(['categories'])->get());
    }

    public function show($id)
    {
        $product = Product::with(['categories'])->findOrFail($id);

        return new ProductResource($product);
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());
        $product->categories()->sync($request->input('categories.*.id'));

        // here goes the logic yo save the product sizes & colours
        // need to set this relationship in the product model
        // pass the size id & color id & product id to this method
        // $product->sizeColor()->sync()

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        $product->categories()->sync($request->input('categories.*.id'));

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response(null, 204);
    }

    // todo: move product price endpoints to seperate controller

    public function price(StoreProductPriceRequest $request, $id){

        $product = Product::findOrFail($id);
        $productPrice = new ProductQuantityPrice();
        $productPrice->fill($request->all());
        $productPrice->product_id = $product->id;
        $productPrice->save();

        return (new ProductPrice($productPrice))
            ->response()
            ->setStatusCode(201);
    }

    public function priceDestroy($id){

        $productPrice = ProductQuantityPrice::findOrFail($id);
        $productPrice->delete();

        return response(null, 204);

    }
}
