@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a> </li>
            <li class="breadcrumb-item active">Category Index </li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">

            <div class="container">
                <div class="row">
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Controls
                                    </th>
                                    <th>
                                        Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <td>
                                            {{ $category->title }}
                                            <span class="badge bg-secondary">
                                                {{ $category->slug }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('category.edit',$category->id) }}" class="btn btn-secondary btn-sm">Edit</a>

                                            <form action="{{ route('category.destroy',$category->id) }}" class="d-inline-block" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-secondary btn-sm">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            {{ $category->created_at->format('d M Y') }}
                                        </td>
                                    </tr>
                                @empty
                                     <tr>
                                         <td colspan="3" class="text-center">
                                             There is no categories!
                                         </td>
                                     </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
