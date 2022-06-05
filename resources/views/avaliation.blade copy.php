@extends('layouts.main')

@section('title', 'Avaliações')

@section('content')
<div class="pagetitle">
    <h1>Avaliações</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/{{$avaliationOwner['id']}}">Paciente</a></li>
            <li class="breadcrumb-item active" aria-current="page">Avaliações</li>
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
                                <b>Nome:</b>&nbsp  {{$avaliationOwner['name']}}
                            </div>
                            <div class="col-lg-4">
                                <b>Data Nasc:</b> &nbsp {{$avaliationOwner['date_nasc']}} 
                            </div> 
                            <div class="col-lg-3">
                                <a href="/avaliations/create/{{$avaliationOwner['id']}}" class="btn btn-dark">Nova Avaliação</a>
                            </div>
                    </div>
                </div>       
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @if((count($avaliation) == '0'))
                <p>Não existem avaliações cadastradas!!!</p>
            @else    
                @php
                    $num = 1;
                @endphp
            @foreach($avaliation as $aval)
            <div class="row">
                <div class="card">
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-lg-1">
                                    <b> @php print($num);$num +=1; @endphp</b>
                                </div>
                                <div class="col-lg-2">
                                   {{$aval->date_aval}}
                                </div>
                                <div class="col-lg-3">
                                   
                                    <a href="" class="btn" data-placement="top" title="Editar Avaliação" data-toggle="modal" data-target="#editar_aval_modal" data-id="{{$aval->id}}"><i class="bi-pencil-fill"></i> </a>     
                                    <a href="" class="btn" data-placement="top" title="Deletar Avaliação" data-toggle="modal" data-target="#excluir_aval_modal" data-id="{{$aval->id}}"><i class="bi-x-square" style="color:red;"></i> </a>     
                                </div>
                               
                                <div class="col-lg-2">
                                    
                                    <a href="/avaliations/info/{{ $aval->id }}" class="btn" data-toggle="tooltip" data-placement="top" title="Avaliação "><i class="bi bi-file-earmark-text"></i></a>

                                </div>
                                <div class="col-lg-2">
                                    <a href="/pdfs/pdf_avaliação/{{$aval->id}}" class="btn" data-toggle="tooltip" data-placement="top" title="Imprimir "><i class="bi bi-printer-fill"></i></a>
                                </div>
                                <div class="col-lg-2">
                                    <a href="/consults/{{ $aval->id }}" class="btn" data-toggle="tooltip" data-placement="top" title="Consultas"><i class="bi bi-journal-richtext"></i></a>
                                </div>
                            </div>
                        </div>
                </div>  
            </div>
            @endforeach
            @endif     
        </div>
   


    <div class="d-flex justify-content-center">
        @if (isset($filters))
            {{ $avaliation->appends($filters)->links() }}
        @else
            {{ $avaliation->links() }}
        @endif
    </div>
    </div>       
</section>

  
 
<!-- Modal Excluir Avaliação -->
<form id = "deleteForm" action=" {{ route('avaliation.destroy', $aval->id)}}" method="get" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="DELETE">
    @csrf
    <div class="modal fade bd-example-modal-sm" id="excluir_aval_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Confirmação</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir?</p>
                </div>
                <input type="hidden" name="aval_id" id="aval_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </div>
        </div>
    </div>  
</form>    

<script type="text/javascript">
$('#excluir_aval_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#aval_id').val(recipientId)
    })  
</script>    

<!-- Modal Editar Avaliação -->
<form id = "deleteForm" action=" {{ route('avaliations.update', $aval->id)}}" method="put" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="UPDATE">
    @csrf
    <div class="modal fade bd-example-modal-sm" id="editar_aval_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Editar Data Avaliação</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <input type="date" name="date_aval" id="date_aval" value="{{$aval->date_aval}}">
            </div>
            <input type="hidden" name="aval_id" id="aval_id">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-dark">Editar</button>
            </div>
            </div>
        </div>
    </div>  
</form>    

<script type="text/javascript">
$('#editar_aval_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#aval_id').val(recipientId)
    })  
</script>    

@endsection
