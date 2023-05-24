<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'kode_kategori'    =>  'INVTRY',
                'nama_kategori'    =>  'INVENTORY',
            ],
            [
                'kode_kategori'    =>  'ASSETS',
                'nama_kategori'    =>  'ASSETS',
            ],
        ];
        DB::table('kategori')->insert($data);
    }
}
