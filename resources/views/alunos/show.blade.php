@extends('layouts.app')

@section('title', 'Sobre Aluno')

@section('content')
<h1> Informações do/a Aluno/a {{$aluno->name}}</h1>


            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="p-6">
                        <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-description">RA: {{$aluno->Ra}} , CPF: {{$aluno->Cpf}} </p>
                            <p> CEP: {{$aluno->Cep}}, Rua: {{$aluno->Rua}} ,Numero: {{$aluno->numero}}</p>
                            <p> Cidade: {{$aluno->Cidade}}, Estado: {{$aluno->Estado}}</p>
                            <p>Filme Favorito: {{$aluno->fav_film}}</p>
                        </div>
                        <form action="{{ route('alunos.destroy', $aluno ->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Deletar</button>
                        </div>
                </div>
            </div>
@endsection