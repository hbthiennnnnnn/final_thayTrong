@extends('admin.layouts.app')

@section('content')
    <h1>Edit Product</h1>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="form-group">
            <label for="price">Price (VND)</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required>{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="image_url">Product Image</label>
            <input type="file" name="image_url" class="form-control">
            
            @if($product->image_url)
                <div class="mt-3">
                    <img src="{{ asset('storage/' . $product->image_url) }}" alt="Product Image" width="150">
                </div>
            @endif
        </div>

        <button type="submit" class="btn-submit">Update Product</button>
    </form>
@endsection