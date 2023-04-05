<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function ViewWishlist()
    {
        return view('frontend.wishlist.view_wishlist');
    }

    public function GetWishlistProduct()
    {
        $wishlist = Wishlist::with(['product' => function ($query) {
            $query->where('status', 1);
        }])
            ->where('user_id', Auth::id())
            ->latest()
            ->whereHas('product', function ($query) {
                $query->where('status', 1);
            })
            ->get();
        return response()->json($wishlist);
    }

    public function RemoveWishlistProduct($id)
    {
        Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();
        return response()->json(['success' => 'Ürün İstek Listesinden Kaldırıldı.']);
    }
}
