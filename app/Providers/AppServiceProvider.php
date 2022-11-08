<?php

namespace App\Providers;

use App\Models\Tahun;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrapFive();
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        $listTahun = Tahun::orderBy('tahun', 'desc')->get();
        view()->share('listTahun', $listTahun);
    }
}
