
    <!-- Header-->
    <header id="header" class="header">
        <div class="top-left">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}"><img src="{{ asset('assets/images/favicon.ico')}}" alt="Logo" style="height: 25px; width:25px;"></a>
                
                <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
            </div>
        </div>
        <div class="top-right">
            <div class="header-menu">
                <div class="header-left">

                  {{--  @include('layouts.navbar.search')

                  @include('layouts.navbar.notification')

                  @include('layouts.navbar.message')  --}}
                </div>
                @include('layouts.navbar.profile')
            </div>
        </div>
    </header>
    @include('layouts.navbar.breadcrumbs')
