@extends('admin.layouts.app')

@section('page_title')

@endsection
@section('small_title')

    {{trans('admin.Dashboard')}}
@endsection
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53%</h3>


                            <p>{{trans('admin.Bounce Rate')}}</p>
                        </div>
                        <div class="icon" >
                            <i class="ion ion-stats-bars" ></i>
                        </div>
                        <a href="{{ url('admin/users') }}" class="small-box-footer">
                            <i class="fa fa-arrow-circle-o-right"></i> {{trans('admin.More Info')}} </a>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>60</h3>

                            <p>Test</p>
                        </div>
                        <div class="icon">
                            <i class="ion-ios-albums-outline"></i>
                        </div>
                        <a href="{{ url('admin/users') }}" class="small-box-footer">
                            <i class="fa fa-arrow-circle-o-right"></i> {{trans('admin.More Info')}} </a>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $userCount }}</h3>


                            <p>{{trans('admin.users')}}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-people"></i>
                        </div>
                        <a href="{{ url('admin/users') }}" class="small-box-footer">
                            <i class="fa fa-arrow-circle-o-right"></i> {{trans('admin.More Info')}} </a>
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>70</h3>

                            <p>إختبار</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ url('admin/users') }}" class="small-box-footer">
                            <i class="fa fa-arrow-circle-o-right"></i> {{trans('admin.More Info')}} </a>

                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <h3 class="info-box-text"> {{trans('admin.Orders')}}</h3>

                            <span class="info-box-number">50</span>
                            <span class="info-box-number">
                                <a href="{{ url('admin/packages_orders/pendingOrderUmrah') }}">
                                <i class="fa fa-angle-double-right"></i>
                                </a>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-lg-3 col-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-first-order"></i></span>

                        <div class="info-box-content">
                            <h3 class="info-box-text">{{trans('admin.categories')}}</h3>

                            <span class="info-box-number">{{$categoryCount}}</span>
                            <span class="info-box-number">
                                <a href="{{ url('admin/categories') }}">
                               <i class="fa fa-angle-double-right"></i>
                               </a>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

{{--                <div class="col-lg-3 col-6">--}}
{{--                    <div class="info-box mb-3">--}}
{{--                        <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-paper-plane"></i></span>--}}

{{--                        <div class="info-box-content">--}}
{{--                            <h3 class="info-box-text">{{trans('admin.pages')}}</h3>--}}
{{--                            <span class="info-box-number">{{ $pageCount }}</span>--}}
{{--                            <a href="{{ url('admin/pages') }}">--}}
{{--                                <i class="fa fa-angle-double-right"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <!-- /.info-box-content -->--}}
{{--                    </div>--}}
{{--                    <!-- /.info-box -->--}}
{{--                </div>--}}


{{--                <div class="col-lg-3 col-6">--}}
{{--                    <div class="info-box">--}}
{{--                        <span class="info-box-icon bg-info elevation-1"><i class="fa fa-building"></i></span>--}}

{{--                        <div class="info-box-content">--}}
{{--                            <h3 class="info-box-text"> {{trans('admin.places')}}</h3>--}}

{{--                            <span class="info-box-number">{{ $placeCount }}</span>--}}
{{--                            <span class="info-box-number">--}}
{{--                                 <a href="{{ url('admin/places') }}">--}}
{{--                                <i class="fa fa-angle-double-right"></i>--}}
{{--                                </a>--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <!-- /.info-box-content -->--}}
{{--                    </div>--}}
{{--                    <!-- /.info-box -->--}}
{{--                </div>--}}
{{--                <!-- /.col -->--}}


            </div>

        </div><!-- /.container-fluid -->
    </section>

@endsection
