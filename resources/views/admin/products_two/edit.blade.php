@extends('admin.layouts.app')
@section('page_title')
    تعديل المنتج
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
                <h3 class="box-title">تعديل المنتج</h3>
            </div>
            <div class="box-body">
                <div class="box">
                    @include('partials.validations_errors')
                    <div class="box-body">
                        {!! Form::model($model, [
                            'action' => ['Admin\ProductTwoController@productUpdate',$model->id],
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
                                        <option
                                            value="{{$category->id}}" {{ ( $category->id == $model->category_id) ? 'selected' : '' }}>
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
                            {!! Form::number('offer', null , ['class' => 'form-control']) !!}
                        </div>


                        <div class="form-group">
                            <label for="qty">الكميه</label>
                            {!! Form::number('qty', null , ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>


                        <div class="form-group">
                            <label for="image">صورة المنتج</label>
                            <input type="file" class="form-control" name="image">
                            @if ($model->image != null)
                                <img src="{{url($model->image)}}" alt="000000" class="img-thumbnail"
                                     width="50px" height="50px">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="color_id">الالوان</label>

                            <div class="col-lg-12">
                                <div class="card-box">
                                    <button id="items_btn"
                                            class="btn btn-success btn-rounded width-md waves-effect waves-light"><i
                                            class="mdi mdi-plus-box"></i>اضافة لون اخر
                                    </button>
                                    <br>
                                    <div id="items" class="row">
                                        @foreach($colors_array as $color)
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="colors-0" name="colors[]"
                                                       value="{{ $color }}"
                                                       style="margin: 10px">
                                                @if($errors->has('colors'))
                                                    <ul class="parsley-errors-list filled">
                                                        <li class="parsley-required">{{ $errors->first('colors') }}</li>
                                                    </ul>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="color_id">الاحجام</label>

                                <div class="col-lg-12">
                                    <div class="card-box">
                                        <button id="items_btn_2"
                                                class="btn btn-success btn-rounded width-md waves-effect waves-light"><i
                                                class="mdi mdi-plus-box"></i> اضافة حجم اخر
                                        </button>
                                        <br>
                                        <div id="items_2" class="row">

                                            @foreach($sizes_array as $size)
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="sizes-0" name="sizes[]"
                                                           value="{{ $size }}"
                                                           style="margin: 10px">
                                                    @if($errors->has('sizes'))
                                                        <ul class="parsley-errors-list filled">
                                                            <li class="parsley-required">{{ $errors->first('sizes') }}</li>
                                                        </ul>
                                                    @endif
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">{{trans('admin.submit')}}</button>
                    </div>

                    {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
            </div>

            <!-- /.box -->
        </div>
    </section>
    <!-- /.content -->
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            let items_btn = $('#items_btn');
            let label_name = "اللون";

            items_btn.on('click', function (event) {
                event.preventDefault();
                $('#items').append('                <div class="col-sm-6">\n' +
                    '                                        <input type="text" class="form-control" id="colors" name="colors[]" style="margin: 10px">\n' +
                    '                                    </div>');
            });

            let items_btn_2 = $('#items_btn_2');
            let label_name_2 = "الحجم";

            items_btn_2.on('click', function (event) {
                event.preventDefault();
                $('#items_2').append('                <div class="col-sm-6">\n' +
                    '                                        <input type="text" class="form-control" id="sizes" name="sizes[]" style="margin: 10px">\n' +
                    '                                    </div>');
                var last_checkbox = $('.js-switch');
                var init = new Switchery(last_checkbox[last_checkbox.length - 1]);
            });
        });
    </script>
@endpush
