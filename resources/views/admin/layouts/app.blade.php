<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Elryad</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/Ionicons/css/ionicons.min.css') }}">
    <link href="{{asset('')}}adminlte/plugins/sweetalert/sweetalert2.min.css" rel="stylesheet" type="text/css"/>

    <!-- Theme style -->
    @if(direction() == 'ltr')
        <link rel="stylesheet" href="{{ asset('adminlte/css/AdminLTE.min.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('css/rtl/AdminLTE.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/rtl/bootstrap-rtl.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/rtl/rtl.css')}}">
    @endif


{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>--}}

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('design/adminlte/bower_components/select2/dist/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{ asset('adminlte/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert/sweetalert.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/lightbox2/css/lightbox.min.css')}}">


    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>

        .bg-danger {
            background-color: #dc3545 !important;
            color: white;
        }

        .bg-warning {
            background-color: #ffc107 !important;
            color: white;
        }

        .bg-success {
            background-color: #28a745 !important;
            color: white;
        }

        .bg-info {
            background-color: #17a2b8 !important;
            color: white;
        }

        .bg-danger .small-box-footer, .bg-warning .small-box-footer, .bg-success .small-box-footer, .bg-info .small-box-footer {
            color: white;
        }

        .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
        }

        .example-modal .modal {
            background: transparent !important;
        }

    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    {{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{ asset('') }}index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">Elryad</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">Elryad</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown notification-list">
                        @if (session('lang') === 'en')
                            <a href="{{url('lang/ar')}}" class="nav-link waves-effect" style="font-size: large"
                               role="button">Ar</a>
                        @else
                            <a href="{{url('lang/en')}}" class="nav-link waves-effect" style="font-size: large"
                               role="button">En</a>
                        @endif
                    </li>

                    <li class="dropdown user user-menu">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('') }}adminlte/img/user2-160x160.jpg" class="user-image"
                                 alt="User Image">
                            @guest
                            @else
                                {{--<span class="hidden-xs">{{auth()->user()->name }}</span>--}}
                            @endguest
                        </a>

                        <ul class="dropdown-menu">
                            <!-- User image -->

                            <li class="user-header">
                                <img src="{{ asset('') }}adminlte/img/user2-160x160.jpg" class="img-circle"
                                     alt="User Image">

                                <p>
                                    @guest
                                    @else
                                        {{--{{auth()->user()->name }} - Web Developer--}}
                                    @endguest
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-right btn btn-danger">

                                    <a href="{{ route('admin.logout') }}" style="color: white"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fa fa-btn fa-sign"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="GET"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>

                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('') }}adminlte/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    @guest
                    @else
                        {{--<p>{{auth()->user()->name }}</p>--}}
                    @endguest
                </div>
            </div>

            @include('admin.layouts.menu')

        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('page_title')
                <small>@yield('small_title')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> {{trans('admin.Dashboard')}}</a></li>
                <li class="active">@yield('small_title')</li>
            </ol>
        </section>
        <div class="message-flash">
            @include('flash::message')
        </div>
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.13
        </div>
        <strong>Copyright &copy; 2020 Developed By <a href="https://www.e-ramo.net/">Emad</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('') }}adminlte/plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('') }}adminlte/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="{{ asset('') }}adminlte/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- Select2 -->
<script src="{{asset('design/adminlte/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script src="{{ asset('') }}adminlte/plugins/fastclick/lib/fastclick.js"></script>
<script src="{{ asset('adminlte/plugins/jquery-confirm/jquery.confirm.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{asset('adminlte/plugins/lightbox2/js/lightbox.min.js')}}"></script>


<!-- Sweet Alerts js -->
<script src="{{asset('')}}adminlte/plugins/sweetalert/sweetalert2.min.js"></script>

<!-- Sweet alert init js-->
<script src="{{asset('')}}adminlte/plugins/sweetalert/sweet-alerts.init.js"></script>


<link rel="stylesheet"
      href="{{ url('design/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<!-- DataTables -->
<script src="{{ url('design/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script
    src="{{ url('design/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script
    src="{{ url('design/adminlte/bower_components/datatables.net-bs/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('vendor/datatables/buttons.server-side.js') }}"></script>


{{-- Texterea --}}
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    // CKEDITOR.replace('editor1');
</script>

<!-- AdminLTE App -->
<script src="{{ asset('') }}adminlte/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
{{--<script src="{{ asset('') }}adminlte/js/demo.js"></script>--}}
<script>
    $(document).ready(function () {
        $('.message-flash .alert').not('.alert-important').delay(2000).fadeOut(2000);
        $('.sidebar-menu').tree();
        $("#dataTableBuilder_wrapper .dt-buttons").css("text-align", "end");
    })
</script>
<script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox.min.js"></script>

@stack('scripts')
@stack('js')
</body>
</html>
