<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Para crear el libro debemos hacar el llamado a nuestro modelo
use App\Models\Libro;

class LibroController extends Controller
{
    public function index(){

    }

    //Funcionalidad de Create
    public function create(){
        return view('libro.create');
    }

    //Metodo para almacenar datos del formulario
    //Mediante el objeto Request vamos a recibir los datos provenientes del formulario a traves de la variable $request
    public function store(Request $request){
        //Validamos los datos recibidos, si no se cumple no se almacenara la información
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
        ]);

  
    // Ya podemos crear el objeto Libro vacio
    $libro = new Libro();
    // Lo llenaremos con los datos recibidos del formulario asi que seteamos los valores para:
    $libro->nombre = $request->nombre;
    $libro->descripcion = $request->descripcion;
    $libro->autor = $request->autor;

    //Almacenar los valores en la BD
    $libro->save();
    return redirect()->back()->with('success','Registro del libro creado con exito');
    }

    public function read(){
     //Antes de retornar la vista comprobamos funcionamiento
     $libros = Libro::all();

     //dd($libros);

     return view('libro.read',compact('libros'));
    }

    public function update(Request $request, Libro $libro)
    {
        // Validación de valores
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
        ]);

        // Actualización del libro
        $libro->update($request->all());

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'Registro del libro actualizado con éxito');
    }

    public function delete(){
        //Aquí deberíamos mostrar un formulario para confirmar la eliminación de un libro
        $libro = Libro::all();

        //Por ahora retornamos un mensaje de confirmación
        return view('libro.delete', compact('libro'));
    }

    public function destroy(Request $request){
        $Id = $request->input('IdLibro');
        /*Como ya tenemos el Id podemos simpkenete decir qure
        Mediante eloquent vamos a buscar el ibro mediante el Id especificado
        */
        $libro = Libro::find($Id);
        //Y luego eliminamos el libro
        // Si encontramos nuestro libro, enonces lo podemos borrar
        if($libro){
            $libro->delete();
            //Redirigimos con mensaje de éxito
            return redirect()->back()->with('success', 'Registro del libro eliminado con éxito');
        }else{
            return redirect()->back()->with('error', 'Registro del libro no encontrado');
        }



    
    }



}