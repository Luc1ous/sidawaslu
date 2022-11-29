<?php

namespace App\Http\Controllers;

use App\Http\Requests\PanwasdesRequest;
use App\Imports\AdHocPanwasdesImport;
use App\Imports\PanwasdesImport;
use App\Models\Panwasdes;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class PanwasdesController extends Controller
{
    public function index($tahun){
        $selectedYear = $tahun;
        $listPengawas = Panwasdes::where('tahun', $tahun)->orderBy('nama', 'asc')->paginate(10);
        return view('panwasdes.index', compact('selectedYear', 'listPengawas'));
    }

    public function search($tahun, Request $request){
        $selectedYear = $tahun;
        $query = $request->search;
        if(!is_null($request->search)){
            $listPengawas = Panwasdes::where('tahun', $tahun)
                            ->where('nama', 'like', "%".$query."%")
                            ->orWhere('kecamatan', 'like', "%".$query."%")
                            ->orWhere('jenis_kelamin', 'like', "%".$query."%")
                            ->orderBy('nama', 'asc')
                            ->paginate(10);
        } else {
            $listPengawas = Panwasdes::where('tahun', $tahun)->orderBy('nama', 'asc')->paginate(10);
        }
        return view('panwasdes.index', compact('selectedYear', 'listPengawas', 'query'));
    }

    public function import(Request $request){
        $request->validate([
            'file' => 'required'
        ]);
        Excel::import(new PanwasdesImport, $request->file('file'));
        Excel::import(new AdHocPanwasdesImport, $request->file('file'));
        return redirect()->back()->with('success', 'Data berhasil di Import ke Database');
    }

    public function add($tahun){
        return view('panwasdes.add', compact('tahun'));
    }

    public function store(PanwasdesRequest $request, $tahun){
        $request['tahun'] = $tahun;
        Panwasdes::create($request->all());
        return redirect()->to("/panwasdes/".$tahun)->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($tahun, $id){
        $pengawas = Panwasdes::find($id);
        return view('panwasdes.edit', compact('pengawas', 'tahun'));
    }

    public function update(PanwasdesRequest $request, $tahun, $id){
        $request['tahun'] = $tahun;
        Panwasdes::find($id)->update($request->all());
        return redirect()->to('/panwasdes/'.$tahun)->with('success', 'Data berhasil diupdate');
    }

    public function delete($id){
        Panwasdes::find($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
