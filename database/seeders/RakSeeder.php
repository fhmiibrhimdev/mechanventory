<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RakSeeder extends Seeder
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
                'kode_rak'    =>  'C1.1',
                'nama_rak'    =>  'CB 1.1',
            ],
            [
                'kode_rak'    =>  'C1.2',
                'nama_rak'    =>  'CB 1.2',
            ],
            [
                'kode_rak'    =>  'C1.3',
                'nama_rak'    =>  'CB 1.3',
            ],
            [
                'kode_rak'    =>  'C1.4',
                'nama_rak'    =>  'CB 1.4',
            ],
            [
                'kode_rak'    =>  'C1.5',
                'nama_rak'    =>  'CB 1.5',
            ],
            [
                'kode_rak'    =>  'C1.6',
                'nama_rak'    =>  'CB 1.6',
            ],
            
        ];
        DB::table('rak')->insert($data);
    }
}
