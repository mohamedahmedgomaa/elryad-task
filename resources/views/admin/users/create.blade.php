@extends('admin.layouts.app')
@inject('model', 'App\User')
@section('page_title')
    {{trans('admin.userCreate')}}
@endsection
@section('small_title')
    {{trans('admin.users')}}
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{trans('admin.userCreate')}}</h3>
            </div>
            <div class="box-body">
                <div class="box">
                    @include('partials.validations_errors')
                    <div class="box-body">
                        {!! Form::model($model, [
                            'action' => ['Admin\UserController@userStore'],
                            'method' =>'post',
                            'files' =>true,
                        ]) !!}


                        <div class="form-group">
                            <label for="name">{{trans('admin.name')}}</label>
                            {!! Form::text('name', null , ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="email">{{trans('admin.email')}}</label>
                            {!! Form::email('email', null , ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="mobile">{{trans('admin.mobile')}}</label>
                            {!! Form::text('mobile', null , ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="password">{{trans('admin.password')}}</label>
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">{{trans('admin.password_confirmation')}}</label>
                            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="users-date" class="col-form-label">{{trans('admin.date')}} *</label>
                            <input type="email"  class="form-control" id="users-date" value="{{$model->birth_date}}" name="birth_date" required>
                        </div>

                        <div class="form-group">
                            <label for="image">{{trans('admin.image')}}</label>
                            <input type="file" class="form-control-file" name="image">
                            @if ($model->image != null)
                                <img src="{{Storage::url($model->image)}}" alt="000000" class="img-thumbnail"
                                     width="50px" height="50px">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="gender">{{trans('admin.gender')}} *</label>
                            <div class="form-control row">
                                <input type="radio" id="gender" name="gender" class="male" checked required
                                       value="male"> {{trans('admin.male')}}
                                <input type="radio" id="gender" name="gender" class="female" style="@if(direction() == 'ltr') margin-left: 30px; @else margin-right: 30px; @endif" required
                                       value="female"> {{trans('admin.female')}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user_type">{{trans('admin.user_type')}} *</label>
                            <div class="form-control row">
                                <input type="radio" id="user_type" name="user_type" class="admin" checked required
                                       value="admin"> {{trans('admin.admin')}}
                                <input type="radio" id="user_type" name="user_type" class="client" style="@if(direction() == 'ltr') margin-left: 30px; @else margin-right: 30px; @endif" required
                                       value="client"> {{trans('admin.client')}}
                                <input type="radio" id="user_type" name="user_type" class="representative" style="@if(direction() == 'ltr') margin-left: 30px; @else margin-right: 30px; @endif" required
                                       value="representative"> {{trans('admin.representative')}}
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
