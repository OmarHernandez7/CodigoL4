@extends('Plantilla')

@section('titulo', 'Detalle de Nota')

@section('contenido')

    <br>

    <div class="container" style="max-width: 800px;">

        <div class="card mb-4">

            <div class="card-body">

                <p class="card-title" style="font-weight: bold;">
                    Titulo de La Nota: {{ $nota->titulo }} 
                </p>

                <p class="card-title" style="font-weight: bold;">
                    Categoria: {{ $nota->categoria }}
                </p>

                <p class="card-title">
                   <b>Contenido:</b><br> {{ $nota->contenido }}
                </p>

                <p class="card-title">
                  <b>Fecha:</b> {{ $nota->fecha }}
                </p>

                <div>
                    <a href="{{ route('nota.index') }}" class="btn btn-success">Volver</a>
               
                </div>
            </div>

        </div>

    </div>

@endsection
