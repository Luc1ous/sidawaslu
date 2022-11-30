<?php

namespace App\Http\Controllers;

use App\Http\Requests\PanwascamRequest;
use App\Imports\AdHocPanwascamImport;
use App\Imports\PanwascamImport;
use App\Models\AdHoc;
use App\Models\Panwascam;
use App\Models\PengalamanKepemiluan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class PanwascamController extends Controller
{
    public function index($tahun){
        $selectedYear = $tahun;
        $listPengawas = AdHoc::where('tahun', $tahun)->where('keterangan', 'Panwascam')->orderBy('nama', 'asc')->paginate(10);
        return view('panwascam.index', compact('selectedYear', 'listPengawas'));
    }

    public function add($tahun){
        // $listPengalaman = PengalamanKepemiluan::all();
        return view('panwascam.add', compact('tahun'));
    }

    public function store(PanwascamRequest $request, $tahun){
        $request['keterangan'] = 'Panwascam';
        $request["tahun"] = $tahun;
        // Panwascam::create($request->all());
        AdHoc::create($request->all());
        return redirect()->to("/panwascam/".$tahun)->with('success', 'Data berhasil ditambahkan');
    }

    public function import(Request $request){
        $request->validate([
            'file' => 'required'
        ]);

        // Excel::import(new PanwascamImport, $request->file('file'));
        Excel::import(new AdHocPanwascamImport, $request->file('file'));
        return redirect()->back()->with('success', 'Data berhasil di Import ke Database');
    }

    public function search($tahun, Request $request){
        $selectedYear = $tahun;
        $query = $request->search;
        if(!is_null($request->search)){
            $listPengawas = AdHoc::where('tahun', $tahun)
                            ->where('keterangan', 'Panwascam')
                            ->where('nama', 'like', "%".$query."%")
                            ->orWhere('kecamatan', 'like', "%".$query."%")
                            ->orWhere('jenis_kelamin', 'like', "%".$query."%")
                            ->orWhere('pendidikan', 'like', "%".$query."%")
                            ->orderBy('nama', 'asc')
                            ->paginate(10);
        } else {
            $listPengawas = AdHoc::where('tahun', $tahun)->where('keterangan', 'Panwascam')->orderBy('nama', 'asc')->paginate(10);
        }
        return view('panwascam.index', compact('selectedYear', 'listPengawas', 'query'));
    }

    public function edit($tahun, $id){
        $pengawas = AdHoc::where('id', $id)->first();
        $tanggal_lahir = date('d/m/Y', strtotime($pengawas['tanggal_lahir']));
        return view('panwascam.edit', compact('pengawas', 'tanggal_lahir', 'tahun'));
    }

    public function update(PanwascamRequest $request, $tahun, $id){
        $request['tahun'] = $tahun;
        AdHoc::find($id)->update($request->all());
        return redirect()->to('/panwascam/'.$tahun)->with('success', 'Data berhasil diupdate');
    }

    public function delete($id){
        AdHoc::find($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
