<?php

namespace App;

class CartService
{
    /**
     * Create a new class instance.
     */
    public function addToCart($productId, $userId)
    {
        $cart = session()->get('cart', []);

        $itemFound = false;
        foreach ($cart as $key => $item) {
            if ($item['product'] == $productId && $item['user_id'] == $userId) {

                $cart[$key]['quantity'] += 1;
                $itemFound = true;
                break;
            }
        }

        // Jika tidak ditemukan, tambahkan item baru ke keranjang
        if (!$itemFound) {
            $cartItem = [
                'product' => $productId,
                'user_id' => $userId,
                'quantity' => 1,
            ];
            $cart[] = $cartItem;
        }
        session()->put('cart', $cart);
    }

    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);

        foreach ($cart as $key => $item) {
            if ($item['product'] == $productId) {
                unset($cart[$key]);
            }
        }

        session()->put('cart', $cart);
    }

    public function getCartItems()
    {
        return session()->get('cart', []);
    }

    public function getCartCount()
    {
        return count(session()->get('cart', []));
    }
}
