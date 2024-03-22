@extends('layout.module')


@section('content')
    <div class="row">
        <div class="col-sm-9 text-start">
            <h2>Pacientes</h2>
        </div>

        <div class="col-sm-3 text-end">
            <a href="patient/create" class="btn btn-success">
                <i class="fa-solid fa-plus"></i> Cadastrar
            </a>
        </div>
    </div>
    
    <hr>

    <form method="post" id="patients" data-load-patient="{{ route('loadPatient') }}">
        @csrf
        <div class="row">
            <div class="col-sm-8">
                <input type="text" class="form-control search" id="disabled" placeholder="Selecione o campo a ser pequisado" required disabled>
                <input type="text" class="form-control search d-none" id="name" name="search" placeholder="Busca por Nome" required disabled>
                <input type="text" class="form-control search d-none" id="cpf" name="search" placeholder="Busca por CPF" required disabled>
                <input type="text" class="form-control search d-none" id="cns" name="search" placeholder="Busca por CNS" required disabled>
                <input type="text" class="form-control search d-none" id="affiliation" name="search" placeholder="Busca por Afiliação" required disabled>
            </div>

            <div class="col-sm-4">
                <select class="form-select" id="field" name="field">
                    <option value="">Buscar por ...</option>
                    <option value="name">Nome</option>
                    <option value="cpf">CPF</option>
                    <option value="cns">CNS</option>
                    <option value="affiliation">Afiliação</option>
                </select>
            </div>
        </div>
    </form>

    <hr>

    <div class="row" id="result">
        <div class="col-sm-12 mb-2">
            <h3>Resultados (0)</h3>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#field').change(function(){
                $('.search').attr('disabled', true);
                $('.search').attr('class', 'form-control search d-none');
                $('.search').val('');

                if($(this).val() == 'name') {
                    $('#name').removeClass('d-none');
                    $('#name').removeAttr('disabled');
                } else if($(this).val() == 'cpf') {
                    $('#cpf').removeClass('d-none');
                    $('#cpf').removeAttr('disabled');
                } else if($(this).val() == 'cns') {
                    $('#cns').removeClass('d-none');
                    $('#cns').removeAttr('disabled');
                } else if($(this).val() == 'affiliation') {
                    $('#affiliation').removeClass('d-none');
                    $('#affiliation').removeAttr('disabled');
                } else {
                    $('#disabled').removeClass('d-none');
                }
            });

            $('.search').keyup(function(){
                $.ajax({
                    url: $('#patients').attr('data-load-patient'),
                    data: {
                        'search': $(this).val(),
                        'field': $('#field').val()
                    },
                    success: function(data){
                        $('#result').html(data);
                    }
                });
            });
        });
    </script>
@endsection