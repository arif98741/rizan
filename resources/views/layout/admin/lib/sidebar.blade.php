<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Brand Logo -->
    <a href="{{ url('admin') }}" class="brand-link">
        <img src="{{ asset('asset/back/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Dashboard</span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('asset/back/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    Administrator
                </a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">



                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link @if(url()->current() == route('admin.dashboard')): active
                    @endif ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- <li class="nav-item ">
                    <a href="{{ url('/') }}" target="_blank" class="nav-link ">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            View Homepage
                        </p>
                    </a>

                </li> -->


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link @if(url()->current() == route('admin.product.index')): active
                    @endif ">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                           Product
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.product.index') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Member List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.product.create') }}" class="nav-link">
                                <i class="far fa-plus nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>


                    </ul>


                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link @if(url()->current() == route('admin.team_member.index')): active
                    @endif ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Team Member
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.team_member.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Member List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.team_member.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Member</p>
                            </a>
                        </li>


                    </ul>


                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link  @if(url()->current() == route('admin.page.index')): active @endif ">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Page
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.page.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Page List</p>
                            </a>
                        </li>



                    </ul>


                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link  @if(url()->current() == route('admin.setting')): active @endif ">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Setting
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.setting') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Setting</p>
                            </a>
                        </li>


                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.xml.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>XML</p>
                            </a>
                        </li>


                    </ul>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
