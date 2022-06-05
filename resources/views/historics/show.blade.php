@extends('layouts.main')

@section('title', 'Information Historic')
 
@section('content')
<div class="pagetitle">
    <h1>Histórico</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>           
            <li class="breadcrumb-item"><a href="/users/show/{{$avaliationOwtner['id']}}">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/{{$avaliationOwtner['id']}}">Avaliação</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/{{$avaliation['id']}}">Avaliação Info</a></li>
            <li class="breadcrumb-item active" aria-current="page">Visualizar Histórico</li>
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
                                <b>Data Nasc:</b> &nbsp {{date( 'd-m-Y' , strtotime($avaliationOwtner['date_nasc']))}} 
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
                            <div class="col-lg-10"><br>
                                <b>Diagnóstico Médico:</b>&nbsp {{ $historic->medical_diagnostic}}
                            </div>
                            <div class="col-lg-10"><br>
                                <b>Medicação:</b>&nbsp {{ $historic->medication}}
                            </div>
                            <div class="col-lg-10"><br>
                                <b>Queixa Principal:</b>&nbsp {{ $historic->complaint}}
                            </div>
                            <div class="col-lg-10"><br>
                                <b>História:</b>&nbsp {{ $historic->story}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
</section>

<div class="container">
    <div class="row ">
        <div class="col-md-10 offset-md-1 d-flex justify-content-center ">       
            <a href="/pdfs/pdf_historic/{{$historic->id}}" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Imprimir Avaliação geral">Imprimir</a>
            <a href="/historic/edit/{{$historic->id}}" class="btn btn-dark"> Editar</a> 
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir_historic_modal" data-id="{{$historic->id}}">Excluir</button>
        </div> 
    </div>    
</div>


<!-- Modal Excluir Avaliação Geral-->
@if($historic != "false")
<form id = "deleteForm" action=" {{ route('historic.destroy', $historic['id'])}}" method="get" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="DELETE">
    @csrf
    <div class="modal fade" id="excluir_historic_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Histórico</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir?</p>
                </div>
                <input type="hidden" name="historic_id" id="historic_id">
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
$('#excluir_historic_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#historic_id').val(recipientId)
    })      
</script>    
@endsection
