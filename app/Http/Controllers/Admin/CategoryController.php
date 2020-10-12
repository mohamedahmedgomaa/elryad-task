<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\categoryEdit;
use App\Model\Category;
use App\DataTables\Admin\CategoryDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\categoryCreate;
use App\Traits\CategoryTrait;

class CategoryController extends Controller
{
    use CategoryTrait;

    /**
     * Display a listing of the resource.
     *
     * @param CategoryDatatable $category
     * @return void
     */
    public function categories(CategoryDatatable $category)
    {
        return $category->render('admin.categories.index');
    }

    public function categoryCreate()
    {
        return view('admin.categories.create');
    }

    public function categoryStore(categoryCreate $request)
    {
        $this->createNewCategory($request->all());
        flash()->success(trans('admin.createMessageSuccess'));
        return redirect(route('admin.categories'));
    }

    public function categoryEdit($id)
    {
        $model = Category::findOrFail($id);
        $categoryLangAr = CategoryLang::where('category_id', $model->id)->where('lang_code', 'ar')->first();
        $categoryLangEn = CategoryLang::where('category_id', $model->id)->where('lang_code', 'en')->first();

        return view('admin.categories.edit', compact('model', 'categoryLangEn', 'categoryLangAr'));
    }

    public function categoryUpdate(categoryEdit $request, $id)
    {
        $request['category_id'] = $id;
        if ($request['img'] == null) {
            $request['img'] = null;
        }
        $this->editCategory($request->all());
        flash()->success(trans('admin.editMessageSuccess'));
        return redirect(route('admin.categories'));
    }


    public function categoryDelete($id)
    {
        $categoryLang = CategoryLang::where('category_id', $id)->get();
        foreach ($categoryLang as $item) {
            $item->delete();
        }
        $delete = Category::where('id', $id)->delete();

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
