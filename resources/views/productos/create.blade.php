@extends('layouts.principal')
@section('contenido')

    <form class="col s8" method="POST" 
    action="{{ route('productos.store') }}" 
    enctype="multipart/form-data">

      @csrf
      @if( session('mensajito'))
      <div class="row">
        <strong>
          {{ session('mensajito')}}
        </strong>
      </div>

      @endif

        <div class="row">
            <div class="col s8"> 
                <h1 class=" purple-text  darken-1">Nuevo producto</h1>
            </div>
        </div>
      <div class="row">
        <div class="input-field col s8">
          <input placeholder="Nombre del producto" 
          id="nombre" 
          type="text" 
          class="validate"
          name="nombre">
          <label for="nombre">Nombre del producto</label>
          <strong class=" brown lighten-4">{{ $errors->first('nombre') }}</strong>
        </div>
        
      </div>
      <div class="row">
        <div class="input-field col s8">
          <input 
          id="desc" 
          type="text" 
          class="validate"
          name="desc">
          <label for="desc">descripción</label>
          <strong  class=" brown lighten-4">{{ $errors->first('desc') }}</strong>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s8">
          <input id="precio" 
          type="number" 
          class="validate"
          name="precio">
          <label for="precio">Precio</label>
          <strong  class=" brown lighten-4">{{ $errors->first('precio') }}</strong>
        </div>
      </div>
      <div class="row">
        <div class="col s8 input-field">
          <select name="marca" id="marca">
            <option value=""> Elegia su marca </option>
            @foreach($marcas as $marca)
            <option value="{{ $marca->id }}"> 
              {{$marca->nombre}}
            </option>
            @endforeach
          </select>
          <label>Elija marca</label>
          <strong  class=" brown lighten-4">{{ $errors->first('marca') }}</strong>
        </div>
      </div>
      <div class="row">
        <div class="col s8 input-field">
          <select name="categoria" id="categoria">
          <option value=""> Elegia su categoria </option>
            @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}">
                {{$categoria->nombre}}
            </option>
            @endforeach
          </select>
          <label>Elija categorias</label>
          <strong  class=" brown lighten-4">{{ $errors->first('categoria') }}</strong>
        </div>
      </div>  
      <div class="fila">
         <div class="file-field input-field">
           <div class="btn">
           <span>Ingrese Imagen...</span>
             <input type="file" name="imagen"  multiple>

           </div>
          <div class="file-path-wrapper">
           <input class="file-path validate" type="text"
           placeholder="Upload one or more files">
         </div>
       </div>
       <strong  class=" brown lighten-4">{{ $errors->first('imagen') }}</strong>
  
      <div class="row">
      <button class="btn waves-effect waves-light" type="submit">guardar </button>
      </div>
      </div>
    </form>

  @endsection

        