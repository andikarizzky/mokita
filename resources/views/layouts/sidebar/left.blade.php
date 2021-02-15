<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}"><i class="menu-icon fa fa-laptop" style="color: red"></i>Dashboard </a>
                </li>

                @include('layouts.sidebar.ui-elements')

                @include('layouts.sidebar.icons')

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
