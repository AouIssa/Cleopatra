<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $cartItems = $user->cart()->with('product')->get();

        return view('cart.index', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        $user = Auth::user();

        $cart = Cart::firstOrCreate([
            'user_id' => $user->id,
            'product_id' => $request->product_id,
        ]);

        $cart->quantity += $request->quantity;
        $cart->save();

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function removeFromCart(Cart $cart)
    {
        $this->authorize('delete', $cart);

        $cart->delete();
        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }
}