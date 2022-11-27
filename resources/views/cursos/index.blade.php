@extends('layouts.app')

@section('title','Cursos')

@section('content')
<div class="dashboard-title-container">
    <h1> Cursos disponíveis: </h1>
</div>

@can('is_Prof')
@can('is_Aluno')
@can('is_Secretaria')

@auth
<div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg dashboard-container">
    <div class="grid grid-cols-1 md:grid-cols-2">
        @if(count($cursos)>0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">  </th>
                    <th scope="col"> Nome </th>
                    <th scope="col"> Descrição  </th>
                    <th scope="col"> Professor   </th>
                    <th scope="col"> Status </th>
                    <th scope="col"> Ações </th>
                </tr>
            </thead>
            <tbody>
                @foreach($cursos as $curso)
                <tr>
                    <td scropt="row">{{$loop->index+1}}</td>
                    <td>{{$curso->name}}</td>
                    <td>{{$curso->short_despriction}}</td>
                    <td>professor responsavel</td>
                    <td>{{$curso->status}}</td>
                    <td><a href="{{route('cursos.show', $curso->id)}}" class="btn btn-outline-info">Descrição</a>
                    @endcan
                    <form action="{{ route('cursos.join', $curso ->id)}}" method="POST">
                    <button type="submit" class="btn btn-outline-primary">Matricular</button>
                    </form></td>
                    @endcan
                    <a href="{{route('cursos.edit', $curso->id)}}" class="btn btn-outline-success">Editar</a>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else 
        <p>Ainda não há cursos</p>
        @endif
    </div>
</div>
<div class="flex justify-center mt-4 sm:items-center sm:justify-between">
<a href="{{ route ('cursos.create')}} " class="btn btn-outline-dark btn-sm">Cadastrar Novo Curso</a>
</div>
@endauth
@guest
<div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg dashboard-container">
    <div class="grid grid-cols-1 md:grid-cols-2">
    <a>Você não pode acessar sem login</a>
    </div>
</div>
@endguest

@endcan

@endsection    

