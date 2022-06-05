@extends('layouts.main')

@section('title', 'Questionnaire FABQ')

@section('content')
<div class="pagetitle">
    <h1>Questionário FABQ</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/{{$avaliationOwtner['id']}}">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/{{$avaliation['id']}}">Avaliação Info</a></li>
            <li class="breadcrumb-item active" aria-current="page">Questionário FABQ</li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card text-white bg-dark">
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
            @if ($fabq_questionnaire == 'false')
                <form action="/fabq_questionnaire/store/{{$questionnaire['id']}}" method="POST" enctype="multipart/form-data">
                    @csrf    
                        <table class="table table-light"> 
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group col-md-4">
                                            <label for="title">FABQ imagem:</label>
                                            <input type="file" class="form-control-file @error('fabq_img') is-invalid @enderror" id="fabq_img" name="fabq_img"> 
                                            @error('fabq_img')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror  
                                        </div>    
                                    </td>
                                    <td>
                                        
                                    <div class="form-group col-md-4">
                                        <label for="title">Score:</label>
                                        <input type="text"  class="form-control @error('fabq_score') is-invalid @enderror" id="fabq_score" name="fabq_score"  value="{{old('fabq_score')}}"> 
                                        @error('fabq_score')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror  
                                    </div>
                            
                                    </td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    <br>
                    <div class="row">
                        <div class="col-md-2 offset-md-5">   
                            <input type="submit" class="btn btn-dark"  value="Salvar">
                        </div>   
                    </div>   
                </form>
                @else
                    <table class="table"> 
                        <thead>
                            <th>Questionário FABQ</th>
                            <th>Score</th>
                            <th>Ações</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="/img/fabq_questionnaire/{{$fabq_questionnaire['fabq_img']}}">    
                                        <img src="/img/fabq_questionnaire/{{$fabq_questionnaire['fabq_img']}}" alt="{{$fabq_questionnaire['fabq_img']}}" class="img-preview">
                                    </a>
                                </td>
                                @if($fabq_questionnaire['fabq_score']>90)
                                <td style=padding-top:15px;color:blue;>{{$fabq_questionnaire['fabq_score']}} pontos</td>
                                @else
                                <td style=padding-top:15px;color:red;>{{$fabq_questionnaire['fabq_score']}} pontos</td>
                                @endif
                                <td style=padding-top:15px>
                                    <a href="/fabq_questionnaire/edit/{{$fabq_questionnaire['id']}}" class="btn btn-outline-dark" data-toggle="tooltip" data-placement="top" title="Editar"> <i class="bi-pencil-fill"></i></a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir_fabq_questionnaire_modal" data-id="{{$fabq_questionnaire['id']}}"><i class="bi-x-square"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table><br>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <b>Pontuação de 25 a 100</b>
                                </div>
                                <div class="col-lg-4"><br>
                                <b>De 25 a 39:</b><p style="background-color:blue;color:white;padding-left:10px;">&nbsp</p>
                                </div>
                                <div class="col-lg-4"><br>
                                <b>Acima de 40:</b><p style="background-color:red;color:white;padding-left:10px;">&nbsp</p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
        </div>
    </div>
</section>    

<!-- Modal Excluir FABQ Questionário-->
<form id = "deleteForm" action=" {{ route('fabq_questionnaire.destroy', $fabq_questionnaire['id'])}}" method="get" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="DELETE">
    @csrf
    <div class="modal fade" id="excluir_fabq_questionnaire_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir?</p>
                </div>
                <input type="hidden" name="fabq_questionnaire_id" id="fabq_questionnaire_id">
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
$('#excluir_fabq_questionnaire_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#fabq_questionnaire_id').val(recipientId)
    })      
</script>    
@endsection