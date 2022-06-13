<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "aqui va ir el catalogo de productos ";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //selecionar todas las marcas 
        $marcas= Marca::all();
        //seleciona todas las categorias 
        $categorias= Categoria::all();
        //mostrar la vista del producto 
        //enviandoles los datos de marcas y categorias 
        return view('Productos.create')
        ->with('marcas', $marcas)
        ->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {

        //validaciones 
        //1. establecer reglas de validacion
        $reglas=[
            "nombre" => 'required|alpha|unique:productos,nombre',
            'desc'   => 'required|min:5|max:20',
            'precio' => 'required|numeric',
            'imagen' => 'required|image',
            'categoria' => 'required',
            'marca'  =>'required'

        ];

        //2. crear el objecto validador 
        $v = Validator::make($r->all() , $reglas );

        //3. validar
        if($v->fails()){
                //si la validacion fallo
                //redirigirme a la vista de create (ruta: productos/create)

                return redirect('productos/create')
                         ->withErrors($v);
        }else{
                //validacion exitosa
                //examinar el archivo cargado 
        $archivo=$r->imagen;
        //obtener rl nombre original del archivo 
        $nombre_archivo =$archivo->getClientOriginalName();
        //establecer la ubicacion de guardado del archivo 
        $ruta = public_path()."/img";
        //mover el archivo de la imagen a la ubicacion y nombre deseados 
        $archivo->move($ruta , $nombre_archivo );
        
        
        //Crear nuevo producto;
        $p = new Producto();
        //asignar atributos al producto
        $p->nombre = $r-> nombre;
        $p->descrpcion = $r-> desc;
        $p->precio = $r-> precio;
        $p->marca_id = $r-> marca;
        $p->categoria_id = $r-> categoria;
        $p->imagen = $nombre_archivo;
        //grabar producto
        $p->save();
        //redirigir a productos/create
        //con un mensaje de exito
        return redirect('productos/create')
            ->with('mensajito' , '  Producto registrado exitosamente');


     }
    }

        

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo "aqui va el detalle del producto con id: $producto ";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        echo "aqui va el formulario para actualizar producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
