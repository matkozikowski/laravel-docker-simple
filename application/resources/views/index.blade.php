@extends('layout')

@section('content')

    <div class="content">
        <div class="title m-b-md">
            Application
        </div>

        <div class="links">
            <a href="{{ route('category.index') }}">Categories List</a>
            <a href="{{ route('product.index') }}">Products List</a>
        </div>
    </div>

@endsection
