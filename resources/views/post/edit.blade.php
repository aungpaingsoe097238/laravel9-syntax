@extends('layouts.app')

@section('content')


    <x-card>
        <x-slot:title>Post Edit</x-slot:title>
        <form action="{{ route('post.update',$post->id) }}" id="postUpdateForm" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
        </form>
        <div class="">

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

            <x-input label="Title" name="title" defaultValue="{{ $post->title }}" form="postUpdateForm"></x-input>

            <div>
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

            <x-description label="Description" name="description" form="postUpdateForm" defaultValue="{{ $post->description }}" ></x-description>

            <x-input name="photos" label="Post Image" type="file" form="postUpdateForm" multiple="true"></x-input>

            <x-input type="file" name="featured_image" form="postUpdateForm" label="Featured Image"></x-input>

            <button class="btn btn-primary mt-2" form="postUpdateForm">Update Post</button>

        </div>
        <div class="mt-3">
            @isset($post->featured_image)
                <img class="rounded" height="100" src={{ asset('storage/'.$post->featured_image) }} alt="">
            @endisset
        </div>
    </x-card>

@endsection
