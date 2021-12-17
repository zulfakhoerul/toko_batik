<?php

namespace App\Http\Controllers;

use App\Pembeli;
use Hash;
use Session;
use Alert;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    public function index(){
        if(!Session::get('login')){
            alert()->error('Kamu harus login dulu', 'Gagal');
            return redirect('/login');
        }
        else{
            return view('/pembeli/DashboardPembeli');
        }
    }
    public function loginPage(){
        return view('/login');
    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;

        $data = Pembeli::where('email',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('nama',$data->nama_pembeli);
                Session::put('email',$data->email);
                Session::put('id',$data->id);
                Session::put('login',TRUE);
                return redirect('/pembeli/DashboardPembeli');
            }
            else{
        alert()->error('Email atau Password Salah', 'Error');

                return redirect('/login');
            }
        }
        else{
        alert()->error('Email atau Password Salah', 'Error');

            return redirect('/login');
        }
    }

    public function logout(){
        Session::flush();
        alert()->info('Kamu Sudah Log Out', 'Logout');
        return redirect('/login');
    }

    public function registerPage(){
        return view('/daftar');
    }

    public function registerPembeli(Request $request){
        $this->validate($request, [
            'nama' => 'required|min:4',
            'no_hp' => 'required|min:4',
            'email' => 'required|min:4',
            'password' => 'required',
            'confirmation' => 'required|same:password',

        ],[
            'nama.required' => 'Nama harus diisi dengan lengkap',
            'no_hp.required' => 'No HP harus diisi',
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
            'confirmation.required' => 'Isi dengan password yang sama',
        ]);

        $data =  new Pembeli();
        $data->nama = $request->nama;
        $data->no_hp = $request->no_hp;
        $data->alamat_lengkap = $request->alamat;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);

        $data->save();

        alert()->success('Kamu Berhasil Registrasi', 'Berhasil');
        return redirect('/login');
    }
}

