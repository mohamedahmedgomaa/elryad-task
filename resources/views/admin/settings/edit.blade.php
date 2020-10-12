@extends('admin.layouts.app')
@section('page_title')
    {{trans('admin.settings')}}
@endsection
@section('small_title')
    {{trans('admin.settings')}}
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{trans('admin.settings')}}</h3>
            </div>
            <div class="box-body">
                <div class="box">
                    <div class="message-flash">
                        @include('flash::message')
                    </div>
                    @include('partials.validations_errors')
                    <div class="box-body">
                        <form action="{{route('settings.update')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field()}}
                            <div class="form-group">
                                <label for="phone">{{trans('admin.phone')}}</label>
                                <input type="text" class="form-control" name="phone"
                                       @if(isset($settings->phone)) value="{{$settings->phone}}" @endif>
                            </div>

                            <div class="form-group">
                                <label for="blog_email">{{trans('admin.email')}}</label>
                                <input type="text" class="form-control" name="email"
                                       @if(isset($settings->phone))  value="{{$settings->email}}" @endif>
                            </div>

                            <div class="form-group">
                                <label for="text">{{trans('admin.text')}}</label>
                                <textarea name="text" class="form-control"
                                          rows="8"> @if(isset($settings->phone))  {{$settings->text}} @endif</textarea>
                            </div>

                            <div class="form-group">
                                <label for="whats_app">{{trans('admin.whats_app')}}</label>
                                <input type="text" class="form-control" name="whats_app"
                                       @if(isset($settings->phone)) value="{{$settings->whats_app}}" @endif>
                            </div>

                            <div class="form-group">
                                <label for="instagram">{{trans('admin.instagram')}}</label>
                                <input type="text" class="form-control" name="instagram"
                                       @if(isset($settings->phone)) value="{{$settings->instagram}}" @endif>
                            </div>

                            <div class="form-group">
                                <label for="you_tube">{{trans('admin.you_tube')}}</label>
                                <input type="text" class="form-control" name="you_tube"
                                       @if(isset($settings->phone)) value="{{$settings->you_tube}}" @endif>
                            </div>

                            <div class="form-group">
                                <label for="twitter">{{trans('admin.twitter')}}</label>
                                <input type="text" class="form-control" name="twitter"
                                       @if(isset($settings->phone)) value="{{$settings->twitter}}" @endif>
                            </div>

                            <div class="form-group">
                                <label for="facebook">{{trans('admin.facebook')}}</label>
                                <input type="text" class="form-control" name="facebook"
                                       @if(isset($settings->phone)) value="{{$settings->facebook}}" @endif>
                            </div>

                            <div class="form-group">
                                <label for="image">{{trans('admin.image_site')}}</label>
                                <input type="file" class="form-control-file" name="image">
                                @if(isset($settings->image))
                                    <img src="{{asset($settings->image)}}" alt="000000" class="img-thumbnail"
                                         width="50px" height="50px">
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg">تعديل</button>
                        </form>
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
            $('.message-flash .alert').not('.alert-important').delay(2000).fadeOut(2000);
        })
    </script>
@endpush
