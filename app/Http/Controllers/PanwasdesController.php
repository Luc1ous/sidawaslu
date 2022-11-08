<?php

namespace App\Http\Controllers;

use App\Imports\PanwasdesImport;
use App\Models\Panwasdes;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PanwasdesController extends Controller
{
    public function index($tahun){
        $selectedYear = $tahun;
        $listPengawas = Panwasdes::where('tahun', $tahun)->orderBy('nama', 'asc')->paginate(10);
        return view('panwasdes.index', compact('selectedYear', 'listPengawas'));
    }

    public function import(Request $request){
        Excel::import(new PanwasdesImport, $request->file('file'));
        return redirect()->back();
    }

    public function search($tahun, Request $request){
        $selectedYear = $tahun;
        $query = $request->search;
        $listPengawas = Panwasdes::where('tahun', $tahun)
                        ->where('nama', 'like', "%".$query."%")
                        ->orWhere('kecamatan', 'like', "%".$query."%")
                        ->paginate(10);
        return view('panwasdes.index', compact('selectedYear', 'listPengawas'));
    }
}
