@extends('layout')

@section('content')

    @include('product.navigation')

    <div class="card uper">
        <div class="card-header">
            Edit Product
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('product.update', $product->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $product->name }}" />
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" name="quantity" value="{{ $product->quantity }}"/>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select class="form-control" name="category">
                        <option>-- select --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                    @if ($product->category->id === $category->id) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
