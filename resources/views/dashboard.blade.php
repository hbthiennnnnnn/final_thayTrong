@extends('layouts.customer')

@section('content')
    <h1 class="text-3xl font-bold text-center mt-5 mb-8">Product List</h1>

    <!-- Form Tìm kiếm và Lọc -->
    <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
        <div class="flex justify-between mb-4">
            <!-- Trường tìm kiếm tên sản phẩm -->
            <input type="text" name="search" class="form-control w-3/4 p-2 border rounded-lg" placeholder="Search by name" value="{{ request('search') }}">

            <!-- Lọc theo giá -->
            <div class="flex gap-4">
                <input type="number" name="min_price" class="form-control p-2 border rounded-lg" placeholder="Min price" value="{{ request('min_price') }}">
                <input type="number" name="max_price" class="form-control p-2 border rounded-lg" placeholder="Max price" value="{{ request('max_price') }}">
            </div>

            <button type="submit" class="bg-blue-500 text-white p-3 rounded-lg">Search</button>
        </div>
    </form>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            <div class="bg-white p-5 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                <!-- Hình ảnh sản phẩm -->
                <img src="{{ asset('storage/' . $product->image_url) }}" 
                     alt="{{ $product->name }}" 
                     class="w-full h-48 object-cover rounded-lg mb-4"> 

                <!-- Tên sản phẩm -->
                <h2 class="text-xl font-semibold text-gray-800 line-clamp-1">{{ $product->name }}</h2>

                <!-- Mô tả sản phẩm -->
                <p class="text-gray-600 mt-2 text-ellipsis overflow-hidden line-clamp-2 mb-4">{{ $product->description }}</p>

                <!-- Giá sản phẩm -->
                <p class="text-lg font-bold text-gray-900 mt-auto">{{ number_format($product->price, 0, ',', '.') }} VND</p>

                <!-- Nút xem chi tiết -->
                <a href="{{ route('product_detail', $product)}}" class="mt-4 text-center text-white bg-blue-500 hover:bg-blue-400 py-2 px-4 rounded-lg">View Details</a>
            </div>
        @endforeach
    </div>


@endsection
