<?php

namespace App\Http\Controllers;

use App\Http\Requests\PanwascamRequest;
use App\Imports\PanwascamImport;
use App\Models\Panwascam;
use App\Models\PengalamanKepemiluan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PanwascamController extends Controller
{
    public function index($tahun){
        $selectedYear = $tahun;
        $listPengawas = Panwascam::where('tahun', $tahun)->orderBy('nama', 'asc')->paginate(10);
        return view('panwascam.index', compact('selectedYear', 'listPengawas'));
    }

    public function add($tahun){
        $listPengalaman = PengalamanKepemiluan::all();
        return view('panwascam.add', compact('tahun', 'listPengalaman'));
    }

    public function store(PanwascamRequest $request, $tahun){
        $request["pengalaman_kepemiluan"] = implode("\n", $request->pengalaman_kepemiluan);
        $request["tahun"] = $tahun;
        Panwascam::create($request->all());
        return redirect()->to("/panwascam/".$tahun);
    }

    public function import(Request $request){
        Excel::import(new PanwascamImport, $request->file('file'));
        return redirect()->back();
    }

    public function search($tahun, Request $request){
        $selectedYear = $tahun;
        $query = $request->search;
        if(!is_null($request->search)){
            $listPengawas = Panwascam::where('tahun', $tahun)
                            ->where('nama', 'like', "%".$query."%")
                            ->orWhere('kecamatan', 'like', "%".$query."%")
                            ->paginate(10);
        } else {
            $listPengawas = Panwascam::where('tahun', $tahun)->orderBy('nama', 'asc')->paginate(10);
        }
        return view('panwascam.index', compact('selectedYear', 'listPengawas'));
    }

    public function edit($tahun, $id){
        $pengawas = Panwascam::where('id', $id)->first();
        $tanggal_lahir = date('d/m/Y', strtotime($pengawas['tanggal_lahir']));
        $listPengalaman = PengalamanKepemiluan::all();
        return view('panwascam.edit', compact('pengawas', 'tanggal_lahir', 'tahun', 'listPengalaman'));
    }

    public function update(PanwascamRequest $request, $tahun, $id){
        $request['tahun'] = $tahun;
        Panwascam::find($id)->update($request->all());
        return redirect()->to('/panwascam/'.$tahun);
    }

    public function delete($id){
        Panwascam::find($id)->delete();
        return redirect()->back();
    }
}
