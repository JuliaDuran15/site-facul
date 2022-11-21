<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;

class ProfessorController extends Controller
{public function index(){

    $professors = Professor::get();
    

    return view('professors.index',compact('professors'));

}

public function show($id){
    
   if (!$professor = Professor::find($id))
        return redirect()->route('professors.index');

    return view('professors.show',compact('professor'));

}

public function create(){

     return view('professors.create');

 }

public function store(Request $request){
   
    Professor::create($request->all());

    return redirect()->route('professors.index')->with('msg','Professor cadastrado com sucesso!');;

 }

public function edit($id){
   
    if (!$professor = Professor::find($id))
        return redirect()->route('professors.index');

    return view('professors.edit',compact('professor'));

 }

public function update(Request $request, $id){
   
    if (!$professor = Professor::find($id))
        return redirect()->route('professors.index');

        Professor::findOrFail($request->id)->update($request->all());

    return redirect()->route('professors.index')->with('Professor','Aluno editado com sucesso!');;

 }

public function destroy($id){
   
    if (!$professor = Professor::find($id))
        return redirect()->route('professors.index');


    $professor->delete();

    return redirect()->route('professors.index')->with('msg2','Professor deletado com sucesso!');;

 }
}
