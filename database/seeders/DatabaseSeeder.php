<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumno; // LA DIRECCION DE MODELO SE PONE SIEMPRE PORQUE SI NO, NO DA
use App\Models\Nota; // LA DIRECCION DE MODELO SE PONE SIEMPRE PORQUE SI NO, NO DA

class DatabaseSeeder extends Seeder
{
   
    public function run(): void
    {
       
        $this->call(NotasSeeder::class); //SE PONE EL NOMBRE DEL SEEDER 

    }
}
