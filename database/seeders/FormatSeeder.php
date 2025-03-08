<?php

namespace Database\Seeders;

use App\Models\Format;
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
        Format::firstOrCreate(['id' => 'vhs', 'nombre' => 'VHS']);
        Format::firstOrCreate(['id' => 'dvd', 'nombre' => 'DVD']);
        Format::firstOrCreate(['id' => 'bluray', 'nombre' => 'Blu-ray']);
        Format::firstOrCreate(['id' => '4k', 'nombre' => '4K Ultra HD Blu-Ray']);
        Format::firstOrCreate(['id' => 'digitalcode', 'nombre' => 'Digital Code']);
    }
}
