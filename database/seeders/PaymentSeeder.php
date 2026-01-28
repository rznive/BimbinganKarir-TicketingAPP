<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $metode = [
            ['name' => 'Dana'],
            ['name' => 'Ovo'],
            ['name' => 'Gopay'],
            ['name' => 'Shoopepay'],
        ];

        foreach ($metode as $metodes) {
            Payment::create($metodes);
        }
    }
}
