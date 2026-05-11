<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart', [
            'carts' => Cart::where('user_id', auth()->id())->get(),
        ]);
    }

    public function addToCart(Request $request)
    {
        Cart::create([
            'user_id' => $request->user_id ?? auth()->id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);

        return response()->json(['message' => 'Product added to cart']);
    }

    public function viewCart(Request $request)
    {
        $userId = $request->user_id ?? auth()->id();
        $carts = Cart::where('user_id', $userId)->get();

        $data = [];
        foreach ($carts as $cart) {
            $data[] = [
                'id' => $cart->id,
                'product_name' => $cart->product->name,
                'quantity' => $cart->quantity,
            ];
        }

        return response()->json($data);
    }
}
