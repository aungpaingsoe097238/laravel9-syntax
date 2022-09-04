@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a> </li>
            <li class="breadcrumb-item active">Post Create</li>
        </ol>
    </nav>


    <x-card>
        <x-slot:title>Post Detail</x-slot:title>

    <div>
        <span class="badge bg-secondary">{{ $post->category->title }}</span>
    </div>

    <div>
        <span class="badge bg-secondary">{{ $post->user->name }}</span>
    </div>

    <div>
        @isset($post->featured_image)
            <img class="rounded mt-2" height="200" src={{ asset('storage/'.$post->featured_image) }} alt="">
        @endisset
    </div>

    <div class="">
        <p>
            {{ $post->description }}
        </p>
    </div>

    <div>
        @foreach($post->photos as $photo)
            <img class="rounded mt-2" height="100" src={{ asset('storage/'.$photo->name) }} alt="">
        @endforeach
    </div>

    <div class="mt-2">
        <a class="btn btn-primary" href={{ route('post.create') }} >Create Post</a>
        <a class="btn btn-primary" href={{ route('post.edit',$post->id) }} >Edit Post</a>
    </div>

    </x-card>


@endsection
