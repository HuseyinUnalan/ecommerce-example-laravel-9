<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartPageController extends Controller
{
    public function MyCart()
    {
        return view('frontend.wishlist.view_mycart');
    }

    public function GetCartProduct()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),
        ));
    }

    public function RemoveCartProduct($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Ürün Sepetten Kaldırıldı.']);
    }

    public function CartIncrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);
        return response()->json(['increment']);
    }

    public function CartDecrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);
        return response()->json(['decrement']);
    }
}
