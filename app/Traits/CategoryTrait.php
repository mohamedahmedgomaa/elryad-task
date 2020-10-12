<?php

namespace App\Traits;

use App\Models\Category;
use App\Models\CategoryLang;
use App\User;
use Illuminate\Support\Facades\DB;

trait CategoryTrait
{
    public function createNewCategory($request)
    {
        DB::beginTransaction();
        $category = new Category();
        $category->parent_id = 0;

        if ($request['parent_id'] != 0) {
            $category->parent_id = $request['parent_id'];
        }

        if ($request['img'] != null) {
            $img = $request['img'];
            $img_new_name = time() . $img->getClientOriginalName();
            $img->move('uploads/categories', $img_new_name);

            $category->img = 'uploads/categories/' . $img_new_name;
        }

        $category->save();

        $categoryLangAr = new CategoryLang();
        $categoryLangAr->category_id = $category->id;
        $categoryLangAr->name = $request['name_ar'];
        $categoryLangAr->description = $request['description_ar'];
        $categoryLangAr->lang_code = 'ar';

        $categoryLangAr->save();

        $categoryLangEn = new CategoryLang();
        $categoryLangEn->category_id = $category->id;
        $categoryLangEn->name = $request['name_en'];
        $categoryLangEn->description = $request['description_en'];
        $categoryLangEn->lang_code = 'en';

        $categoryLangEn->save();

        DB::commit();
        $category = Category::find($category->id);
        return $category;
    }

    public function editCategory($request)
    {
        DB::beginTransaction();
        $category = Category::findOrFail($request['category_id']);

        $category->parent_id = 0;

        if ($request['parent_id'] != 0) {
            $category->parent_id = $request['parent_id'];
        }

        if ($request['img'] != null) {
            $img = $request['img'];
            $img_new_name = time() . $img->getClientOriginalName();
            $img->move('uploads/categories', $img_new_name);

            $category->img = 'uploads/categories/' . $img_new_name;
            $category->save();
        }

        $category->save();

        $categoryLangAr = CategoryLang::where('category_id', $category->id)->where('lang_code', 'ar')->first();
        $categoryLangAr->name = $request['name_ar'];
        $categoryLangAr->description = $request['description_ar'];

        $categoryLangAr->save();

        $categoryLangEn = CategoryLang::where('category_id', $category->id)->where('lang_code', 'en')->first();
        $categoryLangEn->name = $request['name_en'];
        $categoryLangEn->description = $request['description_en'];

        $categoryLangEn->save();

        DB::commit();
        $category = Category::find($category->id);
        return $category;
    }
}
