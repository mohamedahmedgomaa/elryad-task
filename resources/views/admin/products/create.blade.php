@extends('admin.layouts.app')
@inject('model', 'App\User')
@section('page_title')
    اضافة منتج جديد
@endsection
@section('small_title')
    المنتجات
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">اضافة منتج جديد</h3>
            </div>
            <div class="box-body">
                <div class="box">
                    @include('partials.validations_errors')
                    <div class="box-body">
                        {!! Form::model($model, [
                            'action' => ['Admin\ProductController@productStore'],
                            'method' =>'post',
                            'files' =>true,
                        ]) !!}

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="category_id">{{trans('datatable.category_id')}} *</label>
                                <select class="form-control select2" id="category_id"
                                        name="category_id">
                                    <option value="" selected disabled>{{trans('datatable.category_id')}}</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">
                                            @if (session('lang') === 'en')
                                                <td>{{ $category->name_en }}</td>
                                            @else
                                                <td>{{ $category->name_ar }}</td>
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name">{{trans('admin.name')}}</label>
                            {!! Form::text('name', null , ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            <label for="description">الوصف</label>
                            {!! Form::textarea('description', null , ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>


                        <div class="form-group">
                            <label for="price">السعر</label>
                            {!! Form::number('price', null , ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            <label for="offer">العرض</label>
                            {!! Form::number('offer', null , ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>


                        <div class="form-group">
                            <label for="qty">الكميه</label>
                            {!! Form::number('qty', null , ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>


                        <div class="form-group">
                            <label for="image">{{trans('admin.imagePlace')}}</label>
                            <input type="file" class="form-control" name="image" required>
                        </div>


                        <div class="form-group">
                            <label class="col-form-label" for="color_id-0">الالوان</label>

                            <select class="form-control select2" id="color_id-0" multiple="multiple"
                                    name="color_id[]">
                                @foreach($colors as $color)
                                    <option value="{{$color->id}}">
                                        @if (session('lang') === 'en')
                                            <td>{{ $color->name_en }}</td>
                                        @else
                                            <td>{{ $color->name_ar }}</td>
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label class="col-form-label" for="size_id-0">الاحجام</label>

                            <select class="form-control select2" multiple="multiple" id="size_id-0"
                                    name="size_id[]">
                                @foreach($sizes as $size)
                                    <option value="{{$size->id}}">
                                        @if (session('lang') === 'en')
                                            <td>{{ $size->name_en }}</td>
                                        @else
                                            <td>{{ $size->name_ar }}</td>
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <br>
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
