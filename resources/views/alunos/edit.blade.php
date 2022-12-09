@extends('layouts.app')

@section('title', 'Editar Aluno')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Aluno') }}</div>
                
                @if(Auth::user()->acesso  == 'secretaria' || Auth::user()->id  == $aluno->id)

                <div class="card-body">

                    @if ($errors->any())
                        <ul class="errors">
                            @foreach ($errors->all() as $error)
                            <li class="error">{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form action="{{ route('alunos.update', $aluno->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nome do Aluno') }}</label>
                                <div class="col-md-6">
                                <input type="string" class="from-control" id="name" name="name" placeholder="Nome do Aluno"value="{{$aluno->name}}">
                                </div>
                            </div>                    
                            <div class="row mb-3">
                                <label for="Rp" class="col-md-4 col-form-label text-md-end">{{ __('RA') }}</label>
                                <div class="col-md-6">
                                <input type="string" class="from-control" id="Ra" name="Ra" placeholder="RA" value="{{$aluno->Ra}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Cpf" class="col-md-4 col-form-label text-md-end">{{ __('CPF') }}</label>
                                <div class="col-md-6">
                                <input type="string" class="from-control" id="Cpf" name="Cpf" placeholder="CPF"value="{{$aluno->Cpf}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tittle" class="col-md-4 col-form-label text-md-end">{{ __('CEP') }}</label>
                                <div class="col-md-6">
                                <input type="string" class="from-control" id="Cep" name="Cep" placeholder="CEP"value="{{$aluno->Cep}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tittle" class="col-md-4 col-form-label text-md-end">{{ __('Rua') }}</label>
                                <div class="col-md-6">
                                <input type="text" class="from-control" id="Rua" name="Rua" placeholder="RUA" value="{{$aluno->Rua}}">
                            </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tittle" class="col-md-4 col-form-label text-md-end">{{ __('Numero') }}</label>
                                <div class="col-md-6">
                                <input type="text" class="from-control" id="numero" name="numero" placeholder="Numero" value="{{$aluno->numero}}">
                            </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tittle" class="col-md-4 col-form-label text-md-end">{{ __('Cidade') }}</label>
                                <div class="col-md-6">
                                <input type="text" class="from-control" id="Cidade" name="Cidade" placeholder="Cidade" value="{{$aluno->Cidade}}">
                            </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tittle" class="col-md-4 col-form-label text-md-end">{{ __('Estado') }}</label>
                                <div class="col-md-6">
                                <input type="text" class="from-control" id="Estado" name="Estado" placeholder="Estado" value="{{$aluno->Estado}}">
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Filme Favorito:</label> 
                            <textarea name="fav_film"  class="form-control" placeholder="Filme favorito" value="{{$aluno->fav_film}}"></textarea>
                        </div>
    <input type="submit" class="btn btn-outline-primary" value="Editar aluno">
    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

@endif

@endsection