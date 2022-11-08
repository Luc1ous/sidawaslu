<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TahunController extends Controller
{
    public function index()
    {
        $listTahun = Tahun::all();
        return view('tahun.index', compact('listTahun'));
    }


    public function add()
    {
        return view('tahun.add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'tahun' => 'required|integer|digits:4|unique:tahun,tahun'
        ]);

        if($validate){
            Tahun::create($validate);
            return redirect()->to('/tahun');
        } else {
            return redirect()->back();
        }
    }

    public function view($id)
    {
        $tahun = Tahun::where('id', $id)->first();
        return view('tahun.edit', compact('tahun'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'tahun' => ['required', 'integer', 'digits:4', Rule::unique('tahun')->ignore($id)]
        ]);

        if($validate){
            Tahun::where('id', $id)->update($validate);
            return redirect()->to('/tahun');
        } else {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        Tahun::where('id', $id)->delete();
        return redirect()->to('/tahun');
    }
}
