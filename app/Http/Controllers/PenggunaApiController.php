<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PenggunaApiController extends Controller
{
        public function tampilUser(Request $request){
            $id=$request->pengguna_id;

            $pengguna = User::where('id',$id)->first();
            return response()->json($pengguna, 200);
    }

    public function ubahProfilUser(Request $request){
        $id=$request->id;

        $profil= User::find($id);
        if($profil->update([
            'nama' => $request->nama,
            'email' =>$request->email, 
            'password' => $request->password,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
        ])){
            $pesan = [
                "message" => "success",
                "success" => true
            ];
            return response()->json($pesan);
        }else{
            $pesan = [
                "message" => "gagal",
                "success" => true
            ];
            return response()->json($pesan);
        };

    }
}