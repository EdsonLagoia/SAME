<div class="col-sm-12 mb-2">
    <h3>Resultados ({{ $result }})</h3>
</div>

@if($search != NULL)
    <div class="col-sm-12">
        <table class="table table-responsive table-striped table-secondary">
            @foreach($search as $search)
                <tr class="align-middle">
                    <td width=80%>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <p class="mb-0"><strong>Prontuário: </strong>{{ $search->chart }}</p>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-8">
                                <p class="mb-0"><strong>Nome: </strong>{{ $search->name }}</p>
                            </div>

                            <div class="col-sm-4">
                                <p class="mb-0"><strong>D. Nasc: </strong>{{ date('d/m/Y', strtotime($search->birth_date)) }}</p>
                            </div>
                        </div>
                        
                        <div class="row mb-2">
                            <div class="col-sm-8 d-flex align-items-center">
                                <strong>Filiação: </strong>
                                <p class="ms-1 mb-0">{{ $search->affiliation1 }}<br>{{ $search->affiliation2 }}</p>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <p class="mb-0"><strong>RG: </strong>{{ $search->rg }}</p>
                            </div>

                            <div class="col-sm-4">
                                <p class="mb-0"><strong>CPF: </strong>{{ $search->cpf }}</p>
                            </div>

                            <div class="col-sm-4">
                                <p class="mb-0"><strong>CNS: </strong>{{ $search->cns }}</p>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <p class="mb-0"><strong>Sexo: </strong>{{ $search->sex }}</p>
                            </div>

                            <div class="col-sm-4">
                                <p class="mb-0"><strong>Raça/Cor: </strong>{{ $search->breed }}</p>
                            </div>

                            <div class="col-sm-4">
                                <p class="mb-0"><strong>Telefone: </strong>{{ $search->phone }}</p>
                            </div>
                        </div>
                    </td>

                    <td width=20%>
                        <a href="patient/{{ $search->id }}" class="btn btn-info my-1 col-sm-12">
                            <i class="fa-solid fa-pen-to-square"></i> Atualizar Dados
                        </a>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
@endif