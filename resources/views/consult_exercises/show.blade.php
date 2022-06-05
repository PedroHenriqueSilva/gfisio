@extends('layouts.main')

@section('title', 'Consults Exercises')

@section('content')
<div class="pagetitle">
    <h1>Exercícios Consultas</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li> 
            <li class="breadcrumb-item"><a href="/users/show/ @foreach($data as $d) {{$d['id']}} @endforeach">Paciente</a></li>
            <li class="breadcrumb-item"><a href="">Avaliação</a></li>
            <li class="breadcrumb-item"><a href="">Consulta</a></li>
            <li class="breadcrumb-item active" aria-current="page">Exercícios Consulta</li>
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
                            <b>Nome:</b>&nbsp  @foreach($data as $d) {{$d['name']}} @endforeach
                        </div>
                        <div class="col-lg-4">
                            <b>Data Avaliação:</b> &nbsp  @foreach($data as $d){{ date( 'd-m-Y' , strtotime($d['date_nasc']))}} @endforeach
                        </div> 
                        <div class="col-lg-4">
                            <b>Data Consulta:</b> &nbsp   @foreach($data as $d){{ date( 'd-m-Y' , strtotime($d['date_consult']))}} @endforeach
                        </div> 
                    </div>                             
                </div>
            </div>       
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
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
                                        <select name="exercise_id" class="form-control @error('exercise_id') is-invalid @enderror" >
                                            <option value="">-- choose exercise --</option>
                                            @foreach ($exercises as $exercise)
                                                <option value="{{ $exercise->id }}">
                                                    {{ $exercise->exercise_name }} 
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('exercise_id')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror  
                                    </td>
                                    <td>
                                        <input type="text" class="form-control @error('serie') is-invalid @enderror" id="serie" name="serie" value="{{old('serie')}}">
                                        @error('serie')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror                                   
                                    </td>
                                    <td>
                                        <input type="text" class="form-control @error('repeat') is-invalid @enderror" id="repeat" name="repeat" value="{{old('repeat')}}">
                                        @error('repeat')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror  
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
            @if (!empty($consult_exercises))
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
                            <th>Ações</th>
                            <th></th>
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
                                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#add_execucao_modal" data-id="{{$consult_exercise['id']}}"><i class="bi-plus-circle" style="color:blue;"></i></button>
                                @else    
                                    {{$consult_exercise['execution']}}
                                @endif
                                </td>
                                <td>
                                    <a href="/consult_exercises/edit/{{$consult_exercise['id']}}" class="btn" data-placement="top" title="Editar Consulta_Exercício" > <i class="bi-pencil-fill"></i></a>     
                                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#excluir_consult_exercise_modal" data-id=""><i class="bi-x-square" style="color:red;"></i></button>
                                </td>
                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    
                </div>
            </div>
        </div>
        <br>
    </div>
</section>
<br><br>
<!-- Modal Adicionar Execução -->
<form id = "deleteForm" action="{{ route('consult_exercises.add_execution', $consult_exercise['id'])}} " method="put" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="UPDATE">
    @csrf
    <div class="modal fade" id="add_execucao_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Adicionar Execução</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <textarea name="execution"  id="execution" style="width:265px;" value="{{$consult_exercise['execution']}}">  </textarea>
                </div>
                <input type="hidden" name="consult_exercise_id" id="consult_exercise_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Adicionar</button>
                </div>
            </div>
        </div>
    </div>
</form>    


<script type="text/javascript">
$('#add_execucao_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#consult_exercise_id').val(recipientId)
    })  
</script>    

<!-- Modal Excluir Exercício Consulta -->
<form id = "deleteForm" action=" {{ route('consult_exercises.destroy', $consult_exercise['id'])}}" method="get" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="DELETE">
    @csrf
    <div class="modal fade" id="excluir_consult_exercise_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Adicionar Execução</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <p>Deseja realmente excluir?</p>
                </div>
                <input type="hidden" name="consult_exercise_id" id="consult_exercise_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </div>
        </div>
    </div>
</form>  


<script type="text/javascript">
$('#excluir_consult_exercise_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#consult_exercise_id').val(recipientId)
    })  
</script>
@endif
@endsection  