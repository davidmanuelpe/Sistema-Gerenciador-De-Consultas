<?php

namespace Database\Seeders;

use App\Models\Agendamentos;
use Illuminate\Database\Seeder;

class AgendamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agendamentos::factory()->count(5)->create();
    }
}
