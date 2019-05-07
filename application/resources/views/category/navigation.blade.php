<div class="content">
    <div class="title m-b-md">
        Application
    </div>

    <div class="links">
        <a href="{{ route('home') }}">Home</a>
        <a class="{{ Route::is('category.index') ? 'active' : '' }}" href="{{ route('category.index') }}">Categories</a>
        <a class="{{ Route::is('category.create') ? 'active' : '' }}" href="{{ route('category.create') }}">Add Category</a>
    </div>
</div>
