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
                            'action' => ['Admin\ProductController@productUpdate',$model->id],
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
                            {!! Form::select('color_id[]',$colors,$model->colors->pluck('id')->toArray(), [
                            'class'=>'form-control select2',
                            'multiple' => 'multiple'
                            ]) !!}
                        </div>

                        <div class="form-group">
                            <label for="color_id">الاحجام</label>
                            {!! Form::select('size_id[]', $sizes,
                                $model->sizes->pluck('id')->toArray(),
                                ['class' => 'form-control select2',
                                'multiple' => 'multiple']) !!}
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
