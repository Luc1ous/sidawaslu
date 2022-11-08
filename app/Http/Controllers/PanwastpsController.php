<?php

namespace App\Http\Controllers;

use App\Imports\PanwastpsImport;
use App\Models\Panwastps;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PanwastpsController extends Controller
{
    public function index($tahun){
        $selectedYear = $tahun;
        $listPengawas = Panwastps::where('tahun', $tahun)->orderBy('nama', 'asc')->paginate(10);
        return view('panwastps.index', compact('selectedYear', 'listPengawas'));
    }

    public function import(Request $request){
        $request->validate([
            'file' => 'required'
        ]);
        Excel::import(new PanwastpsImport, $request->file('file'));
        return redirect()->back();
    }

    public function search($tahun, Request $request){
        $selectedYear = $tahun;
        $query = $request->search;
        $listPengawas = Panwastps::where('tahun', $tahun)
                        ->where('nama', 'like', "%".$query."%")
                        ->orWhere('kecamatan', 'like', "%".$query."%")
                        ->paginate(10);

        return view('panwastps.index', compact('selectedYear', 'listPengawas'));
    }


}
