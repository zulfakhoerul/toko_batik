<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        DB::table('produk')->insert([
            'nama'      => 'Batik Lasem',
            'deskripsi' => 'batik populer',
            'stok'      => 30,
            'harga'     => 35000,
            'tipe'      => 'cap',
            'foto'      => 'batik lasem.jpg'
        ]);
    }
}
