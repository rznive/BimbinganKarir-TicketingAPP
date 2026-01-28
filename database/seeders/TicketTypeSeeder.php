<?php

namespace Database\Seeders;

use App\Models\TiketType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = [
            ['name' => 'VIP'],
            ['name' => 'Reguler'],
            ['name' => 'Premium'],
        ];

        foreach ($type as $types) {
            TiketType::create($types);
        }
    }
}
