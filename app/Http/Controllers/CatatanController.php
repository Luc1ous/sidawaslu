<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
    public function index(){
        $listCatatan = Catatan::latest()->paginate(5);
        return view('catatan.index', compact('listCatatan'));
    }

    public function add(){
        return view('catatan.add');
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'judul' => 'required',
            'catatan' => 'required'
        ]);

        Catatan::create($validateData);
        return redirect()->to('/catatan')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id){
        $catatan = Catatan::find($id);
        return view('catatan.edit', compact('catatan'));
    }

    public function update(Request $request, $id){
        $validateData = $request->validate([
            'judul' => 'required',
            'catatan' => 'required'
        ]);

        Catatan::find($id)->update($validateData);
        return redirect()->to('/catatan')->with('success', 'Data berhasil diupdate');
    }

    public function delete($id){
        Catatan::find($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
