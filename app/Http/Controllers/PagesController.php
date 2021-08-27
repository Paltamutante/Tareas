<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
    public function inicio(){ //esta funcion retorna a la vista principal
        return view('welcome');
    }

   
    public function ejemplo(){//esta funcion retorna a la vista del crud
        $notas = App\Nota::all(); //la variable $nota se encarga de guardar todo lo que viene de la tabla notas
        return view('ejemplo', compact('notas'));
    }

    public function detalle($id){

        $nota = App\Nota::findOrFail($id);  //Aquí valida si id existe sino redirije al 404

        return view('notas.detalle', compact('nota'));//retorna a la vista notas.detalles si se cumple lo requerido
    }

    public function crear(Request $request){ // Aquí se agregan los datos de una nueva nota, tango el nombre como la descripcion a la base de datos

        $request->validate([
        'nombre'=>'required','descripcion'=>'required']);// Aquí se realizan las validaciones para evitar casillas vacias 

        $notaNueva = new App\Nota;
        $notaNueva->nombre = $request->nombre;
        $notaNueva->descripcion = $request->descripcion;

        $notaNueva->save();

        return back()->with('mensaje', 'Nota agregada');
    }

    public function editar($id){ //Retorna la vista de notas.editar si la variable $nota no falla
        $nota = App\Nota::findOrfail($id);
        return view('notas.editar', compact('nota'));
    }

    public function update(Request $request, $id){ //Reemplaza los datos viejos con los nuevos

        $request->validate([
        'nombre'=>'required','descripcion'=>'required']);//Valida si los campos estan vacios o no
        
        $notaUpdate = App\Nota::findOrfail($id);
        $notaUpdate->nombre = $request->nombre;
        $notaUpdate->descripcion = $request->descripcion;

        $notaUpdate->save();
        
        return redirect()->action('PagesController@ejemplo')->with('mensaje', 'Nota actualizada');
    }

    public function eliminar($id){// Esta funcion se encarga de eliminar los datos ingresados
        $notaEliminar = App\Nota::findOrfail($id);
        $notaEliminar->delete();
        return back()->with('mensaje', 'Nota Eliminada');
    }

    //las vistas de abajo no tienen datos insertados mas allá de una etiqueta 

    public function ejemplo2(){
        return view('ejemplo2');
    }

    public function ejemplo3(){
        return view('ejemplo3');
    }

    public function ejemplo4(){
        return view('ejemplo4');
    }

    public function ejemplo5(){
        return view('ejemplo5');
    }

    public function ejemplo6(){
        return view('ejemplo6');
    }

    public function ejemplo7(){
        return view('ejemplo7');
    }

   
    
}
