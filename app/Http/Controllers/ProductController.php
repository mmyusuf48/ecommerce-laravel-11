<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getProductList();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $product = [
            'id' => count($this->productService->getProductList()) + 1,
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
        ];
        $this->productService->addProduct($product);

        return redirect()->route('admin.product');
    }

    public function edit($id)
    {
        $product = $this->productService->getProductById($id);
        if (!$product) {
            return redirect()->route('admin.product')->with('error', 'Product not found.');
        }
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'nullable|numeric',
        ]);

        $updatedProduct = [
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ];

        $this->productService->updateProduct($id, $updatedProduct);

        return redirect()->route('admin.product')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return redirect()->route('admin.product')->with('success', 'Product deleted successfully.');
    }
}
