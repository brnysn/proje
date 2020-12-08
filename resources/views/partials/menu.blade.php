<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-unlock-alt nav-icon"></i>
                    {{ trans('cruds.passwordManagement.title') }}
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route("admin.passwords.index") }}" class="nav-link {{ request()->is('admin/passwords') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-unlock-alt nav-icon"></i>
                            {{ trans('cruds.password.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.passwords.authonticatedIndex") }}" class="nav-link {{ request()->is('admin/passwords/authonticatedIndex') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-unlock-alt nav-icon"></i>
                            {{ trans('cruds.password.authonticated') }} {{ trans('cruds.password.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.passwords.create") }}" class="nav-link {{ request()->is('admin/passwords/create') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-plus nav-icon"></i>
                            {{ trans('cruds.password.add') }}
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-bookmark nav-icon"></i>
                    {{ trans('cruds.tagManagement.title') }}
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route("admin.tags.index") }}" class="nav-link {{ request()->is('admin/tags') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-bookmark nav-icon"></i>
                            {{ trans('cruds.tag.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.tags.create") }}" class="nav-link {{ request()->is('admin/tags/create') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-plus nav-icon"></i>
                            {{ trans('cruds.tag.add') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.users.profile") }}" class="nav-link {{ request()->is('admin/users/profile') || request()->is('admin/profile/*')  ? 'active' : '' }}">
                    <i class="fa-fw fas fa-user nav-icon"></i>
                    {{ trans('global.my_account') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>