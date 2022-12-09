<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Matricula;

class MatriculaController extends Controller
{
    public function index () {
        $matricula = Matricula::all();

        return view('welcome',['id_aluno' => $matricula]);
    }
}

