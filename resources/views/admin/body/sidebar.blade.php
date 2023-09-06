@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Easy</b> Shop</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class=" {{ $route == 'dashboard' ? 'active' : '' }}  ">
                <a href="{{ url('admin/dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ $prefix == '/product' ? 'active' : ' ' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Product</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'add.product' ? 'activ' : '' }}">
                        <a href="{{ route('add.product') }}"><i class="ti-more"></i>Add Product</a>
                    </li>
                    <li class="{{ $route == 'manage-product' ? 'active' : '' }}">
                        <a href="{{ route('manage-product') }}"><i class="ti-more"></i>Manage Product</a>
                    </li>

                </ul>
            </li>
            <li class="treeview  {{ $prefix == '/User' ? 'active' : ' ' }}">
                <a href="#">
                    <i data-feather="mail"></i> <span>User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu  ">
                    <li class="{{ $route == 'user.product' ? 'activ' : '' }}">
                        <a href="{{ route('user.product') }}"><i class="ti-more"></i>
                            User Product
                        </a>
                    </li>
                    <li class=" {{ $route == 'assign.product' ? 'activ' : '' }}">
                        <a href="{{ route('assign.product') }}"><i class="ti-more"></i> Assign Product User  </a>
                    </li>


                </ul>
            </li>



        </ul>
    </section>
    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title=""
            data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
