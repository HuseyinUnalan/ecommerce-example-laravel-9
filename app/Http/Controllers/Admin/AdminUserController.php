<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;

class AdminUserController extends Controller
{
    public function AllAdminRole()
    {
        $adminuser = Admin::where('type', 2)->latest()->get();
        return view('admin.role.admin_role_all', compact('adminuser'));
    }

    public function AddAdminRole()
    {
        return view('admin.role.admin_role_create');
    }

    public function StoreAdminRole(Request $request)
    {
        $image = $request->file('profile_photo_path');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(225, 225)->save('upload/admin_images/' . $name_gen);
        $save_url = $name_gen;

        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,

            'product' => $request->product,
            'slider' => $request->slider,
            'coupon' => $request->coupon,
            'shipping' => $request->shipping,
            'orders' => $request->orders,

            'reports' => $request->reports,
            'alluser' => $request->alluser,
            'settings' => $request->settings,
            'returnorder' => $request->returnorder,
            'reviews' => $request->reviews,


            'adminuserrole' => $request->adminuserrole,
            'type' => 2,
            'profile_photo_path' => $save_url,
            'created_at' => Carbon::now(),


        ]);

        $notification = array(
            'message' => 'Admin Kullanıcı Başarıyla Eklendi.',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin.user')->with($notification);
    }

    public function EditAdminRole($id)
    {
        $adminuser = Admin::findOrFail($id);
        return view('admin.role.admin_role_edit', compact('adminuser'));
    }

    public function UpdateAdminRole(Request $request)
    {
        $admin_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('profile_photo_path')) {

            unlink($old_img);
            $image = $request->file('profile_photo_path');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(225, 225)->save($name_gen);
            $save_url = $name_gen;

            Admin::findOrFail($admin_id)->update([

                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,

                'product' => $request->product,
                'slider' => $request->slider,
                'coupon' => $request->coupon,
                'shipping' => $request->shipping,
                'orders' => $request->orders,

                'reports' => $request->reports,
                'alluser' => $request->alluser,
                'settings' => $request->settings,
                'returnorder' => $request->returnorder,
                'reviews' => $request->reviews,


                'adminuserrole' => $request->adminuserrole,
                'type' => 2,
                'profile_photo_path' => $save_url,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Admin Kullanıcı Başarıyla Düzenlendi.',
                'alert-type' => 'info'
            );

            return redirect()->route('all.admin.user')->with($notification);
        } else {

            Admin::findOrFail($admin_id)->update([

                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,

                'product' => $request->product,
                'slider' => $request->slider,
                'coupon' => $request->coupon,
                'shipping' => $request->shipping,
                'orders' => $request->orders,

                'reports' => $request->reports,
                'alluser' => $request->alluser,
                'settings' => $request->settings,
                'returnorder' => $request->returnorder,
                'reviews' => $request->reviews,


                'adminuserrole' => $request->adminuserrole,
                'type' => 2,
                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Admin Kullanıcı Başarıyla Düzenlendi.',
                'alert-type' => 'info'
            );

            return redirect()->route('all.admin.user')->with($notification);
        } // end else 

    }

    public function DeleteAdminRole($id)
    {

        $adminimg = Admin::findOrFail($id);
        $img = $adminimg->profile_photo_path;
        unlink('upload/admin_images/' . $img);

        Admin::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Admin Kullanıcısı Başarıyla Düzenlendi',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end method
}
