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
<div class="col-md-13">
    <a href="" class="btn btn-dark" data-placement="top" title="Deletar Consulta" data-toggle="modal" data-target=".bd-example-modal-xl" data-id="" > Buscar Exercícios</a>
</div>
<br>
<br>
<br>
<!-- Modal Excluir Avaliação -->
<div class="modal fade bd-example-modal-xl " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="row">
            <div class="col-md-12" id="info">
                <center><h5>Exercícios Cadastrados</h5></center>
                <div id ="cards_container" class="row">
                    @foreach($exercises as $exercise)
                        <div class="card col-md-3" style="width: 15rem;">
                            <br>
                            <a href="/videos/exercise_video/{{ $exercise->exercise_video}}">
                                <video src="/videos/exercise_video/{{ $exercise->exercise_video}}" alt="{{ $exercise->exercise_video}}" class="video-preview" id="video_preview_modal">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{$exercise->exercise_name}}</h5>
                            
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$exercise->exercise_body_area}}</li>
                                
                            </ul>
                            <div class="card-body">
                                <a href="#" class="card-link">Adicionar</a>
                                <a href="#" class="card-link">Remover</a>
                            </div>
                        </div>
                    @endforeach
                </div>    
            </div>
        </div>
        <br>
    </div>
  </div>
<br>
<br>  
</div>

<script type="text/javascript">
$('#search_exercices_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#consult_id').val(recipientId)
    })  
</script>    
  

@endsection