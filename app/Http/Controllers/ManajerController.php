<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\Absensi;

class ManajerController extends Controller
{
    public function laporan_absensi(){
        $data = Absensi::All();
        return view('admin.pages.manajer.laporan_absensi', compact('data'));
    }

    public function laporan_cuti(){
        $data = Cuti::where('status', 3)->get();
        return view('admin.pages.manajer.laporan_cuti', compact('data'));
    }

    public function pengajuan_cuti_pegawai(){
        $data = Cuti::where('status', 2)->get();
        return view('admin.pages.manajer.acc_cuti', compact('data'));
    }

    public function acc_pengajuan_cuti_pegawai($id){
        $data = Cuti::find($id);
        $data->status = 3;
        $data->save();
        return redirect()->route('pengajuan_cuti_pegawai');
    }
}
