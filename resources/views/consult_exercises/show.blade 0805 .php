@extends('layouts.main')

@section('title', 'Consults Exercises')

@section('content')
<div class="row align-items-end">
    <div class="col-md-12" id="breadcrumbs">
        <nav aria-label="breadcrumb" >
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Paciente</a></li>
                    <li class="breadcrumb-item"><a href="">Avaliação</a></li>
                    <li class="breadcrumb-item"><a href="">Consulta</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Exercícios Consulta</li>
                </ol>
        </nav>
    </div>  
</div>
<br>
<br>
<div class="col-md-13">
        <table class="table table-light">
                <tbody>
                    <tr class="col-md-10">
                        <td class="col-md-4"><b>Nome do Paciente:</b>&nbsp 
                            @foreach($data as $d) {{$d['name']}} @endforeach
                        </td>
                        <td class="col-md-2"><b>Data Avaliação:</b>&nbsp
                            @foreach($data as $d){{ date( 'd/m/Y' , strtotime($d['date_nasc']))}} @endforeach
                        </td>

                        <td class="col-md-2"><b>Data Consulta:</b>&nbsp
                            @foreach($data as $d){{ date( 'd/m/Y' , strtotime($d['date_consult']))}} @endforeach
                        </td>

                    </tr> 
                </tbody>  
        </table>
</div>
<div class="col-md-12" id="info">
        
    <form action="/consult_exercises/store/{{$id_consult}} " method="POST">
        @csrf
        
        <div class="card">
            <div class="card-header">
                Cadastrar Exercícios
            </div>

            <div class="card-body">
                <table class="table" >
                    <thead>
                    <tr>
                        <th>Exercícios</th>
                        <th>Séries</th>
                        <th>Quantidade</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                        <tr>
                            <td>
                                <select name="exercise_id" class="form-control">
                                    <option value="">-- choose exercise --</option>
                                    @foreach ($exercises as $exercise)
                                        <option value="{{ $exercise->id }}">
                                            {{ $exercise->exercise_name }} 
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="serie"  class="form-control" />
                                                                    
                            </td>
                            <td>
                                <input type="number" name="repeat"  class="form-control" />
                            
                            </td>
                            
                        </tr>
                    
                    </tbody>
                </table>

                
            </div>
            <div class="col-md-1 offset-md-5">
                    <input class="btn btn-dark" type="submit" value="Cadastrar ">
                </div>
                <br>
        </div>
        
        
        <br>
    </form>

     
    <div class="card">
            <div class="card-header">
                 Exercícios Cadastrados
            </div>

            <div class="card-body">
                <table class="table" >
                    <thead>
                    <tr>
                        <th>Exercício</th>
                        <th>Séries</th>
                        <th>Quantidade</th>
                        <th>Execução</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($consult_exercises as $consult_exercise)
                        <tr>
                            <td>
                                {{$consult_exercise['exercise_name']}}
                            </td>
                            <td>
                                {{$consult_exercise['serie']}}
                            </td>
                            <td>
                                {{$consult_exercise['repeat']}}
                            
                            </td>
                            <td>
                            @if($consult_exercise['execution'] == '')
                            <a href="" class="btn" data-placement="top" title="Adicionar Execução" data-toggle="modal" data-target="#adicionar_execucao_modal" data-id="{{$consult_exercise['id_consult_exercise']}}"> <ion-icon name="reader"></ion-icon></a>     

                            @endif
                            </td>
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                
            </div>
           
    </div>
   <br>
   <br>
</div>    
<br>
<br>

<!-- Modal Editar Avaliação -->
<form id = "deleteForm" action=" {{ route('consult_exercises.add_execution', $consult_exercise['id_consult_exercise'])}}" method="put" enctype="multipart/form-data">
    
    <div class="modal fade bd-example-modal-sm" id="adicionar_execucao_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Adicionar Execução do Exercício</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                 
                <textarea name="execution"  id="execution" style="width:265px;">  </textarea>

            </div>
            <input type="hidden" name="consult_exercise_id" id="consult_exercise_id">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-dark">Adicionar</button>
            </div>
            </div>
        </div>
    </div>  
</form>    

<script type="text/javascript">
$('#adicionar_execucao_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#consult_exercise_id').val(recipientId)
    })  
</script>    
@endsection