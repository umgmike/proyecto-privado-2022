<?php

use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::create([
            'empresa' => 'Airlines'
        ]);

        Empresa::create([
            'empresa' => 'Tucson AIR'
        ]);

        Empresa::create([
            'empresa' => 'Molina AIR'
        ]);
    }
}
