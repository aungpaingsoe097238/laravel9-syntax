@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a> </li>
            <li class="breadcrumb-item active">Category Create</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <h4>Create New Category</h4>
                <hr>
                <div class="row">
                    <div class="col">
                        <input type="text"  name="title" class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <button class="btn btn-primary">Add Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
