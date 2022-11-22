
@extends('layouts.app')
@section('title', ' Alunos')

@section('content')
<div class="dashboard-title-container">
    <h1> Listagem dos alunos</h1>
</div>
<div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg dashboard-container">
    <div class="grid grid-cols-1 md:grid-cols-2">
        @if(count($alunos)>0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">  </th>
                    <th scope="col"> Nome </th>
                    <th scope="col"> RA </th>
                    <th scope="col"> Ações </th>
                </tr>
            </thead>
            <tbody>
                @foreach($alunos as $aluno)
                <tr>
                    <td scropt="row">{{$loop->index+1}}</td>
                    <td>{{$aluno->name}}</td>
                    <td>  RA: {{$aluno->Ra}}</td>
                    <td><a href="{{route('alunos.show', $aluno->id)}}" class="btn btn-outline-info">Detalhes</a>
                    <a href="{{route('alunos.edit', $aluno->id)}}" class="btn btn-outline-success">Editar</a>
                    <a href="{{route('alunos.login', $aluno->id)}}" class="btn btn-outline-success">Criar Login</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else 
        <p>Ainda não há alunos</p>
        @endif
    </div>
</div>
<div class="flex justify-center mt-4 sm:items-center sm:justify-between">
<a href="{{ route ('alunos.create')}} " class="btn btn-outline-dark btn-sm">Cadastrar Novo Aluno</a>
</div>
@endsection
        