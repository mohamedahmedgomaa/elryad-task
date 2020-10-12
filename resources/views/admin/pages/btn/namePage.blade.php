@if (session('lang') === 'en')
    <td>{{ \App\Models\PageLang::where('page_id', $id)->where('lang_code', 'en')->first()->name }}</td>
@else
    <td>{{ \App\Models\PageLang::where('page_id', $id)->where('lang_code', 'ar')->first()->name }}</td>
@endif
