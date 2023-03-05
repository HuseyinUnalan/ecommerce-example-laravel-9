<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImages;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $products = Product::where('status', 1)->orderBy('desk', 'ASC')->Paginate(8);
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
}

?>