<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::with('category')->get();
        return view('home', compact('products'));
    }

    public function getCategories($id)
    {
        $category = Categories::findOrFail($id);
        return view('home', compact('category'));
    }

    public function getAddForm()
    {
        return view('add_product');
    }

    public function store(Request $request)
    {

        $validated  = $request->validate([
            'name'      => 'required|string',
            'price'     => 'required|numeric',
            'stock'     => 'required',
            'category_id'  => 'required|integer',
        ]);

        $product = new Products();
        $product->name = $validated['name'];
        $product->price = $validated['price'];
        $product->stock = $validated['stock'];
        $product->category_id = $validated['category_id'];
        $product->save();

        return redirect()->route('index')->with('susses', 'Thêm sản phẩm thành công!');
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $product = Products::find($id);

        if (!$product) {
            return redirect()->route('index')->with('error', 'Sản phẩm không tồn tại!');
        }

        $productName = $product->name;
        $product->delete();

        return redirect()->route('index')->with('success', "Sản phẩm '{$productName}' đã được xóa!");
    }

    public function edit($id)
    {
        $product = Products::findOrFail($id);
        return view('edit_product', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);

        $validated = $request->validate([
            'name'        => 'required|string',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|integer',
        ]);

        $product->name        = $validated['name'];
        $product->price       = $validated['price'];
        $product->stock       = $validated['stock'];
        $product->category_id = $validated['category_id'];
        $product->save();

        return redirect()->route('index')->with('success', "Cập nhật sản phẩm '{$product->name}' thành công!");
    }
}
