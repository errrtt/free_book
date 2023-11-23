@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 700px;">
        <div class="card p-3 mt-5">
            <div class="card-body">
                <form method="post">
                    @csrf

                    <input type="text" name="name" class="form-control mb-2" value="{{ $category->name }}">
                    <button class="btn btn-primary btn-sm w-100">Add Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection
