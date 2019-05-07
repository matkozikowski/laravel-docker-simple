@extends('layout')

@section('content')

    @include('product.navigation')

    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-striped product--list">
            <thead>
            <tr>
                <td>ID</td>
                <td>Product Name</td>
                <td>Category</td>
                <td>Quantity</td>
                <td>Votes</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{  $product->id }}</td>
                    <td>{{  $product->name }}</td>
                    <td>{{  $product->category->name }}</td>
                    <td>{{  $product->quantity }}</td>
                    <td id="vote_{{ $product->id }}">{{ $product->vote }}</td>
                    <td>
                        <a href="{{ route('product.edit',$product->id) }}" class="btn btn-primary">Edit</a>
                        <a class="btn btn-dark product--vote" data-product-id="{{  $product->id }}" href="#vote">Vote</a>
                    </td>
                    <td>
                        <form action="{{ route('product.destroy', $product->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
