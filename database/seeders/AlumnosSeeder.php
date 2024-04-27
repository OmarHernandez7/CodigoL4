<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumno;

class AlumnosSeeder extends Seeder
{
    
    public function run(): void
    {
        Alumno::factory()->count(20)->create();
    }
}
