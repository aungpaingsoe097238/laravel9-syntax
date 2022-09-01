@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Photo Index</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">

            @forelse(Auth::user()->photos as $photo)

                <div class="d-inline-block">
                    <img src="{{ asset('storage/'.$photo->name) }}"  class="img-fluid rounded" alt="">
                </div>

            @empty

                <div>
                    There is no images
                </div>

            @endforelse

        </div>
    </div>

@endsection
