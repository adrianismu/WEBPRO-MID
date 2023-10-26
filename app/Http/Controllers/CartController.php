<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent(); // Mendapatkan daftar item dalam keranjang belanja
        return view('cart.list', compact('cartItems')); // Menampilkan halaman daftar keranjang dengan data item-item keranjang
    }

    public function addToCart(Request $request)
    {
        \Cart::add([ // Menambahkan item ke keranjang belanja
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image, // Atribut tambahan, seperti gambar
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !'); // Menampilkan pesan sukses

        return redirect()->route('cart.list'); // Mengarahkan kembali ke halaman daftar keranjang
    }

    public function updateCart(Request $request)
    {
        \Cart::update( // Mengupdate item dalam keranjang
            $request->id,
            [
                'quantity' => [
                    'relative' => false, // Update jumlah item secara absolut
                    'value' => $request->quantity // Jumlah item baru
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !'); // Menampilkan pesan sukses

        return redirect()->route('cart.list'); // Mengarahkan kembali ke halaman daftar keranjang
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id); // Menghapus item dari keranjang belanja
        session()->flash('success', 'Item Cart Remove Successfully !'); // Menampilkan pesan sukses

        return redirect()->route('cart.list'); // Mengarahkan kembali ke halaman daftar keranjang
    }

    public function clearAllCart()
    {
        \Cart::clear(); // Menghapus semua item dari keranjang

        session()->flash('success', 'All Item Cart Clear Successfully !'); // Menampilkan pesan sukses

        return redirect()->route('cart.list'); // Mengarahkan kembali ke halaman daftar keranjang
    }
}
