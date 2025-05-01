@extends('admin.layouts.app')

@section('content')
    <h1 class="mb-4">Product List</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Add New Product</a>

    <!-- Form Tìm kiếm và Lọc -->
    <form method="GET" action="{{ route('admin.products.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-3 mb-3 mx-2">
                <input type="text" name="search" class="form-control" placeholder="Search by name" value="{{ request('search') }}">
            </div>
            <div class="col-md-2 mb-3">
                <input type="number" name="min_price" class="form-control" placeholder="Min price" value="{{ request('min_price') }}">
            </div>
            <div class="col-md-2 mb-3">
                <input type="number" name="max_price" class="form-control" placeholder="Max price" value="{{ request('max_price') }}">
            </div>
            <div class="col-md-2 mb-3 mt-3">
                <button type="submit" class="btn btn-info w-100">Search</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 0, ',', '.') }} VND</td>
                    <td>{{ Str::limit($product->description, 50) }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        <!-- Phân trang -->
        {{ $products->links('pagination::simple-tailwind') }}
    </div>

@endsection
