<?php

namespace App\Http\Controllers;

use App\Models\AdHoc;
use Illuminate\Http\Request;

class AdHocController extends Controller
{
    public function index($tahun){
        $selectedYear = $tahun;
        $listPengawas = AdHoc::where('tahun', $tahun)->paginate(10);
        // dd($listPengawas);
        return view('adhoc.index', compact('selectedYear', 'listPengawas'));
    }

    public function search($tahun, Request $request){
        $selectedYear = $tahun;
        $query = $request->search;
        if(!is_null($request->search)){
            $listPengawas = AdHoc::where('tahun', $tahun)
                            ->where('nama', 'like', "%".$query."%")
                            ->orWhere('kecamatan', 'like', "%".$query."%")
                            ->orWhere('jenis_kelamin', 'like', "%".$query."%")
                            ->orWhere('pendidikan', 'like', "%".$query."%")
                            ->orderBy('nama', 'asc')
                            ->paginate(10);
        } else {
            $listPengawas = AdHoc::where('tahun', $tahun)->orderBy('nama', 'asc')->paginate(10);
        }
        return view('adhoc.index', compact('selectedYear', 'listPengawas', 'query'));
    }
}
