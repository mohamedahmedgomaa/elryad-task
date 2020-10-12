@extends('admin.layouts.app')
@inject('model', 'App\Models\Page')
@section('page_title')
    {{trans('admin.pageCreate')}}
@endsection
@section('small_title')
    {{trans('admin.pages')}}
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{trans('admin.pageCreate')}}</h3>
            </div>
            <div class="box-body">
                <div class="box">
                    @include('partials.validations_errors')
                    <div class="box-body">
                        {!! Form::model($model, [
                            'action' => ['Admin\PageController@pageStore'],
                            'method' =>'post',
                            'files' =>true,
                        ]) !!}

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
