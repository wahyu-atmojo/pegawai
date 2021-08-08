<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Cuti;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class AbsenController extends Controller
{
    public function index(){
        $data = Absensi::All();
        $akses_masuk = Absensi::whereDate('masuk', date("Y-m-d"))->first();
        $akses_keluar = Absensi::whereDate('keluar', date("Y-m-d"))->first();
        return view('admin.pages.pegawai.absen.index', compact('data', 'akses_masuk', 'akses_keluar'));
    }

    public function absen_masuk(){
        $masuk = new Absensi;
        $masuk->user_id = Auth::user()->id;
        $masuk->masuk = date("Y-m-d H:i:s");
        $masuk->status = '1';
        $masuk->save();

        return redirect()->back();
    }

    public function absen_keluar(){
        $user = Absensi::where('user_id', Auth::user()->id)->first();
        $keluar = Absensi::find($user->id);
        $keluar->keluar = date("Y-m-d H:i:s");
        $keluar->status = '2';
        $keluar->save();

        return redirect()->back();
    }

    public function index_cuti(){
        $data = Absensi::All();
        return view('admin.pages.pegawai.cuti.index', compact('data'));
    }

    public function cuti_form(){
        return view('admin.pages.pegawai.cuti.form');
    }

    public function simpan_cuti(Request $request){

        $cuti = new Cuti;
        $cuti->user_id = Auth::user()->id;

        if($request->jenis_cuti == 1){
            $cuti->tanggal_cuti = Carbon::createFromFormat('m/d/Y', $request->tanggal_cuti)->format('Y-m-d');
            $cuti->tanggal_akhir = Carbon::createFromFormat('m/d/Y', $request->akhir_cuti)->format('Y-m-d');
            $cuti->image = $request->sk_sakit;
            $cuti->jenis_cuti = $request->jenis_cuti;
            $cuti->keterangan = $request->keterangan;
            $cuti->status = 1;
            $tgl_cuti = Carbon::parse($request->tanggal_cuti);
            $tgl_akhir = Carbon::parse($request->akhir_cuti);

            $jarak_hari = $tgl_cuti->diffInDays($tgl_akhir);
            // dd($jarak_hari);
            if($jarak_hari > 3 ){
                return redirect()->route('cuti')->with('info', 'Cuti Sakit Hanya Boleh 3 Hari Maksimal');
            }
            // dd($cuti);
            $cuti->save();
        }elseif($request->jenis_cuti == 2){
            $cuti->tanggal_cuti = Carbon::createFromFormat('m/d/Y', $request->tanggal_cuti)->format('Y-m-d');
            $cuti->tanggal_akhir =Carbon::createFromFormat('m/d/Y', $request->akhir_cuti)->format('Y-m-d');
            $cuti->jenis_cuti = $request->jenis_cuti;
            $cuti->keterangan = $request->keterangan;
            $cuti->status = 2;


            $to = Carbon::parse($request->tanggal_cuti);
            $from = Carbon::parse($request->akhir_cuti);

            $selisih = $to->diffInDays($from);

            $cuti->jumlah_cuti = $selisih;

            $tgl_cuti = Carbon::parse($request->tanggal_cuti);
            $hari_ini = Carbon::today();

            $jarak_hari = $tgl_cuti->diffInDays($hari_ini);
            if($jarak_hari < 1 ){
                return redirect()->route('cuti')->with('info', 'Pastikan pengajuan cuti H-1 sebelum tanggal mulai cuti');
            }
            // dd($cuti);
            $cuti->save();
        }

        return redirect()->route('cuti');
        
    }
}
