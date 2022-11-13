<?php

namespace App\Http\Controllers;

use App\Models\PengalamanKepemiluan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class PengalamanKepemiluanController extends Controller
{
    public function index(){
        $listPengalaman = PengalamanKepemiluan::all();
        return view('pengalaman.index', compact('listPengalaman'));
    }

    public function add(){
        return view('pengalaman.add');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'pengalaman' => 'required|unique:pengalaman_kepemiluan'
        ]);

        if ($validate) {
            PengalamanKepemiluan::create($validate);
            return redirect()->to('/pengalaman')->with('success', 'Data berhasil ditambahkan');
        } else {
            Alert::error('Gagal', 'Data gagal ditambahkan, silahkan ulangi !');
            return redirect()->back();
        }
    }

    public function view($id){
        $pengalaman = PengalamanKepemiluan::where('id', $id)->first();
        return view('pengalaman.edit', compact('pengalaman'));
    }

    public function update(Request $request, $id){
        $validate = $request->validate([
            'pengalaman' => ['required', Rule::unique('pengalaman_kepemiluan')->ignore($id)]
        ]);

        if($validate){
            PengalamanKepemiluan::where('id', $id)->update($validate);
            return redirect()->to('/pengalaman')->with('success', 'Data berhasil diupdate');
        } else {
            Alert::error('Gagal', 'Data gagal diupdate, silahkan ulangi !');
            return redirect()->back();
        }
    }

    public function delete($id){
        PengalamanKepemiluan::where('id', $id)->delete();
        return redirect()->to('/pengalaman')->with('success', 'Data berhasil dihapus');
    }
}
