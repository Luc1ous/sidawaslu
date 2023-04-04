<?php

namespace App\Http\Controllers;

use App\Models\AdHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AdHocPanwasdesImport;
use App\Http\Requests\PengawasRequest;
use App\Http\Requests\PanwasdesRequest;
use Illuminate\Support\Facades\Storage;

class PanwasdesController extends Controller
{
    public function index($tahun)
    {
        $tahun = $tahun;
        $listPengawas = AdHoc::where('tahun', $tahun)->where('keterangan', 'Panwasdes')->paginate(10);
        return view('panwasdes.index', compact('tahun', 'listPengawas'));
    }

    public function search($tahun, Request $request)
    {
        $tahun = $tahun;
        $search = $request->search;
        if (!is_null($request->search)) {
            $listPengawas = AdHoc::tahun($tahun)->ket('panwasdes')
                ->where(function ($query) use ($search) {
                    $query->where('nama', 'like', '%' . $search . '%')
                        ->orWhere('kecamatan', 'like', '%' . $search . '%')
                        ->orWhere('jenis_kelamin', 'like', '%' . $search . '%');
                })->orderBy('nama', 'asc')->paginate(10);
        } else {
            $listPengawas = AdHoc::where('tahun', $tahun)->where('keterangan', 'Panwasdes')->paginate(10);
        }
        return view('panwasdes.index', compact('tahun', 'listPengawas', 'search'));
    }

    public function filter($tahun, $filter)
    {
        $tahun = $tahun;
        $listPengawas = AdHoc::tahun($tahun)->ket('panwasdes')->orderBy($filter, 'asc')->paginate(10);
        return view('panwasdes.index', compact('listPengawas', 'tahun'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required'
        ]);
        try {
            Excel::import(new AdHocPanwasdesImport, $request->file('file'));
            return redirect()->back()->with('success', 'Data berhasil di Import ke Database');
        } catch (\Throwable $e) {
            report($e);
            return redirect()->back()->with('error', 'Data gagal ditambahkan. Pastikan file yang di upload sudah benar !');
        }
    }

    public function add($tahun)
    {
        return view('panwasdes.add', compact('tahun'));
    }

    public function store(PengawasRequest $request, $tahun)
    {
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->move(public_path('images'), $imageName);
            $request['foto'] = $imageName;
        }
        
        $request['keterangan'] = 'Panwasdes';
        $request["tahun"] = $tahun;
        AdHoc::create($request->all());
        return redirect()->to("/panwasdes/" . $tahun)->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($tahun, $id)
    {
        $pengawas = AdHoc::find($id);
        return view('panwasdes.edit', compact('pengawas', 'tahun'));
    }

    public function update(PengawasRequest $request, $tahun, $id)
    {
        $pengawas = AdHoc::find($id);
        $imageName = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->move(public_path('images'), $imageName);
            if($pengawas->foto) {
                File::delete('images/'.$pengawas->foto);
            }
        } else {
            $imageName = $pengawas->foto;
        }

        $request['foto'] = $imageName;
        $request['tahun'] = $tahun;
        $pengawas->update($request->all());
        return redirect()->to('/panwasdes/' . $tahun)->with('success', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $pengawas = AdHoc::find($id);
        File::delete('images/'.$pengawas->foto);
        $pengawas->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
