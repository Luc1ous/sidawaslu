<?php

namespace App\Http\Controllers;

use App\Models\AdHoc;
use Carbon\Carbon;
use App\Models\Panwascam;
use App\Models\Panwasdes;
use App\Models\Panwastps;

class DashboardController extends Controller
{
    public function index(){
        $panwascam = AdHoc::where('keterangan', 'Panwascam')->count();
        $panwasdes = AdHoc::where('keterangan', 'Panwasdes')->count();
        $panwastps = AdHoc::where('keterangan', 'Pengawas TPS')->count();

        $date = Carbon::now()->isoFormat('dddd, D MMMM Y');
        return view('dashboard', compact([
            'date',
            'panwascam',
            'panwasdes',
            'panwastps',
        ]));
    }
}
