@extends('master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">

                <h4>Blog Posts</h4>

                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        @if(request('keyword'))
                            Search - {{ request('keyword') }}
                        @endif
                    </div>
                    <form action="{{ route('page.index') }}" method="get" class="d-flex">
                        <input type="search" name="keyword" value="{{ request('keyword') }}" class="form-control d-inline-block">
                        <button class="btn btn-secondary">Search</button>
                    </form>
                </div>


            @forelse($posts as $post)
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


                            <div>
                                <p>
                                    {{ $post->excerpt }}
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
                                <a href="{{ route('page.detail',$post->slug) }}" class="btn btn-primary">
                                    See More
                                </a>
                            </div>


                        </div>
                    </div>
                @empty
                    <div class="card">
                        <div class="card-body">
                            There is no posts.
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </div>

@endsection
