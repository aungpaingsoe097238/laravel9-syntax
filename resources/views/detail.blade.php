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


                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($post->photos as $key=>$photo)
                                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/'.$photo->name) }}"  class="d-block h-100" alt="...">
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

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
