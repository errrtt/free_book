@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5 bg-secondary p-5">
        @if (session('info'))
            <div class="alert alert-info">{{ session('info') }}</div>
        @endif

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
                                <a href="{{ asset('storage/files/' . $book->file) }}" class="btn btn-sm btn-outline-success">Go read</a>
                            </div>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
