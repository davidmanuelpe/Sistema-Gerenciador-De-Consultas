<?php

namespace Database\Factories;

use App\Models\Recepcionista;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RecepcionistaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recepcionista::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipo' => 'recepcionista'
        ];
    }
}
