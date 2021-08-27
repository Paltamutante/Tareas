@extends('plantilla')

@section('seccion')
<h1>Editar nota {{ $nota->id }}</h1>

@if (session('mensaje'))

<div class="alert alert-success">{{ session('mensaje') }}</div>

@endif

<form action="{{ route('notas.update', $nota->id) }}" method = "POST">
        @method('PUT')
        <!--el toquen csrf permite prevenir un frecuente agujero de seguridad de las aplicaciones web-->
        @csrf

        <!--Los botones de abajo cumplen la funcion de mostrar un mensaje de error en caso de que las casillas esten vacias-->
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

        <!--Esta es la casilla donde se inserta el nombre-->
        <input type="text" name="nombre"
        placeholder="Nombre"
         class="form-control mb-2"
        value="{{ $nota-> nombre }}">

        <!--Esta es la casilla donde se inserta la descripcion-->

        <input type="text" name="descripcion"
        placeholder="Descripcion" 
        class="form-control mb-2"
        value="{{ $nota-> descripcion }}">

        <!--Este boton es para editar los datos ingresados-->

        <button class="btn btn-warning btn-block" type="submit">Editar</button>

        
    </form>
@endsection