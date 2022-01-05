<?php

namespace App\Providers;

use App\Models\Notifikasi;
use App\Models\Perjalanan;
use App\Models\Pesanan;
use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
        Carbon::parse('2019-03-01')->translatedFormat('d F Y'); // Output: "01 Maret 2019"
        now()->subMinute(5)->diffForHumans();

        view()->composer('*', function ($view) {
            $notifikasi = null;
            $average_rating = null;
            if (Auth::user() != null) {
                if (Auth::user()->level == 'admin') {
                    $notifikasi = Notifikasi::with('pesanan')->where('Read', '=', false)
                        ->get();
                } elseif (Auth::user()->level == 'guide') {
                    $notifikasi = Notifikasi::whereIn('perjalanan_id', Auth::user()->perjalanans->pluck('id')->toArray())
                        ->where('Read', '=', false)
                        ->get();
                    $rating_guide = Rating::with('perjalanan')->where('perjalanan_id', Auth::user()->id)->get();
                    $average_rating = $rating_guide->avg('rating');
                }
            }
            $view->with(['notifikasi' => $notifikasi, 'average_rating' => $average_rating ? $average_rating : 5]);
        });
    }
}
