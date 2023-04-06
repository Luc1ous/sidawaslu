<?php

namespace App\Http\Controllers;

use App\Models\AdHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GenerateController extends Controller
{
    public function index($id) {
        $pengawas = AdHoc::find($id);
        return view('generate.index', compact('pengawas'));
    }

    public function generate() {
        return view('generate.generate');
    }

    public function proses(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $pengawas = AdHoc::find($request->id);
        $link = url('') . '/generate/' . $request->id;
        $qrcode = QrCode::size(200)->merge('\public\assets\logo-bawaslu.png')->generate($link);
        if($pengawas) {
            return view('generate.qrcode', compact('qrcode', 'link'));
        } else {
            return back()->with('error', 'ID Pengawas tidak ditemukan !');
        }
    }

    // public function qrcode() {
    //     return view('generate.qrcode');
    // }
}
