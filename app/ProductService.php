<?php

namespace App;

class ProductService
{
    protected $products = [];

    public function __construct()
    {
        if (session()->has('products')) {
            $this->products = session('products');
        }
    }

    public function getProductList()
    {
        return $this->products;
    }

    public function addProduct($product)
    {
        $this->products[] = $product;
        session(['products' => $this->products]);
    }

    public function getProductById($id)
    {
        foreach ($this->products as $product) {
            if ($product['id'] == $id) {
                return $product;
            }
        }
        return null;
    }

    public function updateProduct($id, $updatedProduct)
    {
        foreach ($this->products as &$product) {
            if ($product['id'] == $id) {
                $product = array_merge($product, $updatedProduct);
                session(['products' => $this->products]);
                return true;
            }
        }
        return false;
    }

    public function deleteProduct($id)
    {
        foreach ($this->products as $key => $product) {
            if ($product['id'] == $id) {
                unset($this->products[$key]);
                session(['products' => $this->products]);
                return true;
            }
        }
        return false;
    }

    public function findProductById($productId)
    {
        foreach ($this->products as $product) {
            if ($product['id'] == $productId) {
                return $product;
            }
        }
        return null; // Return null if product is not found
    }
}
