<?php

namespace App\Traits;

use App\Model\ColorProduct;
use App\Model\ProductItem;
use App\Model\ProductSize;
use App\Model\Product;
use App\Model\ProductTwo;
use App\User;
use Illuminate\Support\Facades\DB;

trait ProductTrait
{
    public function createNewProduct($request)
    {
        DB::beginTransaction();
        $product = new Product();
        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->price = $request['price'];
        $product->offer = $request['offer'];
        $product->qty = $request['qty'];
        $product->category_id = $request['category_id'];

        if ($request['image'] != null) {
            $image = $request['image'];
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/products', $image_new_name);

            $product->image = 'uploads/products/' . $image_new_name;
            $product->save();
        }
        $product->save();


        $product->colors()->sync($request['color_id']);
        $product->sizes()->sync($request['size_id']);

        DB::commit();
        $product = User::find($product->id);
        return $product;
    }

    public function editProduct($request)
    {
        DB::beginTransaction();
        $product = Product::find($request['product_id']);

        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->price = $request['price'];
        $product->offer = $request['offer'];
        $product->qty = $request['qty'];
        $product->category_id = $request['category_id'];

        if ($request['image'] != null) {
            $image = $request['image'];
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/products', $image_new_name);

            $product->image = 'uploads/products/' . $image_new_name;
            $product->save();
        }
        $product->save();

        $product->colors()->sync($request['color_id']);
        $product->sizes()->sync($request['size_id']);

        DB::commit();
        $product = Product::find($product->id);
        return $product;
    }

    public function createNewProductTwo($request)
    {
        DB::beginTransaction();
        $product = new ProductTwo();
        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->price = $request['price'];
        $product->offer = $request['offer'];
        $product->qty = $request['qty'];
        $product->category_id = $request['category_id'];


        if ($request['image'] != null) {
            $image = $request['image'];
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/products', $image_new_name);

            $product->image = 'uploads/products/' . $image_new_name;
            $product->save();
        }
        $product->save();

        $productItemSize = new ProductItem();
        $productItemSize->product_id = $product->id;
        $productItemSize->key = 'size';
        $productItemSize->value = $request['sizes'];
        $productItemSize->save();

        $productItemColor = new ProductItem();
        $productItemColor->product_id = $product->id;
        $productItemColor->key = 'color';
        $productItemColor->value = $request['colors'];
        $productItemColor->save();


        DB::commit();
        $product = User::find($product->id);
        return $product;
    }

    public function editProductTwo($request)
    {
        DB::beginTransaction();
        $product = ProductTwo::find($request['product_id']);

        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->price = $request['price'];
        $product->offer = $request['offer'];
        $product->qty = $request['qty'];
        $product->category_id = $request['category_id'];

        if ($request['image'] != null) {
            $image = $request['image'];
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/products', $image_new_name);

            $product->image = 'uploads/products/' . $image_new_name;
            $product->save();
        }
        $product->save();


        $productItemSize = ProductItem::where('product_id', $product->id)->where('key', 'size')->first();
        $productItemSize->product_id = $product->id;
        $productItemSize->key = 'size';
        $productItemSize->value = $request['sizes'];
        $productItemSize->save();

        $productItemColor = ProductItem::where('product_id', $product->id)->where('key', 'color')->first();
        $productItemColor->product_id = $product->id;
        $productItemColor->key = 'color';
        $productItemColor->value = $request['colors'];
        $productItemColor->save();

        DB::commit();
        $product = Product::find($product->id);
        return $product;
    }

}
