@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('info'))
            <div class="alert alert-info">{{ session('info') }}</div>
        @endif

        <table class="table mt-5 table-dark table-striped">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th></th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>
                        <div class="text-center">
                            @auth

                                @can('user-delete', $user)
                                    <a href="{{ url("/users/delete/$user->id") }}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                @endcan

                                @can('admin-suspend', $user)
                                     @if ($user->suspended === 0)
                                        <a href="{{ url("/users/suspended/$user->id") }}" class="btn btn-outline-warning btn-sm">Suspend</a>
                                    @else
                                        <a href="{{ url("/users/suspended/$user->id") }}" class="btn btn-warning btn-sm">Suspend</a>
                                    @endif
                                @endcan
                            @endauth
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
