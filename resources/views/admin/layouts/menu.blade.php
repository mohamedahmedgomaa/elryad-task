<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">


    <li class="treeview {{ active_menu('settings')[0] }}">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>{{ trans('admin.Dashboard') }}</span>
            <span class="pull-right-container">
            </span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('settings')[1] }}">
            <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i>{{ trans('admin.Dashboard') }}</a></li>
        </ul>
    </li>

    <li class="treeview {{ active_menu('products')[0] }}">
        <a href="#">
            <i class="fa fa-list"></i> <span>المنتجات</span>
            <span class="pull-right-container"></span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('product')[1] }}">
            <li class=""><a href="{{ url('admin/products') }}"><i class="fa fa-list"></i>المنتجات</a></li>
            <li class=""><a href="{{ url(route('admin.products.create')) }}"><i class="fa fa-plus"></i>{{ trans('admin.add') }}</a></li>
        </ul>
    </li>

    <li class="treeview {{ active_menu('products_two')[0] }}">
        <a href="#">
            <i class="fa fa-list"></i> <span>المنتجات بالطريقه التانيه</span>
            <span class="pull-right-container"></span>
        </a>
        <ul class="treeview-menu" style="{{ active_menu('products_two')[1] }}">
            <li class=""><a href="{{ url('admin/products_two') }}"><i class="fa fa-list"></i>المنتجات بالطريقه التانيه</a></li>
            <li class=""><a href="{{ url(route('admin.products_two.create')) }}"><i class="fa fa-plus"></i>{{ trans('admin.add') }}</a></li>
        </ul>
    </li>

</ul>
