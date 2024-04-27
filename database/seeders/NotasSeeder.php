<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Nota;
class NotasSeeder extends Seeder
{
  
    public function run(): void
    {
        Nota::factory()->count(0)->create();
        
    }
}
