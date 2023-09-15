<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item"><a class="navbar-brand" href="{{ route('admin.dashboard') }}">

                    @if ( isset($g_settings->logo) )
                        <img style="max-width: 170px" src="{{ asset('admin/site_setting/'.$g_settings->logo)}}" alt="Branding logo">
                    @else
                        <p style="font-size: 43px;
                        font-weight: bold;">FNF BUY</p>
                    @endif

                    </a></li>
                <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1 user-name text-bold-700">{{ auth()->user()->name }}</span><span class="avatar avatar-online"><img src="{{ (auth()->user()->image) ? asset('admin/profile/'.auth()->user()->image) : asset('admin/app-assets/images/portrait/small/avatar-s-19.png') }}" alt="avatar"><i></i></span></a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="ft-user"></i> Edit Profile</a><a class="dropdown-item" href="{{ route('admin.category.index') }}"><i class="ft-check-square"></i>Categories</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#" onclick="event.preventDefault();
                            document.getElementById('admin-logout-form').submit();"><i class="ft-power"></i> Logout</a>
                        </div>
                        <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
