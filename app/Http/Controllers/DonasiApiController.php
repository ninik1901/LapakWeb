<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donasi;
use App\Buku;
use App\User;
use File;

class DonasiApiController extends Controller
{
    public function pengajuanBuku(Request $request){

        $image = $request->file('foto_cover');
        $nama_file = str_replace(' ','',$request->judul_buku);
        $image_name = 'cover-'.$nama_file.'.'.$request->file('foto_cover')->extension();
        $path = public_path('img/buku/');

        $pengajuan = new Donasi;
        $pengajuan->judul_buku=$request->judul_buku;
        $pengajuan->jumlah_buku=$request->jumlah_buku;
        $pengajuan->jenis_buku=$request->jenis_buku;
        $pengajuan->alamat_donatur=$request->alamat_donatur;
        $pengajuan->foto_cover=$image_name;
        $pengajuan->donatur=$request->donatur;
        $pengajuan->status = 0;
        $pengajuan->sinopsis=$request->sinopsis;
        $pengajuan->jenis_donasi=$request->jenis_donasi;
        $image->move($path, $image_name);
        if($pengajuan->save()){
            $pesan = [
                "message" => "success",
                "succes" => true
            ];
                return response()->json($pesan);
        }else{
            $pesan = [
                "message" => "gagal",
                "succes" => false
            ];
                return response()->json($pesan);
        };

        return response()->json($pengajuan, 200);
    }

    public function pengajuanEbook(Request $request){
       
        $pengajuanebook = new Donasi;
        $pengajuanebook->judul_buku=$request->judul_buku;
        $pengajuanebook->jumlah_buku=$request->jumlah_buku;
        $pengajuanebook->jenis_buku=$request->jenis_buku;
        $pengajuanebook->alamat_donatur=$request->alamat_donatur;
        $pengajuanebook->donatur=$request->donatur;
        $pengajuanebook->status= 0;
        $pengajuanebook->sinopsis=$request->sinopsis;
        $pengajuanebook->jenis_donasi=$request->jenis_donasi;
        if($pengajuanebook->save()){
            $pesan = [
                "message" => "success",
                "succes" => true
            ];
                return response()->json($pesan);
        }else{
            $pesan = [
                "message" => "gagal",
                "succes" => false
            ];
                return response()->json($pesan);
        };

        return response()->json($pengajuanebook, 200);

    }

    public function donasiEbook(Request $request){

        $nama_file = str_replace(' ','',$request->judul_buku);
        $ebookf = $request->file('file_ebook');
        $nama_ebook = 'ebook-'.$nama_file.'.'.$request->file('file_ebook')->extension();
        $path = public_path('file/ebook/');

        $id = $request->id_donasi;

        $ebook = Donasi::where('id',$id)->first();
        $ebook->file_ebook = $nama_ebook;
        $ebook->judul_buku = $request->judul_buku;

        $ebookf->move($path, $nama_ebook);
        if ($ebook) {
            if($ebook->update(['file_ebook'=> $nama_ebook, 'status'=>$status = 2])){
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

    public function donasiBuku(Request $request){

        $id = $request->id_donasi;  

        $cod = Donasi::find($id);
        $jenis_donasi = $cod->jenis_donasi;

        switch($jenis_donasi){
            case "paket":
                $bukti = $request->bukti_donasi;
                if($cod->update([
                    'bukti_donasi' => $bukti,
                    'status' => 2, 
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
            break;
            case "cod":
                $image = $request->file('bukti_donasi');
                $nama_file = str_replace(' ','',$request->judul_buku);
                $image_name = 'bukti-'.$nama_file.'.'.$request->file('bukti_donasi')->extension();
                $path = public_path('img/donasi/');
                $image->move($path, $image_name);
                if($cod->update([
                    'bukti_donasi' => $image_name,
                    'status' => 2,
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
            break;        
        }
    }

    public function infoDonasiebook(){
        $jumlah_ebook= Buku::where('jenis_buku','ebook')
                        ->whereNotNull('donatur_id')
                        ->count();

        return response()->json(["ebook" => $jumlah_ebook], 200);

    }

    public function infoDonasibuku(){
        $jumlah_buku= Buku::where('jenis_buku','buku')
                        ->whereNotNull('donatur_id')
                        ->count();

        return response()->json(["buku" => $jumlah_buku], 200);
    }

    public function infoDonasipengguna(Request $request){
        $donatur_id = $request->donatur_id;

        $banyak_donasi= Buku::where('donatur_id', $donatur_id)->count();
        return response()->json(["donatur_id" => $banyak_donasi], 200);
       
    }
}
