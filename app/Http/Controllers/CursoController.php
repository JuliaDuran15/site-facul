<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    
    public function index(){

        $cursos = Curso::get();
        

        return view('cursos.index',compact('cursos'));

    }

    public function show($id){
        
       if (!$curso = Curso::find($id))
            return redirect()->route('cursos.index');

        return view('cursos.show',compact('curso'));

    }

    public function create(){
 
         return view('cursos.create');
 
     }

    public function store(Request $request){
       
        Curso::create($request->all());

        return redirect()->route('cursos.index')->with('msg','curso cadastrado com sucesso!');;

     }

    public function edit($id){
       
        if (!$curso = Curso::find($id))
            return redirect()->route('cursos.index');

        return view('cursos.edit',compact('curso'));

     }

    public function update(Request $request, $id){
       
        if (!$curso = Curso::find($id))
            return redirect()->route('cursos.index');

            Curso::findOrFail($request->id)->update($request->all());

        return redirect()->route('cursos.index')->with('msg1','curso editado com sucesso!');;

     }

    public function destroy($id){
       
        if (!$curso = Curso::find($id))
            return redirect()->route('cursos.index');


        $curso->delete();

        return redirect()->route('cursos.index')->with('msg2','curso deletada com sucesso!');;

     }
    public function joinMateria($id){



       // $aluno->materias()->attach($id);

        $curso = Curso::findOrFail($id);


    
}
}
