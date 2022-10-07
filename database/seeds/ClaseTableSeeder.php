<?php

use Illuminate\Database\Seeder;
use App\Models\Clase;

class ClaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clase::create([
            'clase' => ' <--- Seleccione una opción --->'
        ]);

        Clase::create([
            'clase' => 'Primera clase'
        ]);

        Clase::create([
            'clase' => 'Clase ejecutiva o business'
        ]);

        Clase::create([
            'clase' => 'Clase premium economy'
        ]);

        Clase::create([
            'clase' => 'Clase turista o económica'
        ]);
    }
}
