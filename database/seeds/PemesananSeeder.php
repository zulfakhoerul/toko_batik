<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemesananSeeder extends Seeder
{
    public function run()
    {
        DB::table('pemesanan')->insert([
            'keranjang_id' => 1,
            'tanggal'      => "2021-03-20",
            'status'       => 'Sedang diproses',
            'total_harga'  => '35000'
        ]);
    }
}
