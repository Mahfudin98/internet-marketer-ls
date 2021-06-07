<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anggota')->insert(
            [
                'name' => 'Hanifa', //Giari
                'slug' => 'hanifa',
                'district_id' => 5229,
                'alamat' => 'Kec. Purwakarta - kab. Purwakarta - Jawa Barat',
                'phone' => 'https://orderan.lsstore.id/cs/agen-hanifa',
                'type' => 'Agen'
            ],
            [
                'name' => 'Reni', //Agus
                'slug' => 'reni',
                'district_id' => 1064,
                'alamat' => 'Bogor Tegah Kota - Bogor - Jawa Barat',
                'phone' => '',
                'type' => 'Agen'
            ],
            [
                'name' => 'Muji', //Adi
                'slug' => 'muji',
                'district_id' => 2388,
                'alamat' => 'Karawang Barat - Karawang - Jawa Barat',
                'phone' => '',
                'type' => 'Agen'
            ],
            [
                'name' => 'Vellin gladies', //Bayu
                'slug' => 'vellin-gladies',
                'district_id' => 2388,
                'alamat' => 'Rembang - Purbalingga - Jawa Tengah',
                'phone' => '',
                'type' => 'Agen'
            ]
        );
    }
}
