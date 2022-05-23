@extends('layouts.principal')
@section('contenido')

    <form class="col s8" method="POST" action="{{ route('productos.store') }}">
      @csrf
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
        </div>
      </div>
      <div class="row">
        <div class="input-field col s8">
          <input id="precio" 
          type="number" 
          class="validate"
          name="precio">
          <label for="precio">Precio</label>
        </div>
      </div>
      <div class="row">
        <div class="col s8 input-field">
          <select name="marca" id="marca">
            <option> 
              Elegia su marca 
            </option>
            @foreach($marcas as $marca)
            <option value="{{ $marca->id }}"> 
              {{$marca->nombre}}
            </option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col s8 input-field">
          <select name="categoria" id="categoria">
            @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}">
                {{$categoria->nombre}}
            </option>
            @endforeach
          </select>
        </div>
      </div>  
      <div class="row">
         <div class="file-field input-field">
           <div class="btn">
           <span>Ingrese Imagen...</span>
             <input type="file">
           </div>
          <div class="file-path-wrapper">
           <input class="file-path validate" type="text">
         </div>
       </div>
  
      <div class="row">
      <button class="btn waves-effect waves-light" type="submit">guardar </button>
      </div>
      </div>
    </form>

  @endsection

        