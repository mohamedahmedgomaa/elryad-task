<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use App\Model\Color;
use App\Model\Product;
use App\DataTables\Admin\ProductDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreate;
use App\Model\Size;
use App\Traits\ProductTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ProductTrait;

    /**
     * Display a listing of the resource.
     *
     * @param ProductDatatable $place
     * @return void
     */
    public function products(ProductDatatable $place)
    {
        return $place->render('admin.products.index');
    }


    public function productShow($id)
    {
        $product = Product::find($id);
        if ($product) {
            $colors = $product->colors;
            $sizes = $product->sizes;

        return view('admin.products.show', compact('product', 'colors', 'sizes'));
        }
        return redirect()->back();
    }


    public function productCreate()
    {
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.products.create', compact('categories', 'colors', 'sizes'));
    }

    public function productStore(ProductCreate $request)
    {
        $this->createNewProduct($request->all());
        flash()->success(trans('admin.createMessageSuccess'));
        return redirect(route('admin.products'));
    }

    public function productEdit($id)
    {
        $model = Product::findOrFail($id);

        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();

        $colors = $colors->pluck('name_ar', 'id')->toArray();

        $sizes = $sizes->pluck('name_ar', 'id')->toArray();

        return view('admin.products.edit', compact('model', 'categories', 'colors', 'sizes'));
    }

    public function productUpdate(Request $request, $id)
    {
        $request['product_id'] = $id;

        if ($request['image'] == null) {
            $request['image'] = null;
        }

        $this->editProduct($request->all());
        flash()->success(trans('admin.editMessageSuccess'));
        return redirect(route('admin.products'));
    }


    public function productDelete($id)
    {
        $delete = Product::where('id', $id)->delete();

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = 'تم الحزف بنجاح';
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
