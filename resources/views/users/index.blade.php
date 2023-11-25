@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5 bg-secondary p-5">
        @if (session('info'))
            <div class="alert alert-info">{{ session('info') }}</div>
        @endif

        <div class="row mb-3">
            @auth
                <div class="mb-5">
                    <form class="float-end" action="{{ url("/books/search") }}" method="get">
                        @csrf
                        <div class="btn-group">
                            <input type="text" name="search" class="form-control"   placeholder="Search somethig..">
                            <button class="btn btn-sm btn-primary">Search</button>
                        </div>
                    </form>

                    <form class="float-end me-3" action="{{ url("/books/category") }}" method="get">
                        @csrf
                        <div class="btn-group">
                            <select name="category_id" class="form-select">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-sm btn-primary">Filter</button>
                        </div>
                    </form>
                </div>
            @endauth
        </div>

        <div class="row">
            @foreach ($books as $book)
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="card mb-3">
                        <img src="{{ asset('storage/images/' . $book->image) }}" width="100%" height="200">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <div class="mt-3">
                                <p class="card-text">
                                   Author: {{ $book->author_name }}
                                </p>
                                <p class="card-text text-muted">
                                  Category:  {{ $book->category->name }}
                                </p>
                            </div>
                        </div>

                        @auth
                            <div class="card-footer">
                                <div class="float-end">
                                     <a href="{{ asset('storage/files/' . $book->file) }}" class="btn btn-sm btn-success">Go read</a>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
