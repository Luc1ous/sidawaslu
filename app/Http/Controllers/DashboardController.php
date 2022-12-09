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
        $total = AdHoc::all()->count();
        $panwascam = AdHoc::where('keterangan', 'Panwascam')->count();
        $panwasdes = AdHoc::where('keterangan', 'Panwasdes')->count();
        $panwastps = AdHoc::where('keterangan', 'Pengawas TPS')->count();
        $male = AdHoc::where('jenis_kelamin', 'L')->orWhere('jenis_kelamin', 'Laki - Laki')->count();
        $female = AdHoc::where('jenis_kelamin', 'Perempuan')->orWhere('jenis_kelamin', 'p')->count();

        $date = Carbon::now()->isoFormat('dddd, D MMMM Y');
        return view('dashboard', compact([
            'date',
            'total',
            'panwascam',
            'panwasdes',
            'panwastps',
            'male',
            'female',
        ]));
    }
}
