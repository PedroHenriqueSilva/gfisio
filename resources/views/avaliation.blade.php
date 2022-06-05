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
                                <b>Data Nasc:</b> &nbsp {{date( 'd-m-Y' , strtotime($avaliationOwner['date_nasc']))}} 
                            </div> 
                            <div class="col-lg-3">
                                <a href="/avaliations/create/{{$avaliationOwner['id']}}" class="btn btn-dark">Nova Avaliação</a>
                            </div>
                    </div>
                </div>       
            </div>
        </div>
    
        <div class="col-lg-12">
            @if((count($avaliation) == '0'))
                <p>Não existem avaliações cadastradas!!!</p>
            @else    
            <table class="table">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Data Avaliação</th>
                    <th scope="col"></th>
                    <th scope="col">Ações</th>
                    <th scope="col">Avaliação </th>
                    <th scope="col">Imprimir</th>
                    <th scope="col">Consultas</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $num = 1;
                @endphp
                    @foreach($avaliation as $aval)
                        <tr>    
                            <td>
                            @php
                                print($num);
                                $num +=1;
                            @endphp
                   
                            </td>
                            <td>
                            <?php
                                $data = new DateTime($aval->date_aval);
                                echo $data->format('d-m-Y');
                            ?>
                            </td>
                            
                            <td>{{$aval->pain}}</td> 
                            <td>
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editar_aval_modal" data-id="{{$aval->id}}"><i class="bi-pencil-fill" style="color:#47748b;"></i></button>    
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#excluir_aval_modal" data-id="{{$aval->id}}"><i class="bi-x-square" style="color:red;"></i></button>    
                            </td>
                            <td>
                                <a href="/avaliations/info/{{ $aval->id }}" class="btn" data-toggle="tooltip" data-placement="top" title="Avaliações"><i class="bi bi-file-earmark-text"></i></a>
                            </td>
                            <td>
                                <a href="/pdfs/pdf_avaliação/{{$aval->id}}" class="btn" data-toggle="tooltip" data-placement="top" title="Imprimir"><i class="bi bi-printer-fill"></i></a>
                            </td>
                            <td>
                                <a href="/consults/{{ $aval->id }}" class="btn" data-toggle="tooltip" data-placement="top" title="Consultas"><i class="bi bi-journal-richtext"></i></a>
                            </td>   
                        </tr>
                        @endforeach
                    
                    </tbody>
            </table>
            
        </div>
    </div>
</section>
<!-- Modal Excluir Avaliação -->
<form id = "deleteForm" action=" {{ route('avaliation.destroy', $aval->id)}}" method="get" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="DELETE">
    @csrf
    <div class="modal fade" id="excluir_aval_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Avaliação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir?</p>
                </div>
                <input type="hidden" name="aval_id" id="aval_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
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
    <div class="modal fade" id="editar_aval_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Data Avaliação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="date" name="date_aval" id="date_aval" value="{{$aval->date_aval}}">
                </div>
                <input type="hidden" name="aval_id" id="aval_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Editar</button>
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
@endif
@endsection
