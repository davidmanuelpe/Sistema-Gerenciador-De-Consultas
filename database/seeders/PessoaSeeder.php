<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory;
use App\Models\Pessoa;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    
    public function run()
    {
       Pessoa::factory()->count(5)->create();
    }
}
