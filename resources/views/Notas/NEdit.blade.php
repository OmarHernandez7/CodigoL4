@extends('Plantilla')

@section('titulo', 'Editar Nota')

@section('contenido')

    <br><br>
    <form method="POST" action="{{ route('nota.update', [$notas->id]) }}" class0="needs-validation">
        @method('PUT') 
        @csrf 

        <div class="container" style="max-width: 600px;">
            <div class="card">

            <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>EDITAR NOTA</h4>
                    <div>
                        <b>Categoria:</b>
                        <select id="categoria" name="categoria" required>
                            @forelse($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @empty
                                <option >No hay categorías</option>
                            @endforelse
                        </select>
                   </div>

                   <div>
                        <b>Etiqueta:</b>
                        <select id="etiqueta" name="etiqueta" required>
                                <option value="Importante">Normal</option>
                                <option value="Urgente">Leve</option>
                                <option value="Leve">Urgente</option>
                                <option value="Normal">Importante</option>
                        </select>
                   </div>
                   
                </div>

                <div class="card">
                    <div class="card-body">

                        <div class="card-title" style="font-weight: bold;">TITULO:
                            <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo"
                                id="titulo" placeholder="Ingrese el nuevo Titulo"
                                value="{{ old('titulo') ?? $notas->titulo }}" required>

                            @error('titulo')
                                <div class ="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div><br>


                        <div class="card-title" style="font-weight: bold;">CONTENIDO:
                            <textarea class="form-control @error('titulo') is-invalid @enderror" placeholder="Ingrese el nuevo Contenido"
                                id="contenido" name="contenido" rows="4" value="{{ old('contenido') ?? $notas->contenido }}" required></textarea>

                            @error('contenido')
                                <div class ="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div><br>


                        <div class="card-title" style="font-weight: bold;">FECHA:
                            <input type="text" class="form-control @error('fecha') is-invalid @enderror" name="fecha"
                                id="fecha" placeholder="Ingrese la nueva Fecha"
                                value="{{ old('fecha') ?? $notas->fecha }}" required>

                            @error('fecha')
                                <div class ="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div><br>


                        <div>
                            <input type="submit" class="btn btn-primary" value="Editar">
                            <a href="{{ route('nota.index') }}" class="btn btn-success">Volver</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
