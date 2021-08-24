<?php

namespace App\Http\Controllers;


use App\Relawan;
use Illuminate\Http\Request;

class RelawanApiController extends Controller
{
    public function upRelawan(Request $request){
        $relawan = new Relawan;

        $relawan->relawan_id=$request->relawan_id;
        $relawan->lapakbaca_id=$request->lapakbaca_id;
        $relawan->status=0;
        if($relawan->save()){
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
