<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tahun;
use App\Models\Panwascam;
use App\Models\Panwasdes;
use App\Models\Panwastps;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index(){
        $panwascam = Panwascam::distinct('nik')->count();
        $panwasdes = Panwasdes::all()->count();
        $panwastps = Panwastps::all()->count();

        $date = Carbon::now()->isoFormat('dddd, D MMMM Y');
        return view('dashboard', compact([
            'date',
            'panwascam',
            'panwasdes',
            'panwastps',
        ]));
    }
}
