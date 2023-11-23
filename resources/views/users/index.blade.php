@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @if (session('info'))
            <div class="alert alert-info">{{ session('info') }}</div>
        @endif
    </div>
@endsection
