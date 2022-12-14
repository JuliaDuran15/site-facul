<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\User;

class AlunoController extends Controller
{
    public function index(){

        $alunos = Aluno::get();
        
        return view('alunos.index',compact('alunos'));
    }

    public function show($id){

        $aluno = Aluno::where('user_id', '=', $id)->firstorFail();       

        return view('alunos.show',compact('aluno'));
    }

    public function create(){
 
         return view('alunos.create');
 
     }

    public function store(Request $request){
       
        $aluno = new Aluno;
        $aluno->name = $request->name;
        $aluno->Ra = $request->Ra;
        $aluno->Cpf = $request->Cpf;
        $aluno->Cidade = $request->Cidade;
        $aluno->Cep = $request->Cep;
        $aluno->Rua = $request->Rua;
        $aluno->numero = $request->numero;
        $aluno->Estado = $request->Estado;
        $aluno->fav_film = $request->fav_film;
        
        $aluno->save();

        return redirect()->route('alunos.index')->with('msg','Aluno cadastrado com sucesso!');

     }

    public function edit($id){
       
        if (!$aluno = User::find($id))
            return redirect()->route('alunos.index');

        return view('alunos.edit',compact('aluno'));

     }
    
    public function login($id, Request $request){
       
        if (!$aluno = Aluno::find($id))
            return redirect()->route('alunos.index');

        Aluno::findOrFail($id)->update($request->all());

        return redirect()->route('alunos.index');
     }

    public function update(Request $request, $id){
       
        if (!$aluno = Aluno::where('user_id', '=', $id))
            return redirect()->route('alunos.index');

        $aluno->update([
            'name' => $request->name,
            'Cpf' => $request->Cpf,
            'Ra' => $request->Ra,
            'Cidade' => $request->Cidade,
            'Cep' => $request->Cep,
            'Rua' => $request->Rua,
            'numero' => $request->numero,
            'Estado' => $request->Estado,
            'fav_film' => $request->fav_film,
        ]);

        if(Auth::user()->acesso  != 'secretaria'){
        return redirect('/home')->with('msg','Perfil editado com sucesso!');}

        return redirect()->route('alunos.index')->with('msg','Aluno editado com sucesso!');

     }

    public function destroy($id){
       
        if (!$aluno = Aluno::find($id))
            return redirect()->route('alunos.index');


        $aluno->delete();

        return redirect()->route('alunos.index')->with('msg2','Aluno deletado com sucesso!');

     }
}
