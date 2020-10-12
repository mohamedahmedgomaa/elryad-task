@extends('admin.layouts.app')
@inject('model', 'App\User')
@section('page_title')
    عرض المنتج
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
                <h3 class="box-title">عرض منتج {{$product->name}}</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="text-center col-12"><h2
                            class="text-black">بيانات المنتج</h2></div>
                    <div class="col-1"></div>
                    <div class="col-10">
                        <table class="table mb-0 text-center">
                            <thead>
                            <tr class="table-active text-white">
                                <th>اسم المنتج</th>
                                <th>سعر المنتج</th>
                                <th>العرض على المنتج</th>
                                <th>الكميه</th>
                                <th>صورة المنتج</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table-active text-white">
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->offer}}</td>
                                <td>{{$product->qty}}</td>
                                <td>
                                    @if ($product->image != null)
                                        <img src="{{url($product->image)}}" alt="000000" class="img-thumbnail"
                                             width="50px" height="50px">
                                    @else
                                        <img src="{{ asset('') }}adminlte/img/user2-160x160.jpg" class="user-image"
                                             alt="User Image" width="50px" height="50px">
                                    @endif
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.box -->

        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-10">
                        <table class="table mb-0 text-center">
                            <thead>
                            <tr class="table-active text-white">
                                <th>الوان المنتج</th>
                                <th>احجام المنتج</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table-active text-white">
                                <td>
                                    @foreach($colors_array as $color)
                                        <span class="btn btn-primary"> {{ $color }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($sizes_array as $size)
                                        <span class="btn btn-success"> {{ $size }}</span>
                                    @endforeach
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
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
