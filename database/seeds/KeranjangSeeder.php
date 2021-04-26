<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeranjangSeeder extends Seeder
{
    public function run()
    {
        DB::table('keranjang')->insert([
            'pembeli_id'    => 1,
            'produk_id'     => 1,
            'qty'           => 1,
            'status'        => 1,
            'jumlah_harga'  => 35000
        ]);
    }
}
