<?php

namespace Database\Seeders;

use App\Models\Formato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Formato::firstOrCreate(['id' => 'vhs', 'nombre' => 'VHS']);
        Formato::firstOrCreate(['id' => 'dvd', 'nombre' => 'DVD']);
        Formato::firstOrCreate(['id' => 'bluray', 'nombre' => 'Blu-ray']);
        Formato::firstOrCreate(['id' => '4k', 'nombre' => '4K Ultra HD Blu-Ray']);
    }
}
