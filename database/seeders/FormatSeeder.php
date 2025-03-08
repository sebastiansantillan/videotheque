<?php

namespace Database\Seeders;

use App\Models\Format;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Format::firstOrCreate(['id' => 'vhs', 'name' => 'VHS']);
        Format::firstOrCreate(['id' => 'dvd', 'name' => 'DVD']);
        Format::firstOrCreate(['id' => 'bluray', 'name' => 'Blu-ray']);
        Format::firstOrCreate(['id' => '4k', 'name' => '4K Ultra HD Blu-Ray']);
        Format::firstOrCreate(['id' => 'digitalcode', 'name' => 'Digital Code']);
    }
}
