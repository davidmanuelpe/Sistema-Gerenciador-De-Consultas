<?php

namespace Database\Seeders;

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
        $this->call(RecepcionistaSeeder::class);
        $this->call(PacienteSeeder::class);
        $this->call(FuncionarioSeeder::class);
        $this->call(PessoaSeeder::class);

    }
}
