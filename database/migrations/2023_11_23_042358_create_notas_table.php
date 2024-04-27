<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id(); 
            $table->string('titulo');
            $table->string('contenido');
            $table->string('categoria');
            $table->enum('etiqueta',['Importante', 'Urgente', 'Leve', 'Normal']);          
            $table->string('fecha');
            
            $table->timestamps();
           
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
