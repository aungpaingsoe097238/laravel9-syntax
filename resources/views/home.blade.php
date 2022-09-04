@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Home</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
{{--            @myname('aps')--}}
{{--            <br>--}}
{{--            @abc(false)--}}
{{--                show or not show--}}
{{--            @endabc--}}
{{--            {{ Auth::user()->isAuthor() }}--}}
            {{ $categories }}
        </div>
    </div>

@endsection
