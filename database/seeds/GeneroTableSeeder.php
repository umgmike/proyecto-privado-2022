<?php

use Illuminate\Database\Seeder;
use App\Models\Genero;

class GeneroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genero::create([
            'genero' => 'Masculino'
        ]);

        Genero::create([
            'genero' => 'Femenino'
        ]);
    }
}
