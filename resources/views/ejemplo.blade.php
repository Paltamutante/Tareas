@extends('plantilla')
@section('seccion')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container my-4">
         <h1 class="display-4">Tareas</h1>
    </div>

    @if (session('mensaje'))
        <div class="alert alert-success">
          {{ session('mensaje') }}
        </div>
    @endif

    <form action="{{ route('notas.crear') }}" method = "POST">
        @csrf

        @error('nombre')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        El nombre es requerido
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @enderror @if ($errors->has('descripcion'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          La descripción es requerida
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif

        <input type="text" name="nombre"placeholder="Nombre" class="form-control mb-2"
        value="{{ old('nombre') }}">
        <input type="text" name="descripcion"placeholder="Descripcion" class="form-control mb-2"
        value="{{ old('descripcion') }}">
        <button class="btn btn-primary btn-block" type="submit">Agregar</button>
    </form>
    
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#id</th> 
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
        @foreach($notas as $item)  
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>
          <a href="{{ route('notas.detalle', $item) }}">
                {{$item->nombre}}
          </a>
      </td>
      <td>
          {{$item->descripcion}}
      </td>
      <td>
        <a href="{{ route('notas.editar', $item) }}" class="btn btn-warning 
        btn-sm">Editar</a>

        <form action="{{ route('notas.eliminar', $item) }}" method="POST"
        class="d-inline">
            @method('DELETE') 
            @csrf
            <button class="btn btn-danger btn-sm" type="submit">
                Eliminar
            </button>
        </form>

      </td>
    </tr>
        @endforeach
  </tbody>
</table>

</body>
</html>
@endsection
