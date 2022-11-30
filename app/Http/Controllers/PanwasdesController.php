<?php

namespace App\Http\Controllers;

use App\Models\AdHoc;
use App\Models\Panwasdes;
use Illuminate\Http\Request;
use App\Imports\PanwasdesImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AdHocPanwasdesImport;
use App\Http\Requests\PanwasdesRequest;
use RealRashid\SweetAlert\Facades\Alert;

class PanwasdesController extends Controller
{
    public function index($tahun){
        $selectedYear = $tahun;
        $listPengawas = AdHoc::where('tahun', $tahun)->where('keterangan', 'Panwasdes')->orderBy('nama', 'asc')->paginate(10);
        return view('panwasdes.index', compact('selectedYear', 'listPengawas'));
    }

    public function search($tahun, Request $request){
        $selectedYear = $tahun;
        $query = $request->search;
        if(!is_null($request->search)){
            $listPengawas = AdHoc::where('tahun', $tahun)
                            ->where('keterangan', 'Panwasdes')
                            ->where('nama', 'like', "%".$query."%")
                            ->orWhere('kecamatan', 'like', "%".$query."%")
                            ->orWhere('jenis_kelamin', 'like', "%".$query."%")
                            ->orderBy('nama', 'asc')
                            ->paginate(10);
        } else {
            $listPengawas = AdHoc::where('tahun', $tahun)->where('keterangan', 'Panwasdes')->orderBy('nama', 'asc')->paginate(10);
        }
        return view('panwasdes.index', compact('selectedYear', 'listPengawas', 'query'));
    }

    public function import(Request $request){
        $request->validate([
            'file' => 'required'
        ]);
        // Excel::import(new PanwasdesImport, $request->file('file'));
        Excel::import(new AdHocPanwasdesImport, $request->file('file'));
        return redirect()->back()->with('success', 'Data berhasil di Import ke Database');
    }

    public function add($tahun){
        return view('panwasdes.add', compact('tahun'));
    }

    public function store(PanwasdesRequest $request, $tahun){
        $request['keterangan'] = 'Panwasdes';
        $request['tahun'] = $tahun;
        AdHoc::create($request->all());
        return redirect()->to("/panwasdes/".$tahun)->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($tahun, $id){
        $pengawas = AdHoc::find($id);
        return view('panwasdes.edit', compact('pengawas', 'tahun'));
    }

    public function update(PanwasdesRequest $request, $tahun, $id){
        $request['tahun'] = $tahun;
        AdHoc::find($id)->update($request->all());
        return redirect()->to('/panwasdes/'.$tahun)->with('success', 'Data berhasil diupdate');
    }

    public function delete($id){
        AdHoc::find($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
