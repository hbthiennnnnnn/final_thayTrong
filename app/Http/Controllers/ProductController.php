<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('rolemanager:admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    // Hiển thị danh sách sản phẩm
    public function index(Request $request)
{
    $query = Product::query();

    // Tìm kiếm theo tên sản phẩm
    if ($request->has('search') && !empty($request->search)) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // Lọc theo giá
    if ($request->has('min_price') && !empty($request->min_price)) {
        $query->where('price', '>=', $request->min_price);
    }

    if ($request->has('max_price') && !empty($request->max_price)) {
        $query->where('price', '<=', $request->max_price);
    }

    // Phân trang với 10 sản phẩm mỗi trang
    $products = $query->paginate(10); 

    return view('admin.products.index', compact('products'));
}


    // Trang tạo sản phẩm
    public function create()
    {
        return view('admin.products.create');
    }

    // Lưu sản phẩm mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('products', 'public');
            $product->image_url = $imagePath;
        }

        $product->user_id = Auth::id();
        $product->save();

        return redirect()->route('admin.products.index');
    }

    // Hiển thị form chỉnh sửa sản phẩm
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // Cập nhật sản phẩm
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp',
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('products', 'public');
            $product->image_url = $imagePath;
        }

        $product->save();

        return redirect()->route('admin.products.index');
    }

    // Xóa sản phẩm
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }

    // Hiển thị sản phẩm cho customer
    public function show(Product $product)
    {

       $products = Product::all();
        return view('dashboard', compact('products'));
    }

    // Hiển thị sản phẩm chi tiết cho customer
    public function showDetail(Product $product)
    {
        return view('product_detail', compact('product'));
    }
}
