@extends('admin.layouts.app')

@section('content')
    <h1 class="mb-4">Add New Product</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        
        <div class="mb-3">
            <label for="price" class="form-label">Price (VND)</label>
            <input type="number" name="price" class="form-control" value="{{ old('price') }}" required>
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
        </div>
        
        <div class="mb-3">
            <label for="image_url" class="form-label">Product Image</label>
            <input type="file" name="image_url" class="form-control">
        </div>
        
        <button type="submit" class="btn btn-success">Save Product</button>
    </form>
@endsection