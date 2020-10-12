@extends('admin.layouts.app')
@section('page_title')
    المنتجات
@endsection
@section('small_title')
    المنتجات
@endsection
@section('content')
    <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
            @include('partials.validations_errors')
            <div class="message-flash">
                @include('flash::message')
            </div>
            <div class="col-xl-4">
                <a class="btn btn-success btn-md waves-effect waves-light mb-3"
                   href="{{url(route('admin.products_two.create'))}}"
                   style="margin-bottom: 20px">
                    <i class="fa fa-plus-circle"></i>اضافة المنتج الجديد
                </a>
            </div><!-- end col -->

            <div class="table-responsive">
                {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap' , 'id' => 'datatable_place'], true) !!}
            </div>
        </div>
    </div>

    <style>
        .dataTables_filter {
            float: left;
        }
    </style>
    @push('js')

        {!! $dataTable->scripts() !!}
        <script type="text/javascript">
            $('.message-flash .alert').not('.alert-important').delay(2000).fadeOut(2000);
            $(document).ready(function () {
                $('.select5').select2();
            });
        </script>
    @endpush

@endsection

