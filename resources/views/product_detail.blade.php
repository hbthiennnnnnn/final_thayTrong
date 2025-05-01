@extends('layouts.customer')

@section('content')
    <div class="container">
        <div class="product-details">
            <!-- Hình ảnh sản phẩm -->
            <div class="product-image">
                <img src="{{ asset('storage/' . $product->image_url) }}" 
                     alt="{{ $product->name }}" 
                     class="product-img"> <!-- Tăng chiều rộng và chiều cao ảnh -->
            </div>

            <!-- Thông tin sản phẩm -->
            <div class="product-info">
                <h1 class="product-title">{{ $product->name }}</h1>
                <p class="product-description">{{ $product->description }}</p>
                <p class="product-price">{{ number_format($product->price, 0, ',', '.') }} VND</p>

                <div class="quantity-section">
                    <label for="quantity" class="quantity-label">Quantity</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" class="quantity-input">
                </div>

                <!-- Thêm vào giỏ hàng -->
                <div class="buttons">
                    <button class="add-to-cart">Add to Cart</button>
                    <button class="buy-now">Buy Now</button>
                </div>

                <!-- Mô tả chi tiết -->
                <div class="product-details-description">
                    <h2 class="details-title">Product Details</h2>
                    <p class="details-description">{{ $product->long_description }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
