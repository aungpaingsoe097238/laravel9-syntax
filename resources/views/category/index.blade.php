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
                                    @notAuthor
                                    <th>
                                        Owner
                                    </th>
                                    @endnotAuthor
                                    <th>
                                        Post Count
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
                                            <br>
                                            <span class="badge bg-secondary">
                                                {{ $category->slug }}
                                            </span>
                                        </td>
                                        @notAuthor
                                        <td>
                                             {{ $category->user->name }}
                                        </td>
                                        @endnotAuthor
                                        <td>
                                            {{$category->posts()->count()}}
                                        </td>
                                        <td>

                                            @can('update',$category)
                                            <a href="{{ route('category.edit',$category->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                            @endcan

                                            @can('delete',$category)
                                            <form action="{{ route('category.destroy',$category->id) }}" class="d-inline-block" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-secondary btn-sm">Delete</button>
                                            </form>
                                            @endcan

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
