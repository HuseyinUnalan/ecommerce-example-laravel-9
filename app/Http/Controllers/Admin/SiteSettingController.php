<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Image;

class SiteSettingController extends Controller
{
    public function SiteSetting()
    {
        $settings = SiteSetting::find(1);
        return view('admin.settings.edit_site_settings', compact('settings'));
    }

    public function SettingsStore(Request $request)
    {

        $settings = SiteSetting::find(1);
        $settings->site_title = $request->site_title;
        $settings->phone = $request->phone;
        $settings->email = $request->email;
        $settings->address = $request->address;
        $settings->whatsapp = $request->whatsapp;
        $settings->facebook = $request->facebook;
        $settings->twitter = $request->twitter;
        $settings->instagram = $request->instagram;
        $settings->youtube = $request->youtube;
        $settings->linkedin = $request->linkedin;




        if ($request->file('logo')) {
            $file = $request->file('logo');
            @unlink(public_path($settings->logo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/logos'), $filename);
            $settings['logo'] = 'upload/logos/' . $filename;
        }

        if ($request->file('favicon')) {
            $file = $request->file('favicon');
            @unlink(public_path($settings->favicon));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/logos'), $filename);
            $settings['favicon'] = 'upload/logos/' .  $filename;
        }

        $settings->save();

        $notification = array(
            'message' => 'Site Ayarları Başarı İle Güncellendi.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function SEOSetting()
    {
        $seo = Seo::find(1);
        return view('admin.settings.edit_seo_settings', compact('seo'));
    }

    public function SEOStore(Request $request) {
        $seo_id = $request->id;

    	Seo::findOrFail($seo_id)->update([
		'meta_title' => $request->meta_title,
		'meta_keyword' => $request->meta_keyword,
		'meta_description' => $request->meta_description,
		'google_analytics' => $request->google_analytics,		 

    	]);

	    $notification = array(
			'message' => 'SEO Bilgileri Başarılı İle Güncellendi.',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    }
}
