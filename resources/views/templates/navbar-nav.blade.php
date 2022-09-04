<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
        </a>
        <ul class="dropdown-menu">
            @foreach(\App\Models\Category::all() as $category)
                <li><a class="dropdown-item" href="{{ route('page.category',$category->slug) }}">{{ $category->title }}</a></li>
            @endforeach
        </ul>
    </li>
    @auth()
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="{{ route('page.index') }}" class="dropdown-item {{ request()->url() === route('page.index') ? 'active' : '' }} ">Home</a>
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
            <a class="nav-link {{ request()->url() === route('login') ? 'active' : '' }} " href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->url() === route('register') ? 'active' : '' }} " href="{{ route('register') }}">Register</a>
        </li>
    @endauth
</ul>
