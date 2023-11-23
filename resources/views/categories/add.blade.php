@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row g-1 mt-5">
            <div class="col-3">
                <ul class="list-group">
                    <a href="{{ url('/categories/add') }}" class="list-group-item list-group-item-action">Add Category</a>

                    <a href="{{ url('categories/show') }}" class="list-group-item list-group-item-action">Categories</a>
                </ul>
            </div>
            <div class="col-9">
                <div class="card p-3">
                    <div class="card-body">
                        <form method="post">
                            @csrf

                            <input type="text" name="name" class="form-control mb-2" placeholder="Name">
                            <button class="btn btn-primary btn-sm w-100">Add Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
