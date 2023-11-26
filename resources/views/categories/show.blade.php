@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('info'))
            <div class="alert alert-info">{{ session('info') }}</div>
        @endif

        <div class="row g-1 mt-5">
            <div class="col-3">
                <ul class="list-group">
                    <a href="{{ url('/categories/add') }}" class="list-group-item list-group-item-action">Add Category</a>

                    <a href="{{ url('categories/show') }}" class="list-group-item list-group-item-action">Categories</a>
                </ul>
            </div>
            <div class="col-9">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th></th>
                    </tr>

                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ url("/categories/delete/$category->id") }}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>

                                <a href="{{ url("/categories/edit/$category->id") }}" class="btn btn-outline-success btn-sm">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
