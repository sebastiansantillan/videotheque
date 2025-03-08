<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguagesSeeder extends Seeder
{
    public function run()
    {
        $languages = [
            ['id' => 'eng', 'name' => 'English', 'nombre' => 'Inglés'],
            ['id' => 'spa', 'name' => 'Spanish', 'nombre' => 'Español'],
            ['id' => 'fra', 'name' => 'French', 'nombre' => 'Francés'],
            ['id' => 'deu', 'name' => 'German', 'nombre' => 'Alemán'],
            ['id' => 'zho', 'name' => 'Mandarin Chinese', 'nombre' => 'Chino Mandarín'],
            ['id' => 'ara', 'name' => 'Arabic', 'nombre' => 'Árabe'],
            ['id' => 'rus', 'name' => 'Russian', 'nombre' => 'Ruso'],
            ['id' => 'por', 'name' => 'Portuguese', 'nombre' => 'Portugués'],
            ['id' => 'hin', 'name' => 'Hindi', 'nombre' => 'Hindi'],
            ['id' => 'ben', 'name' => 'Bengali', 'nombre' => 'Bengalí'],
            ['id' => 'jpn', 'name' => 'Japanese', 'nombre' => 'Japonés'],
            ['id' => 'pan', 'name' => 'Punjabi', 'nombre' => 'Punyabí'],
            ['id' => 'mar', 'name' => 'Marathi', 'nombre' => 'Marathi'],
            ['id' => 'tel', 'name' => 'Telugu', 'nombre' => 'Telugu'],
            ['id' => 'tur', 'name' => 'Turkish', 'nombre' => 'Turco'],
            ['id' => 'kor', 'name' => 'Korean', 'nombre' => 'Coreano'],
            ['id' => 'fra', 'name' => 'Canadian French', 'nombre' => 'Francés canadiense'],
            ['id' => 'vie', 'name' => 'Vietnamese', 'nombre' => 'Vietnamita'],
            ['id' => 'ita', 'name' => 'Italian', 'nombre' => 'Italiano'],
            ['id' => 'tha', 'name' => 'Thai', 'nombre' => 'Tailandés'],
        ];

        foreach ($languages as $language) {
            Language::firstOrCreate(
                ['id' => $language['id']],  // Condición de búsqueda
                ['name' => $language['name'], 'nombre' => $language['nombre']]  // Atributos a crear si no existen
            );
        }
    }
}
