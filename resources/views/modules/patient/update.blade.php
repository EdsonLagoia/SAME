@extends('layout.module')

@section('content')
    <div class="row">
        <div class="col-sm-12 text-start">
            <h2> Atualizar Paciente</h2>
            <h5 class="mb-0 text-danger">Campos com * são obrigatórios</h5>
        </div>
    </div>
    <hr>
    <form action="update/{{ $data->id }}" method="post">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-sm-3">
                <label for="chart" class="form-label">Prontuário <span class="text-danger fw-bold">*</span></label>
                <input type="text" class="form-control" id="chart" name="chart" value="{{ $data->chart }}" minlength=1 required>
            </div>

            <div class="col-sm-6">
                <label for="name" class="form-label">Nome <span class="text-danger fw-bold">*</span></label>
                <input type="text" class="form-control text-uppercase" id="name" name="name" value="{{ $data->name }}" required>
            </div>
            
            <div class="col-sm-3">
                <label for="birth_date" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $data->birth_date }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-4 d-flex align-items-center">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="use_sn" name="use_sn" {{ $data->social_name ? 'checked' : '' }} onchange="Social_Name()">
                    <label class="form-check-label" for="use_sn">Tratamento pelo nome social?</label>
                </div>
            </div>
    
            <div class="col-sm-8">
                <label for="social_name" class="form-label">Nome Social</label>
                <input type="text" class="form-control text-uppercase" id="social_name" name="social_name" value="{{ $data->social_name }}" required disabled>
                <p class="mb-0" style="font-size: 9pt">Nome social: designação pela qual a pessoa travesti ou transexual se identifica e é socialmente reconhecida;<br>
                Conforme o Decreto Federal Nº 8.727, de 28 de Abril de 2016.</p>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-sm-4">
                <label for="rg" class="form-label">RG</label>
                <input type="text" class="form-control" id="rg" name="rg" value="{{ $data->rg }}" maxlength=15>
            </div>
            
            <div class="col-sm-4">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $data->cpf }}" minlength=14>
            </div>
            
            <div class="col-sm-4">
                <label for="cns" class="form-label">CNS</label>
                <input type="text" class="form-control" id="cns" name="cns" value="{{ $data->cns }}" minlength=18>
            </div>
        </div>
            
        <div class="row mb-3">
            <div class="col-sm-4">
                <label for="breed" class="form-label">Raça/Cor</label>
                <select class="form-select" id="breed" name="breed">
                    <option value="">---</option>
                    <option value="BRANCA" {{ $data->breed == 'BRANCA' ? 'selected' : '' }}>BRANCA</option>
                    <option value="PRETA" {{ $data->breed == 'PRETA' ? 'selected' : '' }}>PRETA</option>
                    <option value="PARDA" {{ $data->breed == 'PARDA' ? 'selected' : '' }}>PARDA</option>
                    <option value="AMARELA" {{ $data->breed == 'AMARELA' ? 'selected' : '' }}>AMARELA</option>
                    <option value="INDIGENA" {{ $data->breed == 'INDIGENA' ? 'selected' : '' }}>INDIGENA</option>
                </select>
            </div>

            <div class="col-sm-4">
                <label for="sex" class="form-label">Sexo</label>
                <select class="form-select" id="sex" name="sex">
                    <option value="">---</option>
                    <option value="MASCULINO" {{ $data->sex ? 'selected' : '' }}>MASCULINO</option>
                    <option value="FEMININO" {{ $data->sex ? 'selected' : '' }}>FEMININO</option>
                    <option value="IGNORADO" {{ $data->sex ? 'selected' : '' }}>IGNORADO</option>
                </select>
            </div>

            <div class="col-sm-4">
                <label for="phone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $data->phone }}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="affiliation" class="form-label">Filiação</label>
            <div class="col-sm-6">
                <input type="text" class="form-control text-uppercase" id="affiliation1" name="affiliation1" value="{{ $data->affiliation1 }}">
            </div>

            <div class="col-sm-6">
                <input type="text" class="form-control text-uppercase" id="affiliation2" name="affiliation2" value="{{ $data->affiliation2 }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" value="{{ $data->cep }}">
            </div>

            <div class="col-sm-9">
                <label for="address" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $data->address }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-12">
                <label for="informations" class="form-label">Informações Adicionais</label>
                <textarea class="form-control" id="informations" name="informations" rows="3">{{ $data->informations }}</textarea>
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
        
                <a href="/patient" class="btn btn-danger">
                    <i class="fa-solid fa-angles-left"></i> Voltar
                </a>
            </div>
        </div>
    </form>
@endsection