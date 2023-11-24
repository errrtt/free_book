@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('info'))
            <div class="alert alert-info">{{ session('info') }}</div>
        @endif
        <div class="row g-1 mt-5">
            <div class="col-3">
                <ul class="list-group">
                    <a href="{{ url("/books/add") }}" class="list-group-item list-group-item-action">Add Book</a>

                    <a href="{{ url("/books") }}" class="list-group-item list-group-item-action">Books</a>
                </ul>
            </div>

            <div class="col-9">
                <table class="table table-dark table-striped table-bordered">
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Book Path</th>
                        <th>Author Name</th>
                        <th>Category</th>
                        <th>Created At</th>
                        <th></th>
                    </tr>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>
                                <img src="{{ asset('storage/images/' . $book->image) }}" width="50" height="50">
                            </td>
                            <td>
                               <div class="mt-3">
                                    <a href="{{ asset('storage/files/' . $book->file) }}" class="text-white-50">{{ $book->file }}</a>
                               </div>
                            </td>
                            <td>{{ $book->author_name }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td>{{ $book->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="text-center btn-group">
                                    <a href="{{ url("/books/delete/$book->id") }}" class="btn btn-outline-danger btn-sm">Delete</a>

                                    <a href="{{ url("/books/edit/$book->id") }}" class="btn btn-outline-warning btn-sm">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
