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

            <form action="{{ route('post.update',$post->id) }}" id="postUpdateForm" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
            </form>
                <div class="row">

                    <div class="d-flex overflow-scroll">
                        @foreach($post->photos as $photo)
                            <div class="d-inline-block position-relative m-1">
                                <img class="rounded" height="100" src={{ asset('storage/'.$photo->name) }} alt="">
                                <form action="{{ route('photo.destroy',$photo->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm position-absolute bottom-0 end-0">x</button>
                                </form>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-12">
                        <label for="">Title</label>
                        <input
                            type="text"
                            value="{{ old('title',$post->title) }}"
                            name="title"
                            class="form-control @error('title') is-invalid @enderror"
                            form="postUpdateForm"
                        >
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="category">Category</label>
                        <select class="form-select @error('category') is-invalid @enderror" id="category" name="category"  form="postUpdateForm">
                            @foreach($categories as $category)
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
                        <textarea id="" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror"  name="description"  form="postUpdateForm">{{ old('description',$post->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="photos">Post Image</label>
                        <input
                            type="file"
                            class="form-control @error('photos') is-invalid @enderror @error('photos.*') is-invalid @enderror"
                            name="photos[]"
                            id="photos"
                            accept="image/jpeg,image/png"
                            multiple
                            form="postUpdateForm"
                        >
                        @error('photos.*')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @error('photos')
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
                                accept="image/jpeg,image/png"
                                form="postUpdateForm"
                            >
                            @error('featured_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-primary mt-2" form="postUpdateForm">Update Post</button>
                    </div>

                </div>

            <div class="mt-3">
                @isset($post->featured_image)
                    <img class="rounded" height="100" src={{ asset('storage/'.$post->featured_image) }} alt="">
                @endisset
            </div>

        </div>
    </div>

@endsection
