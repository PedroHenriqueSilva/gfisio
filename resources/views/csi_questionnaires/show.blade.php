@extends('layouts.main')

@section('title', 'Questionário CSI')

@section('content')
<div class="pagetitle">
    <h1>Questionário CSI</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/{{$avaliationOwtner['id']}}">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/{{$avaliation['id']}}">Avaliação Info</a></li>
            <li class="breadcrumb-item active" aria-current="page">Questionário CSI</li>
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
            @if ($csi_questionnaire == 'false')
                <form action="/csi_questionnaire/store/{{$questionnaire['id']}}" method="POST" enctype="multipart/form-data">
                    @csrf    
                     
                    <table class="table table-light"> 
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group col-md-4">
                                        <label for="title">CSI imagem:</label>
                                        <input type="file" class="form-control-file @error('csi_img') is-invalid @enderror" id="csi_img" name="csi_img"> 
                                        @error('csi_img')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror  
                                    </div>    
                                </td>
                                <td>
                                    
                                <div class="form-group col-md-4">
                                    <label for="title">Score:</label>
                                    <input type="text"  class="form-control @error('csi_score') is-invalid @enderror" id="csi_score" name="csi_score"  value="{{old('csi_score')}}"> 
                                    @error('csi_score')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror  
                                </div>
                        
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-2 offset-md-5">   
                            <input type="submit" class="btn btn-dark" value="Salvar">
                        </div>   
                    </div>   
                </form>
            @else
                <table class="table">
                    <thead>
                        <th>Questionário CSI</th>
                        <th>Score</th>
                        <th>Ações</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="/img/csi_questionnaire/{{$csi_questionnaire['csi_img']}}">    
                                    <img src="/img/csi_questionnaire/{{$csi_questionnaire['csi_img']}}" alt="{{$csi_questionnaire['csi_img']}}" class="img-preview">
                                </a>
                            </td>
                            @if($csi_questionnaire['csi_score']>=40)
                            <td style=padding-top:15px;color:red;>{{$csi_questionnaire['csi_score']}} pontos</td>
                            @else
                            <td style=padding-top:15px;color:blue;>{{$csi_questionnaire['csi_score']}} pontos</td>
                            @endif
                            <td style=padding-top:15px>
                                <a href="/csi_questionnaire/edit/{{$csi_questionnaire['id']}}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Editar"><i class="bi-pencil-fill"></i></a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir_csi_questionnaire_modal" data-id="{{$csi_questionnaire['id']}}"><i class="bi-x-square"></i></button>
                            </td>
                            <td>
                            </td>
                        </tr>
                    </tbody>
                </table>      
                <br>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <b>Pontuação de 25 a 100</b>
                            </div>
                            <div class="col-lg-4"><br>
                            <b>De 25 a 39:</b><p style="background-color:blue;color:white;padding-left:10px;">Sinais e Sensibilização</p>
                            </div>
                            <div class="col-lg-4"><br>
                            <b>Acima de 40:</b><p style="background-color:red;color:white;padding-left:10px;">Alerta</p>
                            </div>
                        </div>
                        
                    </div>
                </div>

        </div>
    </div>
</section>

 
<!-- Modal Excluir CSI Questionário-->
<form id = "deleteForm" action=" {{ route('csi_questionnaire.destroy', $csi_questionnaire['id'])}}" method="get" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="DELETE">
    @csrf
    <div class="modal fade" id="excluir_csi_questionnaire_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Questionário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir?</p>
                </div>
                <input type="hidden" name="csi_questionnaire_id" id="csi_questionnaire_id">
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
$('#excluir_csi_questionnaire_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#csi_questionnaire_id').val(recipientId)
    })      
</script>    
@endsection