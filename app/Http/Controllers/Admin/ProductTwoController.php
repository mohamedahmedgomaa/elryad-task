<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use App\Model\Color;
use App\Model\Product;
use App\DataTables\Admin\ProductTwoDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreate;
use App\Model\ProductItem;
use App\Model\Size;
use App\Traits\ProductTrait;
use Illuminate\Http\Request;

class ProductTwoController extends Controller
{
    use ProductTrait;

    /**
     * Display a listing of the resource.
     *
     * @param ProductTwoDatatable $place
     * @return void
     */
    public function products(ProductTwoDatatable $place)
    {
        return $place->render('admin.products_two.index');
    }


    public function productShow($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product_item_sizes = ProductItem::where('product_id', $product->id)->where('key', 'size')->first();
            $sizes_array = explode(',', $product_item_sizes->value);

            $product_item_colors = ProductItem::where('product_id', $product->id)->where('key', 'color')->first();
            $colors_array = explode(',', $product_item_colors->value);


            return view('admin.products_two.show', compact('product', 'colors_array', 'sizes_array'));
        }
        return redirect()->back();
    }


    public function productCreate()
    {
        $categories = Category::all();

        return view('admin.products_two.create', compact('categories'));
    }

    public function productStore(ProductCreate $request)
    {
        $colors = $request->colors;
        $sizes = $request->sizes;

        $request['colors'] = implode(',', $colors);

        $request['sizes'] = implode(',', $sizes);


        $this->createNewProductTwo($request->all());
        flash()->success(trans('admin.createMessageSuccess'));
        return redirect(route('admin.products_two'));
    }

    public function productEdit($id)
    {
        $model = Product::find($id);

        $product_item_sizes = ProductItem::where('product_id', $model->id)->where('key', 'size')->first();
        $sizes_array = explode(',', $product_item_sizes->value);

        $product_item_colors = ProductItem::where('product_id', $model->id)->where('key', 'color')->first();
        $colors_array = explode(',', $product_item_colors->value);

        $categories = Category::all();

        return view('admin.products_two.edit', compact('model', 'categories', 'sizes_array', 'colors_array'));
    }

    public function productUpdate(Request $request, $id)
    {
        $request['product_id'] = $id;

        if ($request['image'] == null) {
            $request['image'] = null;
        }

        $colors = $request->colors;
        $sizes = $request->sizes;

        $request['colors'] = implode(',', $colors);

        $request['sizes'] = implode(',', $sizes);

        $this->editProductTwo($request->all());
        flash()->success(trans('admin.editMessageSuccess'));
        return redirect(route('admin.products_two'));
    }


    public function productDelete($id)
    {
        $delete = Product::where('id', $id)->delete();

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = trans('company.delete_success');
        } else {
            $success = true;
            $message = trans('company.delete_error');
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

}
