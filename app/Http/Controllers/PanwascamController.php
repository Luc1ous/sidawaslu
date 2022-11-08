<?php

namespace App\Http\Controllers;

use App\Imports\PanwascamImport;
use App\Models\Panwascam;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PanwascamController extends Controller
{
    public function index($tahun){
        $selectedYear = $tahun;
        $listPengawas = Panwascam::where('tahun', $tahun)->orderBy('nama', 'asc')->paginate(10);
        return view('panwascam.index', compact('selectedYear', 'listPengawas'));
    }

    public function import(Request $request){
        Excel::import(new PanwascamImport, $request->file('file'));
        return redirect()->back();
    }

    public function search($tahun, Request $request){
        $selectedYear = $tahun;
        $query = $request->search;
        $listPengawas = Panwascam::where('tahun', $tahun)
                        ->where('nama', 'like', "%".$query."%")
                        ->orWhere('kecamatan', 'like', "%".$query."%")
                        ->paginate(10);

        return view('panwascam.index', compact('selectedYear', 'listPengawas'));
    }
}
