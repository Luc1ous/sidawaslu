<?php

namespace App\Http\Controllers;

use App\Models\Panwascam;
use App\Models\Panwasdes;
use App\Models\Panwastps;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $panwascam = Panwascam::all()->count();
        $panwasdes = Panwasdes::all()->count();
        $panwastps = Panwastps::all()->count();
        $date = Carbon::now()->isoFormat('dddd, D MMMM Y');
        return view('dashboard', compact([
            'date',
            'panwascam',
            'panwasdes',
            'panwastps'
        ]));
    }
}
