<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImages;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function Index()
    {
        $newproducts = Product::where('new_product', 1)->orderBy('desk', 'ASC')->get();
        $trendproducts = Product::where('trend_product', 1)->orderBy('desk', 'ASC')->get();
        $productcategories = ProductCategory::where('status', 1)->orderBy('desk', 'ASC')->get();
        return view('frontend.index', compact('newproducts', 'trendproducts', 'productcategories'));
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
}
