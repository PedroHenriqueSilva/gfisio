@extends('layouts.main')

@section('title', 'Questionário BPCS')

@section('content')
<div class="pagetitle">
    <h1>Questionário BPCS</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/{{$avaliationOwtner['id']}}">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/{{$avaliation['id']}}">Avaliação Info</a></li>
            <li class="breadcrumb-item active" aria-current="page">Questionário BPCS</li>
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
            @if ($bpcs_questionnaire == 'false')
                <form action="/bpcs_questionnaire/store/{{$questionnaire['id']}}" method="POST" enctype="multipart/form-data">
                @csrf    
                    <table class="table table-light"> 
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group col-md-4">
                                        <label for="title">BPCS imagem:</label>
                                        <input type="file" class="form-control-file @error('bpcs_img') is-invalid @enderror" id="bpcs_img" name="bpcs_img"> 
                                        @error('bpcs_img')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror  
                                    </div>    
                                </td>
                                <td>
                                    
                                <div class="form-group col-md-4">
                                    <label for="title">Score:</label>
                                    <input type="text"  class="form-control @error('bpcs_score') is-invalid @enderror" id="bpcs_score" name="bpcs_score"  value="{{old('bpcs_score')}}"> 
                                    @error('bpcs_score')
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
                        <div class="col-md-2 offset-md-6">   
                            <input type="submit" class="btn btn-dark" id="btn_salvar" value="Salvar">
                        </div>   
                    </div>   
                </form>
            @else   
            <table class="table"> 
                <thead>
                    <th>Questionário BPCS</th>
                    <th>Score</th>
                    <th>Ações</th>
                    <th></th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <a href="/img/bpcs_questionnaire/{{$bpcs_questionnaire['bpcs_img']}}">    
                                <img src="/img/bpcs_questionnaire/{{$bpcs_questionnaire['bpcs_img']}}" alt="{{$bpcs_questionnaire['bpcs_img']}}" class="img-preview">
                            </a>
                        </td>
                        @if($bpcs_questionnaire['bpcs_score']>=0 && $bpcs_questionnaire['bpcs_score']<=2)
                        <td style=padding-top:15px;color:blue;>{{$bpcs_questionnaire['bpcs_score']}} pontos</td>
                        @elseif($bpcs_questionnaire['bpcs_score']==3 or $bpcs_questionnaire['bpcs_score']==4)
                        <td style=padding-top:15px;color:orange;>{{$bpcs_questionnaire['bpcs_score']}} pontos</td>
                        @else
                        <td style=padding-top:15px;color:red;>{{$bpcs_questionnaire['bpcs_score']}} pontos</td>
                        @endif
                        <td style=padding-top:15px>
                            <a href="/bpcs_questionnaire/edit/{{$bpcs_questionnaire['id']}}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Editar"><i class="bi-pencil-fill"></i></a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir_bpcs_questionnaire_modal" data-id="{{$bpcs_questionnaire['id']}}"><i class="bi-x-square"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>      
            <br>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <b>Pontuação de 0 a 5</b>
                        </div>
                        <div class="col-lg-4"><br>
                            <b>De 0 a 2:</b><p style="background-color:blue;color:white;padding-left:10px;">&nbsp</p>
                        </div>
                        <div class="col-lg-4"><br>
                            <b>3 e 4:</b><p style="background-color:orange;color:white;padding-left:10px;">&nbsp</p>
                        </div>
                        <div class="col-lg-4"><br>
                            <b>5:</b><p style="background-color:red;color:white;padding-left:10px;">&nbsp</p>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</section>    

<!-- Modal Excluir BPCS Questionário-->
<form id = "deleteForm" action=" {{ route('bpcs_questionnaire.destroy', $bpcs_questionnaire['id'])}}" method="get" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="DELETE">
    @csrf
    <div class="modal fade" id="excluir_bpcs_questionnaire_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir?</p>
                </div>
                <input type="hidden" name="bpcs_questionnaire_id" id="bpcs_questionnaire_id">
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
$('#excluir_bpcs_questionnaire_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#bpcs_questionnaire_id').val(recipientId)
    })      
</script>    
@endsection