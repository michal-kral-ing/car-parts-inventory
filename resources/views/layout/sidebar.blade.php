<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('cars') }}">Car Parts Inventory</a>
        </div>

        <ul class="sidebar-menu">
            <li class="{{ Request::is('cars/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('cars') }}"><i
                        class="fas fa-car"></i>
                    <span>Cars</span></a></li>
            <li class="{{ Request::is('parts/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('parts') }}"><i
                        class="fas fa-cogs"></i>
                    <span>Parts</span></a></li>
            <li class="{{ Request::is('logout') ? 'active' : '' }}"><a class="nav-link" href="{{ route('logout') }}"><i
                        class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a></li>
        </ul>
    </aside>
</div>
