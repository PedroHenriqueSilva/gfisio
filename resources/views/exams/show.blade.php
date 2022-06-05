@extends('layouts.main')

@section('title', 'Exams')

@section('content')
<div class="pagetitle">
    <h1>Exames</h1>
    <nav aria-label="breadcrumb" >
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/{{$avaliationOwtner['id']}}">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/{{$avaliation['id']}}">Avaliação Info</a></li>
            <li class="breadcrumb-item active" aria-current="page">Exames Cadastrados</li>
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
                            <b>Data Nasc:</b> &nbsp {{date( 'd-m-Y' , strtotime($avaliationOwtner['date_nasc']))}} 
                        </div> 
                    </div>                             
                </div>
            </div>       
        </div>
    </div>
    <div class="row">
        @if((count($exams) == '0'))
            <div class="col-lg-12">
                <h6>Não existem exames cadastrados!</h6>
            </div>
        @else  
            @foreach($exams as $exam)
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <b>Exame:&nbsp</b> {{$exam->name}}&nbsp&nbsp&nbsp
                                </div>
                                <div class="col-lg-4">
                                <b>Imagem:&nbsp</b>
                                    <a href="/img/patients/{{ $exam->image }}">    
                                        <img src="/img/patients/{{ $exam->image }}" alt="{{ $exam->name }}" class="img-preview">
                                    </a>
                                </div>
                                <div class="col-lg-4">
                                    <b>Ações:&nbsp</b> 
                                    <a href="/exams/edit/{{ $exam->id }}" class="btn" data-toggle="tooltip" data-placement="top" title="Editar"><i class="bi-pencil-fill" style="color:#47748b;"></i></a>
                                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#excluir_exam_modal" data-id="{{$exam->id}}"><i class="bi-x-square" style="color:red;"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach    
         
    </div>
</section>    

<!-- Modal Excluir Exame-->
<form id = "deleteForm" action=" {{ route('exam.destroy', $exam->id)}}" method="get" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="DELETE">
    @csrf
    <div class="modal fade" id="excluir_exam_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Exame</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir?</p>
                </div>
                <input type="hidden" name="exam_id" id="exam_id">
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
$('#excluir_exam_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#exam_id').val(recipientId)
    })      
</script>    
@endsection            