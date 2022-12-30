<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">KinderGarden</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('dashboard') }}" class="d-block">{{ \Illuminate\Support\Facades\Auth::user()->role }}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('davomat') }}"
                       class="nav-link @if(request()->routeIs('davomat')) active @endif ">
                        <i class="fa fa-users nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile.edit') }}"
                       class="nav-link @if(request()->routeIs('profile.edit')) active @endif ">
                        <i class="fa fa-users nav-icon"></i>
                        <p>Profile</p>
                    </a>
                </li>
                @if(\Illuminate\Support\Facades\Auth::user()->role == 'tarbiyachi')
                    <li class="nav-item">
                        <a href="{{ route('attendance.index') }}"
                           class="nav-link @if(request()->routeIs('attendance.index')) active @endif ">
                            <i class="fa fa-users nav-icon"></i>
                            <p>Davomat</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('menu_list') }}"
                           class="nav-link @if(request()->routeIs('menu_list')) active @endif ">
                            <i class="fa fa-users nav-icon"></i>
                            <p>Menu</p>
                        </a>
                    </li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->role == 'zouch')
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}"
                           class="nav-link @if(request()->routeIs('users.index')) active @endif ">
                            <i class="fa fa-users nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('groups.index') }}"
                           class="nav-link @if(request()->routeIs('groups.index')) active @endif ">
                            <i class="fa fa-users nav-icon"></i>
                            <p>Guruhlar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('foods.index') }}"
                           class="nav-link @if(request()->routeIs('foods.index')) active @endif ">
                            <i class="fa fa-users nav-icon"></i>
                            <p>Haftalik Ovqatlar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('menu.index') }}"
                           class="nav-link @if(request()->routeIs('menu.index')) active @endif ">
                            <i class="fa fa-users nav-icon"></i>
                            <p>Ovqatlar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('warehouse.index') }}"
                           class="nav-link @if(request()->routeIs('warehouse.index')) active @endif ">
                            <i class="fa fa-users nav-icon"></i>
                            <p>Mahsulotlar</p>
                        </a>
                    </li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}"
                           class="nav-link @if(request()->routeIs('users.index')) active @endif ">
                            <i class="fa fa-users nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('children.index') }}"
                           class="nav-link @if(request()->routeIs('children.index')) active @endif ">
                            <i class="fa fa-users nav-icon"></i>
                            <p>Bolalar</p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <a href="{{ route('logout') }}"
                           class="nav-link" onclick="event.preventDefault();
                           this.closest('form').submit();">
                            <i class="fa fa-sign-out-alt nav-icon"></i>
                            <p>Log Out</p>
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
