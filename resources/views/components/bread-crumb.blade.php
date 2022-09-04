<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach($links as $key=>$value)
            @if ($loop->last)
                <li class="breadcrumb-item active">{{ $key }}</li>
            @else
                <li class="breadcrumb-item"><a href="{{ $value }}">{{ $key }}</a> </li>
            @endif
        @endforeach
    </ol>
</nav>
