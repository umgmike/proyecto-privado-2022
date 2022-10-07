<?php

use Illuminate\Database\Seeder;
use App\Models\Pasajero;

class PasajeroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pasajero::create([
            'nombre' => 'Esteban',
            'apellido' => 'Cosiguá Meletz',
            'telefono' => '5692-6055',
            'dpi' => '1655 82391 0701',
            'edad' => 40,
            'id_genero' => 1
        ]);
    }
}
