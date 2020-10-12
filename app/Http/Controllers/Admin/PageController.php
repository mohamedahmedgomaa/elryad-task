<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\categoryEdit;
use App\Http\Requests\pageEdit;
use App\Models\Page;
use App\DataTables\Admin\PageDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\pageCreate;
use App\Models\PageLang;
use App\Traits\PageTrait;
use Illuminate\Http\Request;

class PageController extends Controller
{
    use PageTrait;

    /**
     * Display a listing of the resource.
     *
     * @param PageDatatable $page
     * @return void
     */
    public function pages(PageDatatable $page)
    {
        return $page->render('admin.pages.index');
    }

    public function pageCreate()
    {
        return view('admin.pages.create');
    }

    public function pageStore(pageCreate $request)
    {
        $this->createNewPage($request->all());
        flash()->success(trans('admin.createMessageSuccess'));
        return redirect(route('admin.pages'));
    }

    public function pageEdit($id)
    {
        $model = Page::findOrFail($id);
        $pageLangAr = PageLang::where('page_id', $model->id)->where('lang_code', 'ar')->first();
        $pageLangEn = PageLang::where('page_id', $model->id)->where('lang_code', 'en')->first();

        return view('admin.pages.edit', compact('model', 'pageLangEn', 'pageLangAr'));
    }

    public function pageUpdate(pageEdit $request, $id)
    {
        $request['page_id'] = $id;
        if ($request['img'] == null) {
            $request['img'] = null;
        }
        $this->editPage($request->all());
        flash()->success(trans('admin.editMessageSuccess'));
        return redirect(route('admin.pages'));
    }


    public function pageDisabled($id)
    {
        $page = Page::find($id);

        // check data deleted or not
        if ($page != null) {
            $page->status = 0;
            $page->save();

            $success = true;
            $message = trans('admin.disabled_success');
        } else {
            $success = true;
            $message = trans('admin.disabled_error');
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

public function pageActivated($id)
    {
        $page = Page::find($id);

        // check data deleted or not
        if ($page != null) {
            $page->status = 1;
            $page->save();

            $success = true;
            $message = trans('admin.activated_success');
        } else {
            $success = true;
            $message = trans('admin.activated_error');
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

}
