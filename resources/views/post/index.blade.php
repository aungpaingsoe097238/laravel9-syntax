@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a> </li>
            <li class="breadcrumb-item active">Post Index</li>
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
                                    Category
                                </th>
                                <th>
                                    Owner
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
                            @forelse($posts as $post)
                                <tr>
                                    <td class="w-25">
                                        {{ $post->title }}
                                    </td>
                                    <td>
                                        {{ \App\Models\Category::find($post->category_id)->title }}
                                    </td>
                                    <td>
                                        {{ \App\Models\User::find($post->user_id)->name }}
                                    </td>
                                    <td>

                                        <a href="{{ route('post.show',$post->id) }}" class="btn btn-secondary btn-sm">Info</a>

                                        <a href="{{ route('post.edit',$post->id) }}" class="btn btn-secondary btn-sm">Edit</a>

                                        <form action="{{ route('post.destroy',$post->id) }}" class="d-inline-block" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-secondary btn-sm">Delete</button>
                                        </form>

                                    </td>
                                    <td>
                                        {{ $post->created_at->format('d M Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">
                                        There is no posts!
                                    </td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        {{ $posts->onEachSide(1)->links() }}
    </div>

@endsection
