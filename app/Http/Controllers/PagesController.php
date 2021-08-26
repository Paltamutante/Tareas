<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
    public function inicio(){ 
        return view('welcome');
    }

   
    public function ejemplo(){
        $notas = App\Nota::all();
        return view('ejemplo', compact('notas'));
    }

    public function detalle($id){

        $nota = App\Nota::findOrFail($id);

        return view('notas.detalle', compact('nota'));
    }

    public function crear(Request $request){
        $request->validate([
            'nombre'=>'required','descripcion'=>'required']);

        $notaNueva = new App\Nota;
        $notaNueva->nombre = $request->nombre;
        $notaNueva->descripcion = $request->descripcion;

        $notaNueva->save();

        return back()->with('mensaje', 'Nota agregada');
    }

    public function editar($id){
        $nota = App\Nota::findOrfail($id);
        return view('notas.editar', compact('nota'));
    }

    public function update(Request $request, $id){
        
        $notaUpdate = App\Nota::findOrfail($id);
        $notaUpdate->nombre = $request->nombre;
        $notaUpdate->descripcion = $request->descripcion;

        $notaUpdate->save();
        
        return redirect()->action('PagesController@ejemplo')->with('mensaje', 'Nota actualizada');
    }

    public function eliminar($id){
        $notaEliminar = App\Nota::findOrfail($id);
        $notaEliminar->delete();
        return back()->with('mensaje', 'Nota Eliminada');
    }

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
