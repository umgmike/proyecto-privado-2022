<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(GeneroTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsuarioTableSeeder::class);
        $this->call(ClaseTableSeeder::class);
        $this->call(PasajeroTableSeeder::class);
        $this->call(PaisTableSeeder::class);
        $this->call(DepartamentosTableSeeder::class);
        $this->call(EmpresaTableSeeder::class);
        $this->call(CategoriaTableSeeder::class);

    }
}
