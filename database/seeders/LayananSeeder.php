<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Layanan::create([
            'nama' => 'reguler',
            'durasi' => 48,
            'harga' => 8000
        ]);

        Layanan::create([
            'nama' => 'kilat',
            'durasi' => 24,
            'harga' => 10000
        ]);

        Layanan::create([
            'nama' => 'express',
            'durasi' => 12,
            'harga' => 15000
        ]);

        Layanan::create([
            'nama' => 'exclusive',
            'durasi' => 6,
            'harga' => 30000
        ]);
    }
}
