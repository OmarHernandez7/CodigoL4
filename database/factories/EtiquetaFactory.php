<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class EtiquetaFactory extends Factory
{
 
    public function definition(): array
    {
        return [
            'nombre'=>fake()->randomElement(['Importante', 'Urgente', 'Leve', 'Normal']),
        ];
    }
}
