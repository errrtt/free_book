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
                <div class="card p-3">
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label for="image" class="mb-2">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="mb-4">
                                <label for="file" class="mb-2">File</label>
                                <input type="file" name="file" class="form-control">
                            </div>

                            <div class="mb-4">
                                <label for="title" class="mb-2">Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>

                            <div class="mb-4">
                                <label for="author_name" class="mb-2">Author Name</label>
                                <input type="text" name="author_name" class="form-control">
                            </div>

                            <select name="category_id" class="form-select mb-4">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                            <button class="btn btn-sm btn-primary w-100">Add Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
