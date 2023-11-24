@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 700px;">
        <div class="card p-3 my-5">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="title" class="mb-2">Title</label>
                        <input type="text" name="title" value="{{ $book->title }}" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for="image" class="mb-2">Image</label>
                        <div>
                             <img src="{{ asset('storage/images/' . $book->image) }}" width="100" height="100" class="mb-2">
                        </div>
                        <input type="hidden" name="origin_image" value="{{ $book->image }}"
                        class="form-control mb-2">
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for="file" class="mb-2">File</label>
                        <input type="hidden" name="origin_file" value="{{ $book->file }}" class="form-control mb-2">
                        <input type="file" name="file" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for="author_name" class="mb-2">Author Name</label>
                        <input type="text" name="author_name" value="{{ $book->author_name }}" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for="category_id" class="mb-2">Category</label>
                        <select name="category_id" class="form-select">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id === $book->category_id)
                                    @selected(true)
                                @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-primary btn-sm w-100">Edit Book</button>
                </form>
            </div>
        </div>
    </div>
@endsection
