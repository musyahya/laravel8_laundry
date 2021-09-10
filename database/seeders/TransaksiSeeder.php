<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\DetailBarang;
use App\Models\Konsumen;
use App\Models\Layanan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $layanan = Layanan::find(2);

        $user = User::create([
            'name' => 'bunga',
            'email' => 'bunga@gmail.com',
            'password' => bcrypt('123123123'),
            'role_id' => 3
        ]);

        Konsumen::create([
            'user_id' => $user->id,
            'hp' => '051123456963',
            'alamat' => 'jl seroja no 9'
        ]);

        $barang = Barang::create([
            'user_id' => $user->id,
            'berat' => 2
        ]);

        DetailBarang::create([
            'barang_id' => $barang->id,
            'nama' => 'seragam'
        ]);

        DetailBarang::create([
            'barang_id' => $barang->id,
            'nama' => 'celana panjang hitam'
        ]);

        Transaksi::create([
            'layanan_id' => $layanan->id,
            'barang_id' => $barang->id,
            'status' => 0,
            'total_bayar' => $barang->berat * $layanan->harga,
            'tanggal_diterima' => now(),
            'tanggal_diambil' => now()->addHours($layanan->durasi)
        ]);
    }
}
