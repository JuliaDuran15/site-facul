<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    public function index(){

        $alunos = Aluno::get();
        

        return view('alunos.index',compact('alunos'));

    }

    public function show($id){
        
       if (!$aluno = Aluno::find($id))
            return redirect()->route('alunos.index');

        return view('alunos.show',compact('aluno'));

    }

    public function create(){
 
         return view('alunos.create');
 
     }

    public function store(Request $request){
       
        Aluno::create($request->all());

        return redirect()->route('alunos.index')->with('msg','Aluno cadastrado com sucesso!');;

     }

    public function edit($id){
       
        if (!$aluno = Aluno::find($id))
            return redirect()->route('alunos.index');

        return view('alunos.edit',compact('aluno'));

     }
    
    public function login($id){
       
        if (!$aluno = Aluno::find($id))
            return redirect()->route('alunos.index');

        Aluno::findOrFail($request->id)->update($request->all());

        return redirect()->route('alunos.index')->with('msg1','Login criado com sucesso!');;
     }

    public function update(Request $request, $id){
       
        if (!$aluno = Aluno::find($id))
            return redirect()->route('alunos.index');

        Aluno::findOrFail($request->id)->update($request->all());

        return redirect()->route('alunos.index')->with('msg1','Aluno editado com sucesso!');;

     }

    public function destroy($id){
       
        if (!$aluno = Aluno::find($id))
            return redirect()->route('alunos.index');


        $aluno->delete();

        return redirect()->route('alunos.index')->with('msg2','Aluno deletado com sucesso!');;

     }
}
