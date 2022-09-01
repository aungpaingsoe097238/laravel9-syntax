@extends('master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">

                <h4>Blog Detail Post</h4>

                <div class="card my-2">
                    <div class="card-body">

                        <div>
                            <h5>{{ $post->title }}</h5>
                            <a href="">
                                <span class="badge bg-secondary">
                                    {{ $post->category->title }}
                                </span>
                            </a>
                        </div>

                        <div class="justify-content-center d-flex mt-2">

                            @forelse($post->photos as $photo)

                                <img class="rounded" height="100" src={{ asset('storage/'.$photo->name) }} alt="">

                            @empty
                                <p class="badge bg-danger">
                                    There is no photos.
                                </p>
                            @endforelse

                        </div>

                        <div class="mt-2">
                            <p>
                                {{ $post->description }}
                            </p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="mb-0 badge bg-secondary small">
                                    {{ $post->user->name }}
                                </p>
                                <p class="mb-0 badge bg-secondary small">
                                    {{ $post->created_at->diffForHumans() }}
                                </p>
                            </div>
                            <a href="{{ route('page.index') }}" class="btn btn-primary">
                                All Posts
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
