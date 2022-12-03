<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                @auth
                    @if (Auth::user()->role == 'admin')
                        <li
                            class="nav-item {{ request()->is('/spam_checker*') || request()->is('spam_checker*') ? 'active menu-open' : '' }}">
                            <a href="{{ url('/spam_checker') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>

                        <li
                            class="nav-item {{ request()->is('/category*') || request()->is('category*') ? 'active menu-open' : '' }}">
                            <a href="{{ url('/category') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Spam Checker Categorys
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>

                        <li
                            class="nav-item {{ request()->is('/word*') || request()->is('word*') ? 'active menu-open' : '' }}">
                            <a href="{{ url('/word') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Spam Checker Words
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>

                        {{-- logout  --}}
                        <li class="nav-item has-treeview menu">
                            <a class="nav-link " href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                                <p>Logout</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        {{-- logout --}}
                    @else
                        <li
                            class="nav-item {{ request()->is('/spam_checker*') || request()->is('spam_checker*') ? 'active menu-open' : '' }}">
                            <a href="{{ url('/spam_checker') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>
                        {{-- logout  --}}
                        <li class="nav-item has-treeview menu">
                            <a class="nav-link " href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                                <p>Logout</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        {{-- logout --}}
                    @endif
                @endauth
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>