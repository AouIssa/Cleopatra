<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = collect([
            [
                'name' => 'Product 1',
                'description' => 'T-shirt',
                'price' => 10.99,
                'image' => asset('storage/images/tshirt.jpg'),
            ],
            [
                'name' => 'Product 2',
                'description' => 'Shorts',
                'price' => 20.99,
                'image' => asset('storage/images/shorts.jpg'),
            ],
            [
                'name' => 'Product 3',
                'description' => 'Shoes',
                'price' => 30.99,
                'image' => asset('storage/images/shoes.jpg'),
            ],
        ]);

        return view('home', ['products' => $products]);
    }
}
