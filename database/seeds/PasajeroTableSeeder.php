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

        Pasajero::create([
            'nombre' => 'Fernanda',
            'apellido' => 'Morales Benitez',
            'telefono' => '5692-3055',
            'dpi' => '4563 82391 0701',
            'edad' => 45,
            'id_genero' => 2
        ]);

        Pasajero::create([
            'nombre' => 'Luis',
            'apellido' => 'Fernández Ramírez',
            'telefono' => '7856-6055',
            'dpi' => '1655 28596 0701',
            'edad' => 40,
            'id_genero' => 1
        ]);
    }
}
