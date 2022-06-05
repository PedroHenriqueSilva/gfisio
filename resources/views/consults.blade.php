@extends('layouts.main')

@section('title', 'Consults')

@section('content')
<div class="pagetitle">
    <h1>Consultas</h1>
    <nav>
        <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="">Paciente</a></li>
                <li class="breadcrumb-item"><a href="">Avaliação</a></li>
                <li class="breadcrumb-item active" aria-current="page">Consultas</li>
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
                            <b>Nome:</b>&nbsp  {{$avaliationOwner['name']}}
                        </div>
                        <div class="col-lg-4">
                            <b>Data Nasc:</b> &nbsp {{date( 'd-m-Y' , strtotime($avaliationOwner['date_nasc']))}} 
                        </div> 
                    </div>                             
                </div>
            </div>       
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <a href="/consults/create/{{$avaliation['id']}}" class="btn btn-dark">Nova Consulta</a>
            <br>
            @if((count($consults) == '0'))
                <br>
                <h6>Não existem consultas cadastradas!!!</h6>
            @else    
            <br>
            <table class="table table-stripped " >
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Data Consulta</th>
                    <th scope="col">Ações</th>
                    <th scope="col">Prontuário</th>
                    <th scope="col">Exercícios</th>
                    
                    </tr>
                </thead>
                <tbody>
                    @php
                        $num = 1;
                    @endphp

                    @foreach($consults as $consult)
                    <tr>
                        <td>
                            @php
                                print($num);
                                $num +=1;
                            @endphp
                        </td>
                        <td>
                            @php
                                $data = new DateTime($consult->date_consult);
                                echo $data->format('d-m-Y');
                            @endphp
                        </td>
                        <td>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editar_consult_modal" data-id="{{$consult->id}}"><i class="bi-pencil-fill"></i></button>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#excluir_consult_modal" data-id="{{$consult->id}}"><i class="bi-x-square" style="color:red;"></i></button>
                        </td>
                        <td>
                            <a href="/prontuaries/{{ $consult->id }}" class="btn" data-toggle="tooltip" data-placement="top" title="Prontuário "><i class="bi bi-file-earmark-text"></i></a>
                        </td>
                        <td>
                            <a href="/consult_exercises/{{ $consult->id }}" class="btn" data-toggle="tooltip" data-placement="top" title="Prontuário "> <i class="bi bi-bicycle"></i></a>
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>    

 

<!-- Modal Editar Consulta -->
<form id = "deleteForm" action=" {{ route('consults.update', $consult->id)}}" method="put" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="UPDATE">
    @csrf
    <div class="modal fade" id="editar_consult_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Data Consulta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="date" name="date_consult" id="date_consult" value="{{$consult->date_consult}}">
                </div>
                <input type="hidden" name="consult_id" id="consult_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Editar</button>
                </div>
            </div>
        </div>
    </div>
</form>    
   
<script type="text/javascript">
$('#editar_consult_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#consult_id').val(recipientId)
    })  
</script>    


<!-- Modal Excluir Avaliação -->
<form id = "deleteForm" action=" {{ route('consults.destroy', $consult->id)}}" method="get" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="DELETE">
    @csrf
    <div class="modal fade" id="excluir_consult_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir?</p>
                </div>
                <input type="hidden" name="consult_id" id="consult_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </div>
        </div>
    </div>
</form>    
<script type="text/javascript">
$('#excluir_consult_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#consult_id').val(recipientId)
    })  
</script>    

@endif
@endsection