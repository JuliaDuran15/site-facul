<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Professor;
use App\Models\Curso;
use App\Models\User;
use App\Models\Aluno;

class ProfessorController extends Controller
{public function index(){

    $professors = Professor::get();
    
    return view('professors.index',compact('professors'));

}

public function show($id){
    
    $professor = Professor::where('user_id', '=', $id)->firstorFail(); 

    return view('professors.show',compact('professor'));

}

public function create(){

     return view('professors.create');

 }

public function store(Request $request){
   
    $professor = new Professor;
        $professor->name = $request->name;
        $professor->Ra = $request->Ra;
        $professor->Cpf = $request->Cpf;
        $professor->Cidade = $request->Cidade;
        $professor->Cep = $request->Cep;
        $professor->Rua = $request->Rua;
        $professor->numero = $request->numero;
        $professor->Estado = $request->Estado;
        
        $professor->save();

    return redirect()->route('professors.index')->with('msg','Professor cadastrado com sucesso!');

 }

public function edit($id){
   
    if (!$professor = Professor::where('user_id', '=', $id)->firstorFail())
        return redirect()->route('professors.index');

    return view('professors.edit',compact('professor'));

 }

public function update(Request $request, $id){
   
    if (!$professor = Professor::findorFail($id))
            return redirect()->route('professors.index');

        $professor->update([
            'name' => $request->name,
            'Cpf' => $request->Cpf,
            'Ra' => $request->Ra,
            'Cidade' => $request->Cidade,
            'Cep' => $request->Cep,
            'Rua' => $request->Rua,
            'numero' => $request->numero,
            'Estado' => $request->Estado,
        ]);;

        if(Auth::user()->acesso  != 'secretaria'){
            return redirect('/home')->with('msg','Perfil editado com sucesso!');}
    
    return redirect()->route('professors.index')->with('msg','Professor editado com sucesso!');

 }

public function destroy($id){
   
    if (!$professor = Professor::find($id))
        return redirect()->route('professors.index');


    $professor->delete();

    return redirect()->route('professors.index')->with('msg','Professor deletado com sucesso!');

 }

 public function matricu_prof($idcurso,$idprofessor){

    $prof = User::findorFail($idprofessor);

    $curso = Curso::findorFail($idcurso);

  $curso->user_id= $prof->id;

  $curso->save();

  return back()->with('msg','Professor cadastrado com sucesso!');


 }
public function showMe(){

    $user = auth()->user();

    $alunos = Aluno::all();

    $meuscursos = Curso::where('user_id', '=', $user->id)->get();

    return view('professors.showMe',['meuscursos'=>$meuscursos,'alunos'=>$alunos]);
}

}
