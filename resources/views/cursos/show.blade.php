@extends('layouts.app')

@section('title', 'Curso')

@section('content')
    <h1> Informações do curso {{$curso->name}}</h1>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="p-6">
                        <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-description">Descrição: {{$curso->description}}</p>
                                <p class="card-description">Professor: 
                                    @foreach($professor as $prof)
                                        @if($prof->user_id == $curso->user_id )
                                        {{$prof->name}}
                                        @endif
                                    @endforeach
                                </p>
                                <p>Status: {{$curso->status}}
                                </p>
                        </div>
                        </div>

                        @if(Auth::user()->acesso  == "secretaria")
                        <form action="{{ route('cursos.destroy', $curso ->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Deletar</button>
                        </form>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                 Cadastrar professor
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($professor as $prof)
                        <li><a class="dropdown-item" href="{{ route('matricu_prof',[$curso->id,$prof->user_id])}}">
                            {{$prof->name}}
                        </a></li>
                        @endforeach
                            </ul>
                        </li>
                        @endif
                        
                        @if(Auth::user()->acesso  == "aluno")
                        <form action="{{ route('cursos.join', $curso ->id)}}" method="POST">
                            @method('GET')
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <button type="submit" class="btn btn-outline-info">Matricular-se</button>
                        </form>
                        @endif

                </div>
            </div>
@endsection