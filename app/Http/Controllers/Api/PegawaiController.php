<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    public function login(Request $request){
        $user = $request->validate([
        	'email' => 'email|required',
        	'password' => 'required'
        ]);

        if(!auth()->attempt($user)) {
        	return response(['message' => 'invalid credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['message' => 'Login Berhasil' ,'user' => auth()->user(), 'access_token' => $accessToken]);
    }


    public function index($id){
        $data = Absensi::where('user_id', $id)->get();
        $akses_masuk = Absensi::whereDate('masuk', date("Y-m-d"))->first();
        $akses_keluar = Absensi::whereDate('keluar', date("Y-m-d"))->first();
        return response()->json([
	            'success' => true,
	            'data' => $data, $akses_masuk, $akses_keluar
	        ], 200);
    }

    public function absen_masuk($id){
        $masuk = new Absensi;
        $masuk->user_id = $id;
        $masuk->masuk = date("Y-m-d H:i:s");
        $masuk->status = '1';
        $masuk->save();

        return response()->json([
	            'success' => true,
	            'data' => $masuk
	        ], 200);
    }

    public function absen_keluar($id){
        $user = Absensi::where('user_id', $id)->first();
        $keluar = Absensi::find($user->id);
        $keluar->keluar = date("Y-m-d H:i:s");
        $keluar->status = '2';
        $keluar->save();

        return response()->json([
	            'success' => true,
	            'data' => $keluar
	        ], 200);
    }
}
