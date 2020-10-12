@extends('admin.layouts.app')
@inject('model', 'App\Models\Category')
@section('page_title')
    {{trans('admin.categoryCreate')}}
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
                <h3 class="box-title">{{trans('admin.categoryCreate')}}</h3>
            </div>
            <div class="box-body">
                <div class="box">
                    @include('partials.validations_errors')
                    <div class="box-body">
                        {!! Form::model($model, [
                            'action' => ['Admin\CategoryController@categoryStore'],
                            'method' =>'post',
                            'files' =>true,
                        ]) !!}

                        @inject('categories', 'App\Models\Category')
                        @if($categories->where('parent_id', 0)->count() != 0)
                            <div class="form-group">
                                <label for="parent_id">{{trans('admin.category_id')}} *</label>
                                <select class="form-control select2" id="parent_id" required
                                        name="parent_id">
                                    <option value="0">{{trans('admin.category_id')}}</option>
                                    @foreach($categories->where('parent_id', 0)->get() as $category)
                                        <option
                                            value="{{$category->id}}">
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
                            {!! Form::text('name_ar', null , ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            <label for="name_en">{{trans('admin.name_en')}}</label>
                            {!! Form::text('name_en', null , ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            <label for="description_ar">{{trans('admin.description_ar')}}</label>
                            {!! Form::textarea('description_ar', null , ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            <label for="description_en">{{trans('admin.description_en')}}</label>
                            {!! Form::textarea('description_en', null , ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>


                        <div class="form-group">
                            <label for="img">{{trans('admin.img')}}</label>
                            <input type="file" class="form-control" name="img" required>
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
