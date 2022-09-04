<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    @auth()
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
                <li>
                    <x-nav-link url="{{ route('page.index') }}" name="HOME"></x-nav-link>
                </li>
                <li class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    @else
        <li class="nav-item">
            <x-nav-link url="{{ route('login') }}" name="Login"></x-nav-link>
        </li>
        <li class="nav-item">
            <x-nav-link url="{{ route('register') }}" name="Register"></x-nav-link>
        </li>
    @endauth
</ul>
