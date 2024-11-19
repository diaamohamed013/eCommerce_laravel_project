<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link @if (request()->is('dashboard*')) active @endif">
                        <i class="fas fa-chart-pie nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item @if (request()->is('products*')) menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if (request()->is('products*')) active @endif">
                        {{-- <i class="nav-icon fas fa-tags"></i> --}}
                        <i class="fas fa-cart-plus nav-icon"></i>
                        <p>
                            Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.products.create') }}" class="nav-link ml-3 @if (request()->is('products/create')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.products.index') }}" class="nav-link ml-3 @if (request()->is('products')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Products</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if (request()->is('categories*')) menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if (request()->is('categories*')) active @endif">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.create') }}" class="nav-link ml-3 @if (request()->is('categories/create')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.index') }}" class="nav-link ml-3 @if (request()->is('categories')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if (request()->is('tags*')) menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if (request()->is('tags*')) active @endif">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Tags
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.tags.create') }}" class="nav-link ml-3 @if (request()->is('tags/create')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Tag</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.tags.index') }}" class="nav-link ml-3 @if (request()->is('tags')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Tags</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if (request()->is('brands*')) menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if (request()->is('brands*')) active @endif">
                        <i class="nav-icon fas fa-paint-brush"></i>
                        <p>
                            Brands
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.brands.create') }}" class="nav-link ml-3 @if (request()->is('brands/create')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Brand</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.brands.index') }}" class="nav-link ml-3 @if (request()->is('brands')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Brands</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ url('roles') }}" class="nav-link @if (request()->is('roles*')) active @endif">
                        <i class="fas fa-thumbtack nav-icon"></i>
                        <p>Roles</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('permissions') }}" class="nav-link @if (request()->is('permission*')) active @endif">
                        <i class="far fa-bookmark nav-icon"></i>
                        <p>Permissions</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('users') }}" class="nav-link @if (request()->is('users*')) active @endif">
                        <i class="fas fa-users nav-icon"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.message.show') }}"
                        class="nav-link @if (request()->is('messages*')) active @endif">
                        <i class="fas fa-envelope nav-icon"></i>
                        <p>Messages</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link bg-danger rounded-pill mt-3 text-center"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
