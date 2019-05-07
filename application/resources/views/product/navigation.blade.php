<div class="content">
    <div class="title m-b-md">
        Application
    </div>

    <div class="links">
        <a href="{{ route('home') }}">Home</a>
        <a class="{{ Route::is('product.index') ? 'active' : '' }}" href="{{ route('product.index') }}">Products</a>
        <a class="{{ Route::is('product.create') ? 'active' : '' }}" href="{{ route('product.create') }}">Add Product</a>
    </div>
</div>
