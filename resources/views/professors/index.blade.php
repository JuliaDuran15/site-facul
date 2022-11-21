
@extends('layouts.app')

@section('content')
<div class="dashboard-title-container">
    <h1> Listagem dos professores</h1>
</div>
<div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg dashboard-container">
    <div class="grid grid-cols-1 md:grid-cols-2">
        @if(count($professors)>0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">  </th>
                    <th scope="col"> Nome </th>
                    <th scope="col"> RP </th>
                    <th scope="col"> Ações </th>
                </tr>
            </thead>
            <tbody>
                @foreach($professors as $professor)
                <tr>
                    <td scropt="row">{{$loop->index+1}}</td>
                    <td>{{$professor->name}}</td>
                    <td>  RP: {{$professor->Ra}}</td>
                    <td><a href="{{route('professors.show', $professor->id)}}" class="btn btn-outline-info">Detalhes</a>
                    <a href="{{route('professors.edit', $professor->id)}}" class="btn btn-outline-success">Editar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else 
        <p>Ainda não tem professores</p>
        @endif
    </div>
</div>
<div class="flex justify-center mt-4 sm:items-center sm:justify-between">
<a href="{{ route ('professors.create')}} " class="btn btn-outline-dark btn-sm">Cadastrar Novo Professor</a>
</div>
@endsection
        