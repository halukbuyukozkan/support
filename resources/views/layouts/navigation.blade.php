<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        @auth
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        @endauth

        <x-nav-link href="{{ url('/') }}" icon="fas fa-home">
            {{ __('Home') }}
        </x-nav-link>

        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" icon="fas fa-desktop">
            {{ __('Dashboard') }}
        </x-nav-link>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @auth
            <x-dropdown id="navbarDropdown" class="user-menu">
                <x-slot name="trigger">
                    <i class="fas fa-user"></i>
                    <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                </x-slot>

                <x-slot name="content">
                    <!-- Authentication -->
                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        @else
            <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')" icon="fas fa-sign-in-alt">
                {{ __('Log in') }}
            </x-nav-link>

            <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')" icon="fas fa-user-plus">
                {{ __('Register') }}
            </x-nav-link>
        @endauth
    </ul>
</nav>
<!-- /.navbar -->
