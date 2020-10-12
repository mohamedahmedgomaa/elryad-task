@extends('admin.layouts.app')
@section('page_title')
    {{trans('admin.pageEdit')}}
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
                <h3 class="box-title">{{trans('admin.pageEdit')}}</h3>
            </div>
            <div class="box-body">
                <div class="box">
                    @include('partials.validations_errors')
                    <div class="box-body">
                        {!! Form::model($model, [
                            'action' => ['Admin\PageController@pageUpdate',$model->id],
                            'method' =>'post',
                            'files' =>true,
                        ]) !!}

                        <div class="form-group">
                            <label for="name_ar">{{trans('admin.name_ar')}}</label>
                            {!! Form::text('name_ar', $pageLangAr->name , ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            <label for="name_en">{{trans('admin.name_en')}}</label>
                            {!! Form::text('name_en', $pageLangEn->name , ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            <label for="description_ar">{{trans('admin.description_ar')}}</label>
                            {!! Form::textarea('description_ar', $pageLangAr->description , ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            <label for="description_en">{{trans('admin.description_en')}}</label>
                            {!! Form::textarea('description_en', $pageLangEn->description , ['class' => 'form-control', 'required' => 'required']) !!}
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
