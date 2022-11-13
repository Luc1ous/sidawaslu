<?php

namespace App\Http\Controllers;

use App\Models\Panwastps;
use Illuminate\Http\Request;
use App\Imports\PanwastpsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\PanwastpsRequest;
use RealRashid\SweetAlert\Facades\Alert;

class PanwastpsController extends Controller
{
    public function index($tahun){
        $selectedYear = $tahun;
        $listPengawas = Panwastps::where('tahun', $tahun)->orderBy('nama', 'asc')->paginate(10);
        return view('panwastps.index', compact('selectedYear', 'listPengawas'));
    }

    public function search($tahun, Request $request){
        $selectedYear = $tahun;
        $query = $request->search;
        if(!is_null($request->search)){
            $listPengawas = Panwastps::where('tahun', $tahun)
                            ->where('nama', 'like', "%".$query."%")
                            ->orWhere('kecamatan', 'like', "%".$query."%")
                            ->paginate(10);
        } else {
            $listPengawas = Panwastps::where('tahun', $tahun)->orderBy('nama', 'asc')->paginate(10);
        }

        return view('panwastps.index', compact('selectedYear', 'listPengawas'));
    }

    public function import(Request $request){
        $request->validate([
            'file' => 'required'
        ]);
        $data = Excel::import(new PanwastpsImport, $request->file('file'));
        if($data){
            return redirect()->back()->with('success', 'Data berhasil di Import ke Database');
        } else {
            Alert::error('Gagal', 'Data gagal di Import, pastikan format sudah benar !');
            return redirect()->back();
        }
    }

    public function add($tahun){
        return view('panwastps.add', compact('tahun'));
    }

    public function store(PanwastpsRequest $request, $tahun){
        $request['tahun'] = $tahun;
        Panwastps::create($request->all());
        return redirect()->to('/panwastps/'.$tahun)->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($tahun, $id){
        $pengawas = Panwastps::find($id);
        return view('panwastps.edit', compact('pengawas', 'tahun'));
    }

    public function update(PanwastpsRequest $request, $tahun, $id){
        $request['tahun'] = $tahun;
        Panwastps::find($id)->update($request->all());
        return redirect()->to('/panwastps/'.$tahun)->with('success', 'Data berhasil diupdate');
    }

    public function delete($id){
        Panwastps::find($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

}
