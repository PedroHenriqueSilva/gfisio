@extends('layouts.main')

@section('title', 'Show Prontuary')

@section('content')
<div class="pagetitle">
    <h1>Prontuário</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/{{$avaliationOwtner['id']}}">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/{{$avaliationOwtner['id']}}">Avaliação</a></li>
            <li class="breadcrumb-item"><a href="/consults/{{$avaliation['id']}}">Consulta</a></li>
            <li class="breadcrumb-item active" aria-current="page">Visualizar Prontuário</li>
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
                            <b>Data Avaliação:</b> &nbsp  {{ date( 'd/m/Y' , strtotime($avaliation['date_aval']))}}
                        </div> 
                        <div class="col-lg-4">
                            <b>Data Consulta:</b> &nbsp {{ date( 'd/m/Y' , strtotime($consult['date_consult']))}}
                        </div> 
                    </div>                             
                </div>
            </div>       
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @if($prontuary == "false")
                <h6>Não existe prontuário cadastrado!</h6>
                <a href="/prontuaries/create/{{$consult['id']}}" class="btn btn-dark">Cadastrar</a>
            @else
                <table class="table ">
                    <tbody>
                        <tr>
                            <td><b>Descrição:</b>&nbsp {{ $prontuary['description_last_days'] }}</td>
                        </tr>    
                        <tr>  
                            <td><b>Nível da dor:</b>&nbsp {{ $prontuary['pain_level'] }}</td>
                        </tr>   
                        <tr>
                            <td><b>Qualidade da dor:</b>&nbsp {{ $prontuary['pain_quality'] }}</td>
                        </tr>    
                            <td><b>Melhoria da função:</b>&nbsp {{ $prontuary['function_improvement'] }}</td>
                        </tr>
                    </tbody>
                </table>     
                <div class="row" >
                    <div class="col-md-10 offset-md-1 text-center">   
                        <a href="/pdfs/pdf_prontuary/{{$prontuary['id']}}" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Imprimir Prontuário">Imprimir</a>
                        <a href="/prontuaries/edit/{{$prontuary['id']}}" class="btn btn-dark">Editar</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir_prontuary_modal" data-id="{{$prontuary['id']}}">Excluir</button>
                    </div>
                
                </div>        
        </div>
    </div>
</section>

<!-- Modal Excluir Prontuário -->
<form id = "deleteForm" action=" {{ route('prontuaries.destroy', $prontuary['id'])}}" method="get" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="DELETE">
    @csrf
    <div class="modal fade" id="excluir_prontuary_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir?</p>
                </div>
                <input type="hidden" name="prontuary_id" id="prontuary_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </div>
        </div>
    </div>
</form>    
<script type="text/javascript">
$('#excluir_prontuary_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#prontuary_id').val(recipientId)
    })  
</script>    

@endif
@endsection