@extends('Plantilla') 

@section('titulo', 'Notas') 

@section('contenido') 

<style>
    .importante {
        background-color: red; 
    }

    .urgente {
        background-color: yellow; 
    }

    .leve {
        background-color: green; 
    }

    .nomal {
        background-color: white;
    }

    .etiqueta-esquina {
        position: absolute;
        top: 0;
        right: 0;
        margin: 10px;
    }

</style>

@if (session('mensaje'))
<div class="alert alert-success d-flex align-items-center position-relative" role="alert">
    {{ session('mensaje') }}
    <button type="button" class="btn-close position-absolute top-1 end-0" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<br>
<div class="container" style="max-width: 800px;">

    @forelse($notas as $nota) 
    

    <div class="card mb-4 {{ $nota->etiqueta === 'Importante' ? 'importante' : ($nota->etiqueta === 'Urgente' ? 'urgente' : ($nota->etiqueta === 'Leve' ? 'leve' : ($nota->etiqueta === 'Normal' ? 'normal' : ''))) }}">
        <div class="card mb-4">
            <h4 class="card-header">{{ $nota->id }}. {{ $nota->titulo }} </h4>
            <div  class="etiqueta-esquina"> {{ $nota->etiqueta }}</div>
            <div class="card-body">

                <p class="card-title" style="font-weight: bold;">
                    {{ $nota->categoria }}
                </p>

                <p class="card-title">
                    {{ $nota->contenido }}
                </p>

                <p class="card-title">
                    {{ $nota->fecha }}
                </p>

                <br>

                <div>
                    <a href="{{ route('nota.show', ['id' => $nota->id]) }}" class="btn btn-success">Ver</a>
                    <a href="{{ route('nota.editar', ['id' => $nota->id]) }}" class="btn btn-warning">Editar</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{ $nota->id }}">
                        Eliminar
                    </button>

                    <form method="post" action="{{ route('nota.borrar', [$nota->id]) }}">
                        @method('DELETE')
                        @csrf

                        <div class="modal" id="modal-{{ $nota->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Eliminar este Dato</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Deseas eliminar esta nota!?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
    @empty 
    <p>No hay notas disponibles.</p>
    @endforelse 
</div>

<div class="container mt-3">
    {{ $notas->render('pagination::bootstrap-4') }}
</div>
@endsection
