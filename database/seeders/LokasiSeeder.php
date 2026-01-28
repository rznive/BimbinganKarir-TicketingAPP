<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lokasi;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lokasis = [
            ['nama_lokasi' => 'Burjo Evan 4'],
            ['nama_lokasi' => 'Burjo Evan 5'],
            ['nama_lokasi' => 'Burjo Evan 6'],
        ];

        foreach ($lokasis as $lokasi) {
            Lokasi::create($lokasi);
        }
    }
}
