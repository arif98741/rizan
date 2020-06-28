<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="{{ url('admin') }}" class="brand-link">
        <img src="{{ asset('asset/back/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('asset/back/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Administrator</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">


                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('/') }}" target="_blank" class="nav-link ">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            View Homepage
                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clock"></i>
                        <p>
                            Food
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.food.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Food List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.food.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Food</p>
                            </a>
                        </li>


                    </ul>

                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-university"></i>
                        <p>
                            Restaurant
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.restaurant.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Restaurant List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.feature') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Feature Restaurant</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.restaurant.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Restaurant</p>
                            </a>
                        </li>


                    </ul>

                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Restaurant Category
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.restaurant_category.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.restaurant_category.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>


                    </ul>

                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-place-of-worship"></i>
                        <p>
                            Place
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.place.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Place List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.place.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Place</p>
                            </a>
                        </li>

                    </ul>

                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
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
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Page
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.page.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Place List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.page.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Place</p>
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
