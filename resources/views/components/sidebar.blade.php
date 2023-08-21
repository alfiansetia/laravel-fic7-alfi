<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ $title == 'Dashboard' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ $title == 'Dashboard' ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('home') }}">General Dashboard</a></li>
                    <li><a class="nav-link" href="{{ route('home') }}">Ecommerce Dashboard</a></li>
                </ul>
            </li>
            <li class="menu-header">Master Data</li>
            <li class="{{ $title == 'User' ? 'active' : '' }}">
                <a class="nav-link active" href="{{ route('user.index') }}">
                    <i class="fas fa-users"></i> <span>User</span>
                </a>
            </li>
            <li class="nav-item dropdown {{ $title == 'Setting' ? 'active' : '' }}">
                <a href="javascript:void(0);" class="nav-link has-dropdown"><i class="fas fa-cogs"></i>
                    <span>Settings</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link {{ $title == 'Profile' ? 'active' : '' }}"
                            href="bootstrap-alert.html">Profile</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i>
                    <span>Credits</span></a></li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
