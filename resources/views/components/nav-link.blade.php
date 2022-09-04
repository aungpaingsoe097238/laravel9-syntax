<a class="nav-link {{ request()->url() === $url ? 'active' : '' }} " href="{{ route('login') }}">
    {{ $name }}
</a>
