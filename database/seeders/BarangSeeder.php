<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barangs = [
            [
                'nama' => 'Laptop',
                'harga' => 10000000,
                'stok' => 10,
                'deskripsi' => 'Laptop gaming',
                'gambar' => 'produk.jpg',
                'kategori' => 'Elektronik',
                'alamat' => 'Surabaya',
            ],
        ];

        foreach ($barangs as $barang) {
            \App\Models\Barang::create($barang);
        }
    }
}
