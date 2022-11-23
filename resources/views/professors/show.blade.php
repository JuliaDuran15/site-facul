@extends('layouts.app')

@section('title', 'Sobre Professor')

@section('content')
<h1> Informações do/a Professor/a {{$professor->name}}</h1>


            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="p-6">
                        <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-description">RP: {{$professor->Ra}} , CPF: {{$professor->professor}} </p>
                            <p> CEP: {{$professor->Cep}}, Rua: {{$professor->Rua}} ,Numero: {{$professor->numero}}</p>
                            <p> Cidade: {{$professor->Cidade}}, Estado: {{$professor->Estado}}</p>
                            <p>Materias: </p>
                        </div>
                        <form action="{{ route('professors.destroy', $professor ->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Deletar</button>
                        </div>
                </div>
            </div>
        @endsection