<?php

namespace App\Http\Controllers;

use App\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $payments = Pembayaran::orderBy('id', 'desc')->get();
        return view('admin.pembayaran', compact('payments'))->with('i');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
