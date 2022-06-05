@extends('layouts.main')

@section('title', 'Visualizar Subjetiva')

@section('content')
<div class="pagetitle">
    <h1>Subjetiva</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/{{$avaliationOwtner['id']}}">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/{{$avaliationOwtner['id']}}">Avaliações</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/{{$avaliation['id']}}">Avaliação Info</a></li>
            <li class="breadcrumb-item active" aria-current="page">Visualizar Subjetiva</li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            Subjetiva Imagem:&nbsp
                            <a href="/img/subjective/{{ $subjective->subjective_img }}">    
                                    <img src="/img/subjective/{{ $subjective->subjective_img }}" alt="{{ $subjective->subjective_img }}" class="img-preview">
                            </a>    
                        </div>
                        <div class="col-lg-6">
                            Escala Visual e Analógica de Dor:&nbsp{{$subjective->subjective_scale}}
                        </div>
                        <div class="col-lg-6"><br>
                            Característica da Dor:&nbsp{{$subjective->subjective_characteristic}}
                        </div>
                        <div class="col-lg-6"><br>
                            Localização Espacial:&nbsp{{$subjective->subjective_spatial_location}}
                        </div>
                        <div class="col-lg-12"><br>
                             Anatoções:&nbsp{{$subjective->subjective_description}}
                        </div>
                    </div>
                </div>
                </div>
            </div>
    </div>
    <div class="row">
         <div class="col-md-2 offset-md-5"> 
            <a href="/subjective/edit/{{ $subjective->id }}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Editar"> Editar</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir_subjective_modal" data-id="{{$subjective->id}}">Excluir</button>
        </div>
    </div>

</section>

 
<!-- Modal Excluir Subjetiva -->

<form id = "deleteForm" action=" {{ route('subjective.destroy', $subjective->id)}}" method="get" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="DELETE">
    @csrf
    <div class="modal fade" id="excluir_subjective_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Avaliação Subjetiva</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir?</p>
                </div>
                <input type="hidden" name="subjective_id" id="subjective_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </div>
        </div>
    </div>
</form>    

<script type="text/javascript">
$('#excluir_subjective_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#subjective_id').val(recipientId)
    })  
</script>    

 
@endsection