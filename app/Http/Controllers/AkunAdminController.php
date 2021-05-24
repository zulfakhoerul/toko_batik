<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AkunAdminController extends Controller {

    public function login(Request $request) {
        $auth = auth()->guard('admin');
        $credentials = $request->only('email', 'password');
        if ($auth->attempt($credentials)) {
            $request->session()->regenerate();
            $admin = Admin::where('email', $request->email)->value('nama');
            session()->put('nama', $admin);
            return redirect('admin/dashboard');//->route('dashboard');
        }else{
            return redirect()->back()->withErrors([
                'email atau password anda salah'
            ]);
        }
    }

    public function logout(){
        auth()->guard('admin')->logout();
        session()->flush();
        return redirect()->route('admin.login');
    }

}
