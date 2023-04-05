<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImages;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{

    public function AllProduct()
    {
        $products = Product::latest()->get();
        return view('admin.product.all_product', compact('products'));
    }

    public function AddProduct()
    {
        $productcategories = ProductCategory::latest()->get();
        return view('admin.product.add_product', compact('productcategories'));
    }

    public function StoreProduct(Request $request)
    {
        $image = $request->file('product_thambnail_photo');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(600, 600)->save('upload/products/' . $name_gen);
        $save_url = 'upload/products/' . $name_gen;

        Product::insert([
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'category_id' => $request->category_id,
            'product_description' => $request->product_description,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'product_tags' => $request->product_tags,
            'desk' => $request->desk,
            'product_thambnail_photo' => $save_url,
            'created_at' => Carbon::now(),


            'advice_product' => $request->advice_product,
            'new_product' => $request->new_product,
            'trend_product' => $request->trend_product,


        ]);

        $notification = array(
            'message' => 'Ürün Eklendi',
            'alert-type' => 'success'
        );

        return redirect()->route('all.product')->with($notification);
    }


    public function EditProduct($id)
    {
        $products = Product::findOrFail($id);
        $productcategories = ProductCategory::latest()->get();
        return view('admin.product.edit_product', compact('products', 'productcategories'));
    }

    public function UpdateProduct(Request $request)
    {
        $product_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('product_thambnail_photo')) {
            unlink($old_img);
            $image = $request->file('product_thambnail_photo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(600, 600)->save('upload/products/' . $name_gen);
            $save_url = 'upload/products/' . $name_gen;

            Product::findOrFail($product_id)->update([
                'product_name' => $request->product_name,
                'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
                'category_id' => $request->category_id,
                'product_description' => $request->product_description,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'product_tags' => $request->product_tags,
                'desk' => $request->desk,
                'product_thambnail_photo' => $save_url,

                'advice_product' => $request->advice_product,
                'new_product' => $request->new_product,
                'trend_product' => $request->trend_product,
            ]);

            $notification = array(
                'message' => 'Ürün Güncellendi',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            Product::findOrFail($product_id)->update([
                'product_name' => $request->product_name,
                'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
                'category_id' => $request->category_id,
                'product_description' => $request->product_description,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'product_tags' => $request->product_tags,
                'desk' => $request->desk,

                'advice_product' => $request->advice_product,
                'new_product' => $request->new_product,
                'trend_product' => $request->trend_product,
            ]);

            $notification = array(
                'message' => 'Ürün Güncellendi',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }


    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Ürün Yayından Kaldırıldı.',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductActive($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Ürün Yayına Alındı.',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function DeleteProduct($id)
    {
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail_photo);
        Product::findOrFail($id)->delete();

        $images = ProductImages::where('product_id', $id)->get();
        foreach ($images as $img) {
            unlink($img->photo);
            ProductImages::where('product_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Product Delected Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // ------------------------ For Product Multi Images ------------------------ \\

    public function AddPhotoProduct($id)
    {
        $products = Product::findOrFail($id);
        return view('admin.product_multi_images.add_photo_product', compact('products'));
    }

    public function StorePhotoProduct(Request $request)
    {
        $image = $request->file('file');
        $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(600, 600)->save('upload/products/multi_images/' . $imageName);
        $save_url = 'upload/products/multi_images/' . $imageName;

        ProductImages::insert([
            'photo' => $save_url,
            'product_id' => $request->product_id,
            'created_at' => Carbon::now(),
        ]);
    }

    public function EditPhotoProduct($id)
    {
        $products = ProductImages::where('product_id', $id)->orderBy('id', 'DESC')->get();
        $productdetails = Product::findOrFail($id);
        return view('admin.product_multi_images.edit_photo_product', compact('products', 'productdetails'));
    }

    public function ProductPhotoInactive($id)
    {
        ProductImages::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Ürün Fotoğraf Yayından Kaldırıldı.',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductPhotoActive($id)
    {
        ProductImages::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Ürün Fotoğraf Yayına Alındı.',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }



    public function DeletePhotoProduct($id)
    {
        $products = ProductImages::findorFail($id);
        $img = $products->photo;
        unlink($img);
        ProductImages::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Ürün Resmi Silindi',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    // ------------------------ For Product Category ------------------------ \\

    public function AllProductCategory()
    {
        $productcategories = ProductCategory::latest()->get();
        return view('admin.product_category.all_product_category', compact('productcategories'));
    }

    public function AddProductCategory()
    {
        return view('admin.product_category.add_product_category');
    }

    public function StoreProductCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ], [
            'category_name.required' => 'Kategori Adı Giriniz.',
        ]);

        $image = $request->file('photo');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(131, 76)->save('upload/product_category/' . $name_gen);
        $save_url = 'upload/product_category/' . $name_gen;

        ProductCategory::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            'desk' => $request->desk,
            'photo' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Kategori Başarı İle Eklendi.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }




    public function EditProductCategory($id)
    {
        $productcategories = ProductCategory::findOrFail($id);
        return view('admin.product_category.edit_product_category', compact('productcategories'));
    }

    public function UpdateProductCategory(Request $request)
    {
        $category_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('photo')) {
            unlink($old_img);
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(131, 76)->save('upload/product_category/' . $name_gen);
            $save_url = 'upload/product_category/' . $name_gen;

            ProductCategory::findOrFail($category_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
                'desk' => $request->desk,
                'photo' => $save_url,
            ]);

            $notification = array(
                'message' => 'Kategori Resim İle Başarı İle Düzenlendi.',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            ProductCategory::findOrFail($category_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
                'desk' => $request->desk,
            ]);

            $notification = array(
                'message' => 'Kategori Başarı İle Düzenlendi.',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function DeleteProductCategory($id)
    {

        $productcategory = ProductCategory::findOrFail($id);
        unlink($productcategory->photo);
        ProductCategory::findOrFail($id)->delete();


        $notification = array(
            'message' => 'Kategori Başarı İle Silindi',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
