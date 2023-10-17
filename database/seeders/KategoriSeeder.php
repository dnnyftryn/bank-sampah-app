<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table('kategoris')->insert([
            [
               'jenis_sampah'=>'Kertas',
               'harga'=>'1000',
               'image' => '/image/kertas.jpg',
               'created_at' => now()
            ],
            [
                'jenis_sampah'=>'Logam',
                'harga'=>'1500',
                'image' => '/image/logam.jpg',
                'created_at' => now()
            ],
            [
                'jenis_sampah'=>'Plastik',
                'harga'=>'2000',
                'image' => '/image/plastik.jpg',
                'created_at' => now()
            ],
            [
                'jenis_sampah'=>'Organik',
                'harga'=>'1500',
                'image' => '/image/organik.jpeg',
                'created_at' => now()
            ],
            [
                'jenis_sampah'=>'Elektronik',
                'harga'=>'3000',
                'image' => '/image/elektronik.jpeg',
                'created_at' => now()
            ],
            [
                'jenis_sampah'=>'Tekstil',
                'harga'=>'2500',
                'image' => '/image/tekstil.jpg',
                'created_at' => now()
            ],
            [
                'jenis_sampah'=>'Botol Kaca',
                'harga'=>'2000',
                'image' => '/image/botolkaca.jpeg',
                'created_at' => now()
            ],
            [
                'jenis_sampah'=>'Botol Plastik',
                'harga'=>'3000',
                'image' => '/image/botolplastik.png',
                'created_at' => now()
            ]
        ]);
    }
}
