<?php

use Illuminate\Database\Seeder;
use App\Models\Pais;

class PaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pais::create([
            'pais' => 'Belice'
        ]);

        Pais::create([
            'pais' => 'Costa Rica'
        ]);

        Pais::create([
            'pais' => 'El Salvador'
        ]);

        Pais::create([
            'pais' => 'Guatemala'
        ]);

        Pais::create([
            'pais' => 'Honduras'
        ]);

        Pais::create([
            'pais' => 'Nicaragua'
        ]);

        Pais::create([
            'pais' => 'Panamá'
        ]);

        Pais::create([
            'pais' => 'Estados Unidos'
        ]);
    }
}
