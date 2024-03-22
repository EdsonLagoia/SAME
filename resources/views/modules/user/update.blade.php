@extends('layout.module')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h2>Atualizar Usuário</h2>
            <h5 class="mb-0 text-danger">Campos com * são obrigatórios</h5>
        </div>
    </div>

    <hr>

    <form action="update/{{ $data->id }}" method="post">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-sm-8">
                <label for="name" class="form-label">Nome <span class="text-danger fw-bold">*</span></label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" required>
            </div>
            
            <div class="col-sm-4">
                <label for="cpf" class="form-label">CPF <span class="text-danger fw-bold">*</span></label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $data->cpf }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-1">
                <label class="form-check-label mt-1" for="admin">Admin?</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="admin" name="admin" value="1" onchange="Modules()" {{ $data->admin ? 'checked' : '' }}>
                </div>
            </div>

            <div class="col-sm-5">
                <label for="phone" class="form-label">Telefone <span class="text-danger fw-bold">*</span></label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $data->phone }}" required>
            </div>
            
            <div class="col-sm-6">
                <label for="email" class="form-label">Email <span class="text-danger fw-bold">*</span></label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}" required>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-redo"></i> Atualizar
                </button>
        
                <button type="reset" class="btn btn-warning">
                    <i class="fa-solid fa-eraser"></i> Limpar
                </button>
        
                <a href="/user" class="btn btn-danger">
                    <i class="fa-solid fa-angles-left"></i> Voltar
                </a>
            </div>
        </div>
    </form>
@endsection