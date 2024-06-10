<?php

namespace App\Http\Controllers;

use App\CartService;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\ProductService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $productService;
    protected $cartService;

    public function __construct(ProductService $productService, CartService $cartService)
    {
        $this->productService = $productService;
        $this->cartService = $cartService;
    }

    public function add(Request $request, $id)
    {
        $userId = auth()->id();

        $this->cartService->addToCart($id, $userId);
        return redirect()->route('dashboard')->with('success', 'Product added to cart!');
    }

    public function remove($id)
    {
        $this->cartService->removeFromCart($id);
        return redirect()->route('cart')->with('success', 'Product removed from cart!');
    }

    public function index()
    {
        $cart = $this->cartService->getCartItems();
        $cartItems = [];
        $totalPrice = 0;

        foreach ($cart as $item) {
            $product = $this->productService->findProductById($item['product']);

            if ($product) {
                $cartItems[] = [
                    'product' => $product,
                    'user_id' => $item['user_id'],
                    'quantity' => $item['quantity']
                ];

                $totalPrice += $product['price'] * $item['quantity'];
            }
        }

        return view('cart', compact('cartItems', 'totalPrice'));
    }

    function finish()  {
        $userId = auth()->id();
        $cart = $this->cartService->getCartItems();
        $cartItems = [];
        $totalPrice = 0;

        foreach ($cart as $item) {
            $product = $this->productService->findProductById($item['product']);

            if ($product) {
                $cartItems[] = [
                    'product' => $product,
                    'user_id' => $item['user_id'],
                    'quantity' => $item['quantity']
                ];

                $totalPrice += $product['price'] * $item['quantity'];
            }
        }

        Order::create([
            'user_id' => $userId,
            'items' => count($cartItems),
            'total' => $totalPrice,
        ]);

        $remainingCart = array_filter($cart, function($item) use ($userId) {
            return $item['user_id'] != $userId;
        });
        session()->put('cart', $remainingCart);

        return redirect()->route('dashboard')->with('success', 'Order has been placed successfully!');
    }

}
