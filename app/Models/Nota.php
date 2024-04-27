<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    // ESTE VA EN EL MODEL DE NOTAS 

    // public function usuario(){
    //    return $this-> belongsTo(Usuario::class); 
    //}

    // ESTE VA EN EL MODELO DE USUARIO

    //public function notas(){
    //    return $this->hasMany(Nota::class);
    //}

}
