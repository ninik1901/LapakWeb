<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SimpanEbook;

class SimpanEbookApiController extends Controller
{
    public function daftarSimpan(Request $request) {
        $s = $this->validate ($request, [
            'user_id'=>'required',
            'buku_id'=>'required',
        ]);

        if ($s) {
            $simpan = new SimpanEbook();
            $simpan->user_id = $request['user_id'];
            $simpan->buku_id = $request['buku_id'];
            if($simpan->save()){
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

    public function tampilSimpan(Request $request){
        $user_id = $request->user_id;

        // $tampil_simpan= SimpanEbook::where('user_id', $user_id)->get();
        $tampil_simpan = DB::table('simpan_ebooks')
        ->join('bukus', 'simpan_ebooks.buku_id', '=', 'bukus.id')
        ->select('bukus.*')
        ->where('simpan_ebooks.user_id', $user_id)
        ->get();
        return response()->json(["tampil" => $tampil_simpan], 200);
    }

}

