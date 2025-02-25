{{-- <li class="menu-title">UI elements</li><!-- /.menu-title -->

<li class="{{(strpos(request()->route()->getName(), 'components') !== false) ? 'active' : '' }} menu-item-has-children dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <i class="menu-icon fa fa-cogs" style="color: DarkTurquoise"></i>Components</a>
    <ul class="sub-menu children dropdown-menu">
        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('components.buttons') }}">Buttons</a></li>
        <li><i class="fa fa-id-badge"></i><a href="{{ route('components.badges') }}">Badges</a></li>
        <li><i class="fa fa-bars"></i><a href="{{ route('components.tabs') }}">Tabs</a></li>

        <li><i class="fa fa-id-card-o"></i><a href="{{ route('components.cards') }}">Cards</a></li>
        <li><i class="fa fa-exclamation-triangle"></i><a href="{{ route('components.alerts')}}">Alerts</a></li>
        <li><i class="fa fa-spinner"></i><a href="{{ route('components.progress-bars')}}">Progress Bars</a></li>
        <li><i class="fa fa-fire"></i><a href="{{ route('components.modals')}}">Modals</a></li>
        <li><i class="fa fa-book"></i><a href="{{ route('components.switches')}}">Switches</a></li>
        <li><i class="fa fa-th"></i><a href="{{ route('components.grids')}}">Grids</a></li>
        <li><i class="fa fa-file-word-o"></i><a href="{{ route('components.typography')}}">Typography</a></li>
    </ul>
</li>
<li class="menu-item-has-children dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <i class="menu-icon fa fa-table" style="color: blue"></i>Tables</a>
    <ul class="sub-menu children dropdown-menu">
        <li><i class="fa fa-table"></i><a href="{{ route('tables.basic') }}">Basic Table</a></li>
        <li><i class="fa fa-table"></i><a href="{{ route('tables.data') }}">Data Table</a></li>
        <li><i class="fa fa-file-word-o"></i><a href="{{ route('admin.agenda.index')}}">Agenda</a></li>
    </ul>
</li>
<li class="menu-item-has-children dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="menu-icon fa fa-th" style="color: rosybrown"></i>Forms</a>
    <ul class="sub-menu children dropdown-menu">
        <li><i class="menu-icon fa fa-th"></i><a href="{{route('forms.basic')}}">Basic Form</a></li>
        <li><i class="menu-icon fa fa-th"></i><a href="{{route('forms.advanced')}}">Advanced Form</a></li>
    </ul>
</li> --}}

<li class="{{ Route::is('admin.agenda.index') ? 'active' : '' }}">
    <a href="{{ route('admin.agenda.index') }}"><i class="menu-icon fa fa-laptop" style="color: red"></i>Agenda</a>
</li>
