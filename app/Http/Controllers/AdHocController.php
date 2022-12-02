<?php

namespace App\Http\Controllers;

use App\Models\AdHoc;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdHocController extends Controller
{
    public function index(){
        $listPengawas = AdHoc::paginate(10);
        return view('adhoc.index', compact('listPengawas'));
    }

    public function search(Request $request){
        $search = $request->search;
        if(!is_null($request->search)){
            $listPengawas = AdHoc::search($search)->orderBy('nama', 'asc')->paginate(10);
        } else {
            $listPengawas = AdHoc::latest()->paginate(10);
        }
        return view('adhoc.index', compact('listPengawas', 'search'));
    }

    public function filter($filter){
        $data = AdHoc::orderBy($filter, 'asc');
        $listPengawas = $data->paginate(10);
        return view('adhoc.index', compact('listPengawas'));
    }
}
