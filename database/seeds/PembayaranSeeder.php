<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembayaranSeeder extends Seeder
{
    public function run()
    {
        DB::table('pembayaran')->insert([
            'pemesanan_id'  => 1,
            'metode'        => 'transfer',
            'foto'          => 'nota.jpg',
            'tanggal'       => '2021-03-20',
            'status'        => 'diproses'
        ]);
    }
}
