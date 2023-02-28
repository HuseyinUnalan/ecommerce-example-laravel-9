<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    public function AllSlider()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.all_slider', compact('sliders'));
    }

    public function AddSlider()
    {
        return view('admin.slider.add_slider');
    }

    public function StoreSlider(Request $request)
    {
        $image = $request->file('photo');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(1920, 400)->save('upload/sliders/' . $name_gen);
        $save_url = 'upload/sliders/' . $name_gen;

        Slider::insert([
            'title' => $request->title,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'link' => $request->link,
            'type' => $request->type,
            'desk' => $request->desk,
            'photo' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Slider Eklendi',
            'alert-type' => 'success'
        );

        return redirect()->route('all.slider')->with($notification);
    }

    public function EditSlider($id)
    {
        $sliders = Slider::findOrFail($id);
        return view('admin.slider.edit_slider', compact('sliders'));
    }

    public function UpdateSlider(Request $request)
    {
        $slider_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('photo')) {
            unlink($old_img);
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(1920, 400)->save('upload/sliders/' . $name_gen);
            $save_url = 'upload/sliders/' . $name_gen;

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'link' => $request->link,
                'type' => $request->type,
                'desk' => $request->desk,
                'photo' => $save_url,


            ]);

            $notification = array(
                'message' => 'Slider Güncellendi',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'link' => $request->link,
                'type' => $request->type,
                'desk' => $request->desk,
            ]);

            $notification = array(
                'message' => 'Slider Güncellendi',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }

    public function SliderInactive($id)
    {
        Slider::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Slider Yayından Kaldırıldı.',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function SliderActive($id)
    {
        Slider::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Slider Yayına Alındı.',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function SliderDelete($id)
    {
        $sliders = Slider::findOrFail($id);
        unlink($sliders->photo);
        Slider::findOrFail($id)->delete();

       
        $notification = array(
            'message' => 'Slider Silindi',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
