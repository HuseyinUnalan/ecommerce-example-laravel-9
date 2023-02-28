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

        Image::make($image)->resize(218, 218)->save('upload/sliders/' . $name_gen);
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
}
