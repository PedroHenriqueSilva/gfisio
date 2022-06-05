@extends('layouts.main')

@section('title', 'Questionário ETC')

@section('content')
<div class="pagetitle">
    <h1>Questionário ETC</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/{{$avaliationOwtner['id']}}">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/{{$avaliation['id']}}">Avaliação Info</a></li>
            <li class="breadcrumb-item active" aria-current="page">Questionário ETC</li>
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
            @if ($etc_questionnaire == 'false')
                <form action="/etc_questionnaire/store/{{$questionnaire['id']}}" method="POST" enctype="multipart/form-data">
                    @csrf    
                    <br>  
                    <table class="table table-light"> 
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group col-md-4">
                                        <label for="title">ETC imagem:</label>
                                        <input type="file" class="form-control-file @error('etc_img') is-invalid @enderror" id="etc_img" name="etc_img"> 
                                        @error('etc_img')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror  
                                    </div>    
                                </td>
                                <td>
                                    
                                <div class="form-group col-md-4">
                                    <label for="title">Score:</label>
                                    <input type="text"  class="form-control @error('etc_score') is-invalid @enderror" id="etc_score" name="etc_score"  value="{{old('etc_score')}}"> 
                                    @error('etc_score')
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
                            <input type="submit" class="btn btn-dark" value="Salvar">
                        
                        </div>   
                    </div>   
                </form>
            @else
            <table class="table"> 
                <thead>
                    <th>Questionário ETC</th>
                    <th>Score</th>
                    <th>Ações</th>
                    <th></th>
                </thead>
                <tbody>
                
                    <tr >
                        <td>
                            <a href="/img/etc_questionnaire/{{$etc_questionnaire['etc_img']}}">    
                                <img src="/img/etc_questionnaire/{{$etc_questionnaire['etc_img']}}" alt="{{$etc_questionnaire['etc_img']}}" class="img-preview">
                            </a>
                        </td>
                        @if($etc_questionnaire['etc_score']>=17 && $etc_questionnaire['etc_score']<=30)
                        <td style=padding-top:15px;color:blue;>{{$etc_questionnaire['etc_score']}} pontos</td>
                        @elseif($etc_questionnaire['etc_score']>=31 && $etc_questionnaire['etc_score']<=36)
                        <td style=padding-top:15px;color:orange;>{{$etc_questionnaire['etc_score']}} pontos</td>
                        @else
                        <td style=padding-top:15px;color:red;>{{$etc_questionnaire['etc_score']}} pontos</td>
                        @endif
                        <td style=padding-top:15px>
                            <a href="/etc_questionnaire/edit/{{$etc_questionnaire['id']}}" class="btn btn-outline-dark" data-toggle="tooltip" data-placement="top" title="Editar"> <i class="bi-pencil-fill"></i></a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir_etc_questionnaire_modal" data-id="{{$etc_questionnaire['id']}}"><i class="bi-x-square"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table><br>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <b>Pontuação de 17 a 68</b>
                        </div>
                        <div class="col-lg-4"><br>
                        <b>De 17 a 30:</b><p style="background-color:blue;color:white;padding-left:10px;">&nbsp</p>
                        </div>
                        <div class="col-lg-4"><br>
                        <b>De 31 a 36:</b><p style="background-color:orange;color:white;padding-left:10px;">&nbsp</p>
                        </div>
                        <div class="col-lg-4"><br>
                        <b>Acima de 37:</b><p style="background-color:red;color:white;padding-left:10px;">&nbsp</p>
                        </div>
                    </div>
                    
                </div>
            </div> 
        </div>
    </div>
</section>    

<!-- Modal Excluir ETC Questionário-->
<form id = "deleteForm" action=" {{ route('etc_questionnaire.destroy', $etc_questionnaire['id'])}}" method="get" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="DELETE">
    @csrf
    <div class="modal fade" id="excluir_etc_questionnaire_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir?</p>
                </div>
                <input type="hidden" name="etc_questionnaire_id" id="etc_questionnaire_id">
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
$('#excluir_etc_questionnaire_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#etc_questionnaire_id').val(recipientId)
    })      
</script>    
@endsection