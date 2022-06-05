@extends('layouts.main')

@section('title', 'Visualizar Avaliação Geral')

@section('content')
<div class="pagetitle">
    <h1>Avaliação Geral</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/patients">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/{{$avaliationOwtner['id']}}">Avaliação</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/{{$avaliation['id']}}">Avaliação Info</a></li>
            <li class="breadcrumb-item active" aria-current="page">Visualizar Avaliação Geral</li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <b>Nome:</b>&nbsp  {{$avaliationOwtner['name']}}
                            </div>
                            <div class="col-lg-4">
                                <b>Data Nasc:</b> &nbsp {{$avaliationOwtner['date_nasc']}} 
                            </div> 
                        </div>
                    </div>
                </div>       
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2">
                                <b>Idade:</b>&nbsp {{ $general->age}}
                            </div>
                            <div class="col-lg-2">
                                <b>Peso:</b>&nbsp {{ $general->weight}}
                            </div>
                            <div class="col-lg-2">
                                <b>Altura:</b>&nbsp {{ $general->height}}
                            </div>
                            <div class="col-lg-2">
                                <b>IMC:</b>&nbsp {{ $general->imc}}
                            </div>
                            <div class="col-lg-10"><br>
                                <b>Descrição do trabalho:</b>&nbsp {{$general->job_description}}
                            </div>
                            <div class="col-lg-10"><br>
                                <b>Movimentos Mais Repetidos:</b>&nbsp {{$general->repeated_movements}}
                            </div>
                            <div class="col-lg-10"><br>
                                <b>Demanda Física/Psicológica:</b>&nbsp {{$general->demand_physical_psycho}}
                            </div>
                            <div class="col-lg-10"><br>
                                <b>Correlaciona Piora Clínica com Trabalho:</b>&nbsp {{$general->worse_clinical_work}}
                            </div>
                            <div class="col-lg-10"><br>
                                <b>Hobby/Lazer:</b>&nbsp {{$general->leisure}}
                            </div>
                            <div class="col-lg-10"><br>
                                <b>Atividade Física:</b>&nbsp {{$general->physical_activity}}
                            </div>
                            <div class="col-lg-10"><br>
                                <b>Tempo/XSemana:</b>&nbsp {{$general->physical_activity_time}}
                            </div>
                            <div class="col-lg-10"><br>
                                <b>Sente desconforto na realização da atividade física:</b>&nbsp {{$general->discomfort_physical_activity}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <div class="row">
        <div class="col-md-10 offset-md-1 d-flex justify-content-center " >
            <a href="/pdfs/pdf_general/{{$general->id}}" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Imprimir Avaliação geral">Imprimir</a>
            <a href="/general/edit/{{$general->id}}" class="btn btn-dark"> Editar</a> 
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir_avalGeral_modal" data-id="{{$general->id}}">Excluir</button>
        </div>
        <br>
    </div>
</section>  
<br><br><br><br>

<!-- Modal Excluir Avaliação Geral-->
@if($general != "false")

<form id = "deleteForm" action=" {{ route('general.destroy', $general['id'])}}" method="get" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="DELETE">
    @csrf
    <div class="modal fade" id="excluir_avalGeral_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Avaliação Geral</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir?</p>
                </div>
                <input type="hidden" name="avalGeral_id" id="avalGeral_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </div>
        </div>
    </div>
</form>   
  
@endif
<script type="text/javascript">
$('#excluir_avalGeral_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#avalGeral_id').val(recipientId)
    })      
</script>    
@endsection