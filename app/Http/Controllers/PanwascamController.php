<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\AdHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AdHocPanwascamImport;
use App\Http\Requests\PengawasRequest;
use App\Http\Requests\PanwascamRequest;
use Illuminate\Support\Facades\Storage;

class PanwascamController extends Controller
{
    public function index($tahun)
    {
        $tahun = $tahun;
        $listPengawas = AdHoc::tahun($tahun)->ket('Panwascam')->paginate(10);
        return view('panwascam.index', compact('tahun', 'listPengawas'));
    }

    public function add($tahun)
    {
        return view('panwascam.add', compact('tahun'));
    }

    public function store(PengawasRequest $request, $tahun)
    {
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->move(public_path('images'), $imageName);
            $request['foto'] = $imageName;
        }
        
        $request['keterangan'] = 'Panwascam';
        $request["tahun"] = $tahun;
        AdHoc::create($request->all());
        return redirect()->to("/panwascam/" . $tahun)->with('success', 'Data berhasil ditambahkan');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required'
        ]);

        Excel::import(new AdHocPanwascamImport, $request->file('file'));
        try {
            return redirect()->back()->with('success', 'Data berhasil di Import ke Database');
        } catch (Throwable $e) {
            report($e);
            return redirect()->back()->with('error', 'Data gagal ditambahkan. Pastikan file / format file yang di upload sudah benar !');
        }
    }

    public function search($tahun, Request $request)
    {
        $tahun = $tahun;
        $search = $request->search;
        if (!is_null($request->search)) {
            $listPengawas = AdHoc::tahun($tahun)->ket('panwascam')
                ->where(function ($query) use ($search) {
                    $query->where('nama', 'like', '%' . $search . '%')
                        ->orWhere('kecamatan', 'like', '%' . $search . '%')
                        ->orWhere('jenis_kelamin', 'like', '%' . $search . '%')
                        ->orWhere('pendidikan', 'like', '%' . $search . '%');
                })->orderBy('nama', 'asc')->paginate(10);
        } else {
            $listPengawas = AdHoc::where('tahun', $tahun)->where('keterangan', 'Panwascam')->paginate(10);
        }
        return view('panwascam.index', compact('tahun', 'listPengawas', 'search'));
    }

    public function filter($tahun, $filter)
    {
        $tahun = $tahun;
        $listPengawas = AdHoc::tahun($tahun)->ket('panwascam')->orderBy($filter, 'asc')->paginate(10);
        return view('panwascam.index', compact('listPengawas', 'tahun'));
    }

    public function edit($tahun, $id)
    {
        $pengawas = AdHoc::where('id', $id)->first();
        $tanggal_lahir = date('d/m/Y', strtotime($pengawas['tanggal_lahir']));
        return view('panwascam.edit', compact('pengawas', 'tanggal_lahir', 'tahun'));
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
        return redirect()->to('/panwascam/' . $tahun)->with('success', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $pengawas = AdHoc::find($id);
        File::delete('images/'.$pengawas->foto);
        $pengawas->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
