<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ProdukSeeder::class,
            PembeliSeeder::class, 
            KeranjangSeeder::class
        ]);
    }
}
