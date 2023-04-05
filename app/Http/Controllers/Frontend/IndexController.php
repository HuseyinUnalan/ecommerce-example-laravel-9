<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImages;
use App\Models\Slider;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function Index()
    {
        $products = Product::where('status', 1)->orderBy('desk', 'ASC')->get();
        $newproducts = Product::where('new_product', 1)->orderBy('desk', 'ASC')->get();
        $trendproducts = Product::where('trend_product', 1)->where('status', 1)->orderBy('desk', 'ASC')->get();
        $adviceproducts = Product::where('advice_product', 1)->where('status', 1)->orderBy('desk', 'ASC')->get();
        $productcategories = ProductCategory::where('status', 1)->orderBy('desk', 'ASC')->get();
        $sliders = Slider::where('status', 1)->orderBy('desk', 'ASC')->get();
        return view('frontend.index', compact('products', 'newproducts', 'trendproducts', 'adviceproducts', 'productcategories', 'sliders'));
    }

    public function AllProducts()
    {
        $products = Product::where('status', 1)->orderBy('desk', 'ASC')->Paginate(6);
        $productcategories = ProductCategory::where('status', 1)->orderBy('desk', 'ASC')->get();
        return view('frontend.product.all_products', compact('products', 'productcategories'));
    }

    public function ProductCategory($id, $slug)
    {
        $products = Product::where('category_id', $id)->where('status', 1)->orderBy('desk', 'ASC')->get();
        $categoryname = ProductCategory::findOrFail($id);
        $productcategories = ProductCategory::where('status', 1)->orderBy('desk', 'ASC')->get();
        return view('frontend.product.category_product', compact('products', 'productcategories', 'categoryname'));
    }

    public function ProductDetails($id, $slug)
    {
        $products = Product::findOrFail($id);
        $productImages = ProductImages::where('product_id', $id)->get();
        return view('frontend.product.product_details', compact('products', 'productImages'));
    }

    // -- For Product Modal --
    public function ProductViewAjax($id)
    {
        $products = Product::with('category')->findOrFail($id);

        return response()->json(array(
            'product' => $products
        ));
    }

    public function UserLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // Product Search
    public function ProductSearch(Request $request)
    {
        $request->validate(["search" => "required"]);

        $item = $request->search;
        // echo $item;
        $products = Product::where('product_name', 'LIKE', "%$item%")->get();
        $productcategories = ProductCategory::where('status', 1)->orderBy('desk', 'ASC')->get();
        return view('frontend.product.search_product', compact('products', 'productcategories'));
    }

    public function ProductAdvanceSearch(Request $request)
    {
        $request->validate(["search" => "required"]);

        $item = $request->search;

        $products = Product::where('product_name', 'LIKE', "%$item%")
            ->select('product_name', 'product_thambnail_photo', 'selling_price', 'id', 'product_slug')
            ->limit(5)
            ->get();
        return view('frontend.product.advance_search_product', compact('products'));
    }




    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }



    public function UserProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        // $data->phone = $request->phone;


        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/' . $data->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Profil Başarı İle Güncellendi.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method 


    public function UserChangePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password', compact('user'));
    }


    public function UserPasswordUpdate(Request $request)
    {

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        } else {
            return redirect()->back();
        }
    } // end method

}
