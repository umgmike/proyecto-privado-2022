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
    }
}
