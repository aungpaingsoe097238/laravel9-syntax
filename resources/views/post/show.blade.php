@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a> </li>
            <li class="breadcrumb-item active">Post Create</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">

                <h4>{{ $post->title }}</h4>

            <hr>

            <div>
                <span class="badge bg-secondary">{{ \App\Models\Category::find($post->category_id)->title }}</span>
            </div>

            <div>
                <span class="badge bg-secondary">{{ \App\Models\User::find($post->user_id)->name }}</span>
            </div>

            <div class="mt-2">
                <p>
                    {{ $post->description }}
                </p>
            </div>

            <div>
                @isset($post->featured_image)
                    <img class="w-100 mt-2" src={{ asset('storage/'.$post->featured_image) }} alt="">
                @endisset
            </div>

            <div>
                <a class="btn btn-primary" href={{ route('post.create') }} >Create Post</a>
                <a class="btn btn-primary" href={{ route('post.edit',$post->id) }} >Edit Post</a>
            </div>

        </div>
    </div>

@endsection
