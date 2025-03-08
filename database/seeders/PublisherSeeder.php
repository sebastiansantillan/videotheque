<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Publisher::firstOrCreate(['name' => 'Criterion Collection']);
        Publisher::firstOrCreate(['name' => 'Arrow Video']);
        Publisher::firstOrCreate(['name' => 'Shout! Factory']);
        Publisher::firstOrCreate(['name' => 'Kino Lorber']);
        Publisher::firstOrCreate(['name' => 'Vinegar Syndrome']);        
    }
}
