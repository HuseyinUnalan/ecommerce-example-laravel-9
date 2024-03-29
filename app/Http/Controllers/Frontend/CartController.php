<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

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

    // ---------- For Coupon ----------

    public function CouponApply(Request $request)
    {
        $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100),
            ]);
            return response()->json(array(
                'success' => 'Kupon İşlemi Gerçekleşti.',
            ));
        } else {
            return response()->json(['error' => 'Geçersiz Kupon.']);
        }
    }

    public function CouponCalculation()
    {
        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        } else {
            return response()->json(array(
                'total' =>  Cart::total(),
            ));
        }
    }

    public function CouponRemove()
    {
        Session::forget('coupon');
        return response()->json(['success' => 'Kupon Kaldırıldı.']);
    }

    // ---------- For Checkout ----------
    public function CheckoutCreate()
    {
        if (Auth::check()) {
            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();
                // return response()->json(array(
                //     'carts' => $carts,
                //     'cartQty' => $cartQty,
                //     'cartTotal' => round($cartTotal),
                // ));
                $divisions = Shipping::orderBy('division_name', 'ASC')->get();
                return view('frontend.checkout.checkout_view', compact('carts', 'cartQty', 'cartTotal', 'divisions'));
            } else {
                $notification = array(
                    'message' => 'Sepete Ürün Eklemelisiniz.',
                    'alert-type' => 'error'
                );
                return redirect()->to('/')->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Giriş Yapmanız Gerekiyor.',
                'alert-type' => 'error'
            );
            return redirect()->route('login')->with($notification);
        }
    }
}
