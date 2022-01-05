<?php

namespace App\Http\Controllers\Wisatawan;

use App\Http\Controllers\Controller;
use App\Models\Perjalanan;
use App\Models\Pesanan;
use App\Models\Rating;
use App\Models\Wisatawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function rating(Request $request, $id)
    {
        $pesanan = Pesanan::find($id);
        $wisatawan = Wisatawan::where('id', $pesanan->ketua_id)->first();
        // $rating = Rating::where('id', $wisatawan->rating_id)->first();
        $rating = Rating::where([['pesanan_id', '=', $pesanan->id], ['wisatawan_id', '=', $wisatawan->id]])->first();
        // $rating = Rating::join('pesanans','')
        // dd($rating);
        $rating->rating = $request->input('rating');
        $rating->review = $request->review;
        $rating->save();
        return redirect()->back();
    }
}
