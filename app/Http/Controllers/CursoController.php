<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\User;

class CursoController extends Controller
{
    
    public function index(){

        $cursos = Curso::get();
        

        return view('cursos.index',compact('cursos'));

    }

    public function show($id){
        
       if (!$curso = Curso::find($id))
            return redirect()->route('cursos.index');

        //$profCurso = User::where('id', $curso->user_id)->first()->Toarray();

        return view('cursos.show',['curso'=>$curso]);

    }

    public function create(){
 
         return view('cursos.create');
 
     }

    public function store(Request $request){

        if($request->max < $request->min){
	        return back()->with('erro','ERRO: mínimo de alunos maior do que máximo de alunos');}
	

	    if(is_numeric($request->min) != 1 || is_numeric($request->max) != 1 ){
	        return back()->with('erro','ERRO: digite um número válido para o número de alunos');

       
        $curso = new Curso;
        $curso->name = $request->name;
        $curso->short_despriction = $request->short_despriction;
        $curso->description = $request->description;
        $curso->min = $request->min;
        $curso->max = $request->max;
        $curso->professor = $request->professor;


        $curso->save();

        return redirect()->route('cursos.index')->with('msg','Curso cadastrado com sucesso!');

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

        return redirect()->route('cursos.index')->with('msg','Curso editado com sucesso!');

     }

    public function destroy($id){
       
        if (!$curso = Curso::find($id))
            return redirect()->route('cursos.index');


        $curso->delete();

        return redirect()->route('cursos.index')->with('msg','Curso deletado com sucesso!');

     }
    public function joinCurso($id){

        $user = auth()->user();

        $user->cursosAsAluno()->attach($id);

        $curso = Curso::findOrFail($id);

        return redirect()->route('cursos.index')->with('msg','Matricula feita com sucesso!');
    
}

public function joinCursoP($id){

    $user = auth()->user();

    $user->cursos()->attach($id);

    $curso = Curso::findOrFail($id);

    return redirect()->route('cursos.index')->with('msg','Matricula feita com sucesso!');

}

public function attachprof(Request $request){
    
    $curso = Curso::findOrFail($request->cursoid);
    $user = User::findOrFail($request->userid);
    $curso->user_id = $user->id;
    $curso->save();
    return back()->with("status","Professor " .$user->name. ' relacionado com ' .$curso->name );
    
}

}
