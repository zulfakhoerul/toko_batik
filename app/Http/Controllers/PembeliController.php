<?php

namespace App\Http\Controllers;

use App\Pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    public function index(){
        //$pembeli = Pembeli::all();
        //return view('', compact('pembeli'))->with('i');
    }
    public function loginPage(){
        //return view('layout');
    }

    public function login(Request $request){

    }

    public function registerPage(){
        //return view('layout');
    }

    public function register(Request $request){
        
    }
}
