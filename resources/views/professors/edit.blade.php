@extends('layouts.app')

@section('title', 'Editar Professor')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Professor') }}</div>

                @can('is_Secretaria')

                <div class="card-body">


                @if ($errors->any())
                    <ul class="errors">
                        @foreach ($errors->all() as $error)
                        <li class="error">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{ route('professors.update', $professor->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nome do Professor') }}</label>
                            <div class="col-md-6">
                            <input type="string" class="from-control" id="name" name="name" placeholder="Nome do Professor" value="{{$professor->name}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Rp" class="col-md-4 col-form-label text-md-end">{{ __('RP do Professor') }}</label>
                            <div class="col-md-6">
                            <input type="string" class="from-control" id="Ra" name="Ra" placeholder="RP do Professor" value="{{$professor->Ra}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Cpf" class="col-md-4 col-form-label text-md-end">{{ __('CPF') }}</label>
                            <div class="col-md-6">
                            <input type="string" class="from-control" id="Cpf" name="Cpf" placeholder="CPF" value="{{$professor->Cpf}}" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tittle" class="col-md-4 col-form-label text-md-end">{{ __('CEP') }}</label>
                            <div class="col-md-6">
                            <input type="string" class="from-control" id="Cep" name="Cep" placeholder="CEP" value="{{$professor->Cep}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tittle" class="col-md-4 col-form-label text-md-end">{{ __('Rua') }}</label>
                            <div class="col-md-6">
                            <input type="text" class="from-control" id="Rua" name="Rua" placeholder="Rua" value="{{$professor->Rua}}">
                        </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tittle" class="col-md-4 col-form-label text-md-end">{{ __('Numero') }}</label>
                            <div class="col-md-6">
                            <input type="text" class="from-control" id="numero" name="numero" placeholder="Numero" value="{{$professor->numero}}">
                        </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tittle" class="col-md-4 col-form-label text-md-end">{{ __('Cidade') }}</label>
                            <div class="col-md-6">
                            <input type="text" class="from-control" id="Cidade" name="Cidade" placeholder="Cidade" value="{{$professor->Cidade}}">
                        </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tittle" class="col-md-4 col-form-label text-md-end">{{ __('Estado') }}</label>
                            <div class="col-md-6">
                            <input type="text" class="from-control" id="Estado" name="Estado" placeholder="Estado" value="{{$professor->Estado}}">
                        </div>
                        </div>
    <input type="submit" class="btn btn-outline-primary" value="Editar Professor">
</form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endcan

@endsection