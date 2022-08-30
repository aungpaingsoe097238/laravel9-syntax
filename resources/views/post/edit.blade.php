@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a> </li>
            <li class="breadcrumb-item active">Post Edit</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">

                    <div class="col-12">
                        <label for="">Title</label>
                        <input type="text" value="{{ old('title',$post->title) }}"  name="title" class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="category">Category</label>
                        <select class="form-select @error('category') is-invalid @enderror" id="category" name="category">
                            @foreach(\App\Models\Category::all() as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ $category->id == old('category',$post->category_id) ? 'selected' : '' }} >
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="">Description</label>
                        <textarea id="" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror"  name="description">{{ old('description',$post->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <div>
                            <label for="featured_image">Featured Image</label>
                            <input
                                type="file"
                                class="form-control  @error('featured_image') is-invalid @enderror"
                                value="{{ old('featured_image') }}"
                                name="featured_image"
                                id="featured_image"
                                accept="image/jpeg,image/png">
                            @error('featured_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-primary mt-2">Update Post</button>
                    </div>

                </div>
            </form>

            <div class="mt-3">
                @isset($post->featured_image)
                    <img class="w-100 " src={{ asset('storage/'.$post->featured_image) }} alt="">
                @endisset
            </div>

        </div>
    </div>

@endsection
