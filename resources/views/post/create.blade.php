@extends('layouts.app')

@section('content')

    <x-bread-crumb :links="$links"></x-bread-crumb>

    <div class="card">
        <div class="card-body">

            <x-card>

                <x-slot:title>Post Create</x-slot:title>

                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                       <x-input name="title" label="Title"></x-input>

                        <div>
                            <label for="category">Category</label>
                            <select class="form-select @error('category') is-invalid @enderror" id="category" name="category">
                                @foreach($categories as $category)
                                    <option
                                        value="{{ $category->id }}"
                                        {{ $category->id == old('category') ? 'selected' : '' }} >
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <x-description label="Description" name="description"></x-description>

                        <x-input name="photos" label="Post Image" type="file" multiple="true"></x-input>

                        <x-input type="file" name="featured_image" label="Featured Image"></x-input>

                        <button class="btn btn-primary mt-2">Add Post</button>

                </form>

            </x-card>



        </div>
    </div>

@endsection
