<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Giới hạn chiều cao ảnh */
.w-full {
    object-fit: cover;
    height: 12rem; /* Điều chỉnh chiều cao ảnh cho phù hợp */
}

/* Giới hạn độ dài tên sản phẩm */
.line-clamp-1 {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Giới hạn mô tả sản phẩm */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Đảm bảo các card có chiều cao đồng đều */
.flex-col {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.mt-auto {
    margin-top: auto;
}

/* Cấu trúc chung của container */
.container {
    width: 95%;
    margin: 0 auto;
    padding: 20px 0;
}

/* Bố cục sản phẩm */
.product-details {
    display: flex;
    flex-direction: row;
    gap: 40px;
}

/* Hình ảnh sản phẩm */
.product-img {
    width: 100%;
    max-width: 800px;
    height: auto;
    object-fit: cover;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Thông tin sản phẩm */
.product-info {
    display: flex;
    flex-direction: column;
    gap: 20px;
    width: 100%;
}

/* Tiêu đề sản phẩm */
.product-title {
    font-size: 2.5rem;
    color: #333;
    font-weight: 700;
}

/* Mô tả sản phẩm */
.product-description {
    font-size: 1.125rem;
    color: #555;
    line-height: 1.6;
}

/* Giá sản phẩm */
.product-price {
    font-size: 2rem;
    font-weight: 600;
    color: #333;
}

/* Số lượng sản phẩm */
.quantity-section {
    margin-top: 20px;
}

.quantity-label {
    font-size: 1.125rem;
    color: #333;
}

.quantity-input {
    width: 60px;
    padding: 10px;
    font-size: 1rem;
    border-radius: 5px;
    border: 1px solid #ddd;
    margin-top: 10px;
}

/* Các nút hành động */
.buttons {
    display: flex;
    gap: 10px;
    margin-top: 20px;
}

button {
    padding: 16px 30px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.add-to-cart {
    background-color: #007bff;
    color: white;
    border: none;
}

.add-to-cart:hover {
    background-color: #0056b3;
}

.buy-now {
    background-color: #28a745;
    color: white;
    border: none;
}

.buy-now:hover {
    background-color: #218838;
}

/* Mô tả chi tiết sản phẩm */
.product-details-description {
    margin-top: 30px;
}

.details-title {
    font-size: 2rem;
    font-weight: 600;
    color: #333;
}

.details-description {
    font-size: 1.125rem;
    color: #666;
    line-height: 1.6;
}

    </style>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4 text-white">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="text-2xl font-semibold">Product List</a>
            <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md">Logout</button>
</form>

        </div>
    </nav>
    
    <div class="container mx-auto mt-10">
        @yield('content')
    </div>
</body>
</html>
