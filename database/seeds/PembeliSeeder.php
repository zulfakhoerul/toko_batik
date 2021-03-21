<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembeliSeeder extends Seeder
{
    public function run()
    {
        DB::table('pembeli')->insert([
            'email'     => 'zulfa',
            'password'  => 'zulfa',
            'nama'      => 'zulfa',
            'no_hp'     => '081245456',
            'alamat'    => 'plumbon, indramayu'
        ]);
    }
}
