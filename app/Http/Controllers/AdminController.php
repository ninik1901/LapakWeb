<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;

class AdminController extends Controller
{
    public function beranda(){
        return view('admin.beranda');

    }
    public function tambahAdmin(){
        return view('auth.tambahadmin');

    }

    public function upAdmin(Request $request){
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
            'password' => Hash::make($request->password),
            'role_id' => 1,
        ]);

        Alert::success('Tambah Admin Berhasil');

        return redirect()->back();

    }

    
}
