@if (session('lang') === 'en')
    <td>{{ \App\Models\CategoryLang::where('category_id', $id)->where('lang_code', 'en')->first()->name }}</td>
@else
    <td>{{ \App\Models\CategoryLang::where('category_id', $id)->where('lang_code', 'ar')->first()->name }}</td>
@endif
