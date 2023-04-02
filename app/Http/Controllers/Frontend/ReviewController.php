<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function ReviewStore(Request $request)
    {
        $product = $request->product_id;
        $request->validate([
            'summary' => 'required',
            'comment' => 'required',
        ]);

        Review::insert([
            'product_id' => $product,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'summary' => $request->summary,
            'rating' => $request->quality,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            // 'message' => 'Yorumunuz Onaylanmak Üzere Başarı İle Gönderildi.',
            'message' => 'Yorumunuz Başarı İle Eklendi.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    //For Admin Panel
    public function AllReview()
    {
        $reviews = Review::orderBy('id', 'DESC')->get();
        return view('admin.review.all_reviews', compact('reviews'));
    }

    public function ReviewApprove($id)
    {
        Review::where('id', $id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Yorum Başarı İle Onaylandı.',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function DeleteReview($id) {
        
        Review::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Yorum Başaarı İle Silindi.',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
