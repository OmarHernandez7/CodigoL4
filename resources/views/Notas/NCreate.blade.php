@extends('Plantilla')

@section('titulo', 'Crear Nota')

@section('contenido')




@if (session('mensaje'))
<div class="alert alert-success d-flex align-items-center position-relative" role="alert">
    {{ session('mensaje') }}
    <button type="button" class="btn-close position-absolute top-1 end-0" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    <br><br>
    <form method="POST" action="{{ route('nota.store') }}" class="needs-validation">
        @csrf 
        
        <div class="container" style="max-width: 600px;">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>CREAR NOTA</h4>
                    <div>
                        <b>Categoria:</b>
                        <select id="categoria" name="categoria" required>
                            @forelse($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @empty
                                <option>No hay categorías</option>
                            @endforelse
                        </select>
                   </div>

                   <div>
                        <b>Etiqueta:</b>
                        <select id="etiqueta" name="etiqueta" required>
                                <option value="Importante">Importante</option>
                                <option value="Urgente">Urgente</option>
                                <option value="Leve">Leve</option>
                                <option value="Normal">Normal</option>
                        </select>
                   </div>

                </div>

                <div class="card">
                    <div class="card-body">

                        <div class="card-title" style="font-weight: bold;">TITULO:
                            <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo"
                                id="titulo" placeholder="Ingrese El Titulo" value="{{ old('titulo') }}" required>

                            @error('titulo')
                                <div class ="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div><br>

                        <div class="card-title" style="font-weight: bold;">CONTENIDO:
                            <textarea class="form-control @error('titulo') is-invalid @enderror" placeholder="Ingrese el Contenido" id="contenido"
                                name="contenido" rows="4" value="{{ old('contenido') }}" required></textarea>

                            @error('contenido')
                                <div class ="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div><br>

                        <div class="card-title" style="font-weight: bold;">FECHA:
                            <input type="text" class="form-control @error('fecha') is-invalid @enderror" name="fecha"
                                id="fecha" placeholder="Ingrese la Fecha" value="{{ old('fecha') }}" required>

                            @error('fecha')
                                <div class ="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div><br>

                        <div>
                            <input type="submit" class="btn btn-primary" value="Crear">
                            <a href="{{ route('nota.index') }}" class="btn btn-success">Volver</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
