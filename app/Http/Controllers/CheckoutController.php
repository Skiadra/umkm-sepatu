<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Cart;
use App\Models\CartItem;

class CheckoutController extends Controller
{
    public function index()
    {
        $token = Cookie::get('cart_session_token');
        $cart = Cart::where('session_token', $token)->first();

        if (!$cart || $cart->items->where('selected', true)->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Tidak ada item yang dipilih untuk checkout.');
        }

        $cartItems = $cart->items->where('selected', true);
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('checkout.index', compact('cartItems', 'totalPrice'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'payment_method' => 'required|string'
        ]);

        $token = Cookie::get('cart_session_token');
        $cart = Cart::where('session_token', $token)->first();

        if (!$cart || $cart->items->where('selected', true)->isEmpty()) {
            return back()->withErrors('Tidak ada item yang dipilih untuk dibeli.');
        }

        $cartItems = $cart->items->where('selected', true);

        // Simpan pesanan ke database atau lakukan proses pembayaran di sini...

        // Hapus item yang dibeli dari keranjang
        foreach ($cartItems as $item) {
            $item->delete();
        }

        return redirect()->route('car.index')->with('success', 'Pesanan Anda telah berhasil diproses!');
    }
}
