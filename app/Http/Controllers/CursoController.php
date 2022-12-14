<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\User;
use App\Models\Professor;

class CursoController extends Controller
{
    
    public function index(){

        $cursos = Curso::get();
        $professor = Professor::all();
        

        return view('cursos.index',compact('cursos'));

    }

    public function show($id){
        
       if (!$curso = Curso::find($id))
            return redirect()->route('cursos.index');

        //$profCurso = User::where('id', $curso->user_id)->first()->Toarray();
        $professor = Professor::all();
        

        return view('cursos.show',['curso'=>$curso,'professor'=>$professor]);

    }

    public function create(){
 
         return view('cursos.create');
 
     }

    public function store(Request $request){

        if($request->max < $request->min){
	        return back()->with('erro','ERRO: mínimo de alunos maior do que máximo de alunos');}


        if (is_numeric($request->min) != 1 || is_numeric($request->max) != 1) {
            return back()->with('erro', 'ERRO: digite um número válido para o número de alunos');
        }

       
        $curso = new Curso;
        $curso->name = $request->name;
        $curso->short_despriction = $request->short_despriction;
        $curso->description = $request->description;
        $curso->min = $request->min;
        $curso->max = $request->max;
        
        
        if($curso->min == 0)
        {
            $curso->status = 'Matriculas Abertas!';
        }
        else
        { 
            $curso->status = 'Minimo de matriculas nao atingido';
        }

        $curso->save();

        return redirect()->route('cursos.index')->with('msg','Curso cadastrado com sucesso!');

     }

    public function edit($id){
       
        if (!$curso = Curso::find($id)){
            return redirect()->route('cursos.index');

        return view('cursos.edit',compact('curso'));
        }
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

        $contador = 0;

        foreach($curso->users as $alunosdocurso)
            {
                $contador = $contador + 1;
            }
        
        if($contador < $curso->min)
        {
            $curso->status = 'Minimo de alunos nao atingidos';
        }

        elseif($contador == $curso->max)
        {
            $curso->status = 'Maximo de alunos nao atingidos';
        }

        else
        { 
            $curso->status = 'Matriculas abertas';
        }

        $curso->save();

        return redirect()->route('cursos.index')->with('msg','Matricula feita com sucesso!');
    
}

public function joinCursoP($id){

    $user = auth()->user();

    $user->cursos()->attach($id);

    $curso = Curso::findOrFail($id);

    return redirect()->route('cursos.index')->with('msg','Matricula feita com sucesso!');

}
public function showMe(){
    
    $user = auth()->user();

        $meuscursos = $user->cursosAsAluno;

    return view('cursos.showMe',['meuscursos'=>$meuscursos]);

}

public function leaveCurso($id){
    
    $user = auth()->user();

        $user->cursosAsAluno()->detach($id);

        $curso = Curso::findOrFail($id);

        $contador = 0;
        
        foreach($curso->users as $alunosdocurso)
            {
                $contador = $contador + 1;
            }
        
        if($contador < $curso->min)
        {
            $curso->status = 'Minimo de alunos nao atingidos';
        }

        elseif($contador == $curso->max)
        {
            $curso->status = 'Maximo de alunos nao atingidos';
        }

        else
        { 
            $curso->status = 'Matriculas abertas';
        }

        $curso->save();

        return back()->with('msg','Desmatricula feita com sucesso!');
}
}
