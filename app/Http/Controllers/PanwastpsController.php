<?php

namespace App\Http\Controllers;

use App\Models\AdHoc;
use App\Models\Panwastps;
use Illuminate\Http\Request;
use App\Imports\PanwastpsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AdHocPanwastpsImport;
use App\Http\Requests\PanwastpsRequest;
use RealRashid\SweetAlert\Facades\Alert;

class PanwastpsController extends Controller
{
    public function index($tahun){
        $selectedYear = $tahun;
        $listPengawas = AdHoc::where('tahun', $tahun)->where('keterangan', 'Pengawas TPS')->orderBy('nama', 'asc')->paginate(10);
        return view('panwastps.index', compact('selectedYear', 'listPengawas'));
    }

    public function search($tahun, Request $request){
        $selectedYear = $tahun;
        $query = $request->search;
        if(!is_null($request->search)){
            $listPengawas = AdHoc::where('tahun', $tahun)
                            ->where('keterangan', 'Pengawas TPS')
                            ->where('nama', 'like', "%".$query."%")
                            ->orWhere('kecamatan', 'like', "%".$query."%")
                            ->orWhere('jenis_kelamin', 'like', "%".$query."%")
                            ->orderBy('nama', 'asc')
                            ->paginate(10);
        } else {
            $listPengawas = AdHoc::where('tahun', $tahun)->where('keterangan', 'Pengawas TPS')->orderBy('nama', 'asc')->paginate(10);
        }

        return view('panwastps.index', compact('selectedYear', 'listPengawas', 'query'));
    }

    public function import(Request $request){
        $request->validate([
            'file' => 'required'
        ]);
        // Excel::import(new PanwastpsImport, $request->file('file'));
        Excel::import(new AdHocPanwastpsImport, $request->file('file'));
        return redirect()->back()->with('success', 'Data berhasil di Import ke Database');
    }

    public function add($tahun){
        return view('panwastps.add', compact('tahun'));
    }

    public function store(PanwastpsRequest $request, $tahun){
        $request['keterangan'] = 'Pengawas TPS';
        $request['tahun'] = $tahun;
        AdHoc::create($request->all());
        return redirect()->to('/panwastps/'.$tahun)->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($tahun, $id){
        $pengawas = AdHoc::find($id);
        return view('panwastps.edit', compact('pengawas', 'tahun'));
    }

    public function update(PanwastpsRequest $request, $tahun, $id){
        $request['tahun'] = $tahun;
        AdHoc::find($id)->update($request->all());
        return redirect()->to('/panwastps/'.$tahun)->with('success', 'Data berhasil diupdate');
    }

    public function delete($id){
        AdHoc::find($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

}
