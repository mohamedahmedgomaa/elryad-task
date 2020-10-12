<?php

use App\Model\Setting;
use Illuminate\Support\Facades\Storage;

function responseJson($status, $message, $data=null)
{
    $response = [
        'status' => $status,
        'message' => $message,
        'data' => $data,
    ];
    return response()->json($response);
}


if (!function_exists('up')) {
    function up() {
        return new \App\Http\Controllers\Upload;
    }
}
if (! function_exists('uploadImage')) {
    /**
     * @param $image \Illuminate\Http\UploadedFile|array
     * @param string $path
     * @param null $old
     * @return string|array
     */
    function uploadImage($image, $path = 'uploads',$old = null)
    {
        if ($old){
            Storage::has($old) ? Storage::delete($old) : '';
        }

        if (is_array($image)) {
            $images = [];
            foreach ($image as $item) {
                $images[] = $item->store('uploads');
            }

            return $images;
        }

        return $image->store('uploads');
    }
}


function settings()
{
    $settings = AppSetting::find(1);
    if ($settings) {
        return $settings;
    } else {
        return new Setting;
    }
}


if (!function_exists('active_menu')) {
    function active_menu($link) {
        if (preg_match('/'.$link.'/i', Request::segment(2))) {
            return ['menu-open', 'display:block'];
        } else {
            return ['', ''];
        }
    }
}


if (!function_exists('lang')) {
    function lang() {
        if (session()->has('lang')) {
            return session('lang');
        } else {
            return 'ar';
        }
    }
}


if (!function_exists('direction')) {
    function direction() {
        if (session()->has('lang')) {
            if (session('lang') == 'ar') {
                return 'rtl';
            } else {
                return 'ltr';
            }
        } else {
            return 'rtl';
        }
    }
}

if (!function_exists('datatable_lang')) {
    function datatable_lang() {
        return 	['sProcessing' => trans('datatable.sProcessing'),
            'sLengthMenu' => trans('datatable.sLengthMenu'),
            'sZeroRecords' => trans('datatable.sZeroRecords'),
            'sEmptyTable' => trans('datatable.sEmptyTable'),
            'sInfo' => trans('datatable.sInfo'),
            'sInfoEmpty' => trans('datatable.sInfoEmpty'),
            'sInfoFiltered' => trans('datatable.sInfoFiltered'),
            'sInfoPostFix' => '',
            'sSearch' => trans('datatable.sSearch'),
            'sUrl' => '',
            'sInfoThousands' => trans('datatable.sInfoThousands'),
            'sLoadingRecords' => trans('datatable.sLoadingRecords'),
            'oPaginate' =>  [
                'sFirst'=> trans('datatable.sFirst'),
                'sLast'=> trans('datatable.sLast'),
                'sNext'=> trans('datatable.sNext'),
                'sPrevious'=> trans('datatable.sPrevious')
            ],
            'oAria' => [
                'sSortAscending'=> trans('datatable.sSortAscending'),
                'sSortDescending'=> trans('datatable.sSortDescending')
            ],
        ];
    }
}
