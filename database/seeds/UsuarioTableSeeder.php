<?php

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Usuario::create([
            'nombre' => 'Esteban', 
            'apellido' => 'Meletz Cosiguá', 
            'telefono' => '5692-6055', 
            'usuario' => 'Esteban', 
            'password' => bcrypt('12345'),
            'id_genero' => 1, 
            'id_rol' => 1
        ]);
    }
}
