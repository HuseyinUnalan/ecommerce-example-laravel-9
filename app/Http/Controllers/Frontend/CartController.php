<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail_photo,
                ],
            ]);
            return response()->json(['success' => 'Ürün Başarılı Bir Şekilde Sepete Ekelndi.']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail_photo,
                ],
            ]);
            return response()->json(['success' => 'Ürün Başarılı Bir Şekilde Sepete Ekelndi.']);
        }
    }

    public function AddMiniCart()
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

    public function RemoveMiniCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Ürün Sepetten Kaldırıldı.']);
    }

    public function AddToWishlist(Request $request, $product_id)
    {
        if (Auth::check()) {
            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();

            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'İstek Listesine Eklendi.']);
            } else {
                return response()->json(['error' => 'Zaten İstek Listesinde Var.']);
            }
        } else {
            return response()->json(['error' => 'Lütfen Giriş Yapın.']);
        }
    }

    

}
