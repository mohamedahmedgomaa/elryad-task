@extends('admin.layouts.app')
@section('page_title')
    {{trans('admin.categoryEdit')}}
@endsection
@section('small_title')
    {{trans('admin.categories')}}
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{trans('admin.categoryEdit')}}</h3>
            </div>
            <div class="box-body">
                <div class="box">
                    @include('partials.validations_errors')
                    <div class="box-body">
                        {!! Form::model($model, [
                            'action' => ['Admin\CategoryController@categoryUpdate',$model->id],
                            'method' =>'post',
                            'files' =>true,
                        ]) !!}

                        @inject('categories', 'App\Models\Category')
                        @if($categories->where('parent_id', 0)->where('id', '!=', $model->id)->count() != 0)
                            <div class="form-group ">
                                <label for="parent_id">{{trans('admin.category_id')}} *</label>
                                <select class="form-control select2" id="parent_id"
                                        name="parent_id">
                                    <option value="0">{{trans('admin.category_id')}}</option>
                                    @foreach($categories->where('id', '!=', $model->id)->where('parent_id', 0)->get() as $category)
                                        <option value="{{$category->id}}" {{ $category->id == $model->parent_id ? 'selected' : '' }}>
                                            @if (session('lang') === 'en')
                                                <td>{{ \App\Models\CategoryLang::where('category_id', $category->id)->where('lang_code', 'en')->first()->name }}</td>
                                            @else
                                                <td>{{ \App\Models\CategoryLang::where('category_id', $category->id)->where('lang_code', 'ar')->first()->name }}</td>
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif


                        <div class="form-group">
                            <label for="name_ar">{{trans('admin.name_ar')}}</label>
                            {!! Form::text('name_ar', $categoryLangAr->name , ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            <label for="name_en">{{trans('admin.name_en')}}</label>
                            {!! Form::text('name_en', $categoryLangEn->name , ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            <label for="description_ar">{{trans('admin.description_ar')}}</label>
                            {!! Form::textarea('description_ar', $categoryLangAr->description , ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            <label for="description_en">{{trans('admin.description_en')}}</label>
                            {!! Form::textarea('description_en', $categoryLangEn->description , ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            <label for="img">{{trans('admin.img')}}</label>
                            <input type="file" class="form-control" name="img">
                            @if ($model->img != null)
                                <img src="{{url($model->img)}}" alt="000000" class="img-thumbnail"
                                     width="50px" height="50px">
                            @endif
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">{{trans('admin.submit')}}</button>
                        </div>

                        {!! Form::close() !!}
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endpush
