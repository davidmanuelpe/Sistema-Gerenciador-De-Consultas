<?php

namespace Database\Seeders;

use App\Models\Recepcionista;
use Illuminate\Database\Seeder;

class RecepcionistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recepcionista::factory()->count(5)->create();
    }
}
