@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a> </li>
            <li class="breadcrumb-item active">User Index </li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-between mb-2">
                <div>
                    @if(request('keyword'))
                        Search - {{ request('keyword') }}
                    @endif
                </div>

                <form action="{{ route('user.index') }}" method="get">
                    <div class="input-group">
                        <input type="search" class="form-control" name="keyword">
                        <button class="btn btn-outline-secondary">Search</button>
                    </div>
                </form>

            </div>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Role
                                    </th>
                                    <th>
                                        Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>

                                        </td>
                                        <td>
                                            {{ $user->created_at->format('d M Y') }}
                                        </td>
                                    </tr>
                                @empty
                                     <tr>
                                         <td colspan="3" class="text-center">
                                             There is no users!
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
