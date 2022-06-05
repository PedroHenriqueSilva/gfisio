@extends('layouts.main')

@section('title', 'Information Redflags')

@section('content')
<div class="pagetitle">
    <h1>Redflags</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/{{$avaliationOwtner['id']}}">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/{{$avaliationOwtner['id']}}">Avaliação</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/{{$avaliation['id']}}">Avaliação Info</a></li>
            <li class="breadcrumb-item active" aria-current="page">Visualizar Redflags</li>
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
        <div class="col-lg-12">
            <table class="table ">
                    
                    <tbody>
                        <tr class="col-md-10">
                            <td class="col-md-2"><b>Febre Ultimamente:</b>&nbsp {{ $redflag->fever }}</td>
                            @if(!empty($redflag->fever_descr))
                                <td class="col-md-8"><b>Descrição:</b>&nbsp {{ $redflag->fever_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Caído sem Motivos:</b>&nbsp {{ $redflag->fallen }}</td>
                            @if(!empty($redflag->fallen_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $redflag->fallen_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif  
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Tonturas:</b>&nbsp {{ $redflag->dizziness }}</td>
                            @if(!empty($redflag->dizziness_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $redflag->dizziness_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Dificuldade ao andar:</b>&nbsp {{ $redflag->dif_walking }}</td>
                            @if(!empty($redflag->dif_walking_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $redflag->dif_walking_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Dor Notura:</b>&nbsp {{ $redflag->notura_pain }}</td>
                            @if(!empty($redflag->notura_pain_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $redflag->notura_pain_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Rigidez ao levantar:</b>&nbsp {{ $redflag->stiffness }}</td>
                            @if(!empty($redflag->stiffness_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $redflag->stiffness_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif  
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Perda de peso sem motivos:</b>&nbsp {{ $redflag->weight_loss }}</td>
                            @if(!empty($redflag->weight_loss_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $redflag->weight_loss_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif  
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Desmaios sem motivos:</b>&nbsp {{ $redflag->faint }}</td>
                            @if(!empty($redflag->faint_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $redflag->faint_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Formigamento Corporal:</b>&nbsp {{ $redflag->formication }}</td>
                            @if(!empty($redflag->formication_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $redflag->formication_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Cansaço/Fadiga anormal:</b>&nbsp {{ $redflag->tiredness }}</td>
                            @if(!empty($redflag->tiredness_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $redflag->tiredness_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Dor que não passa:</b>&nbsp {{ $redflag->endless_pain}}</td>
                            @if(!empty($redflag->endless_pain_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $redflag->endless_pain_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Disfunções urinárias:</b>&nbsp {{ $redflag->urinary_dysfunction }}</td>
                            @if(!empty($redflag->urinary_dysfunction_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $redflag->urinary_dysfunction_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Disfunções intestinais:</b>&nbsp {{ $redflag->intestinal_dysfunction }}</td>
                            @if(!empty($redflag->intestinal_dysfunction_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $redflag->intestinal_dysfunction_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Disfunções sexuais:</b>&nbsp {{ $redflag->sexual_dysfunction }}</td>
                            @if(!empty($redflag->sexual_dysfunction_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $redflag->sexual_dysfunction_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                    </tbody>        
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 offset-md-1 text-center"  > 
            <a href="/pdfs/pdf_redflag/{{$redflag->id}}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Imprimir Avaliação geral">Imprimir</a>
            <a href="/redflags/edit/{{$redflag->id}}" class="btn btn-secondary" > Editar</a> 
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir_redflag_modal" data-id="{{$redflag->id}}">Excluir</button>
        </div> 
    </div> 
</section>    
<br><br><br>
<!-- Modal Excluir Avaliação Geral-->
@if($redflag != "false")
<form id = "deleteForm" action=" {{ route('redflag.destroy', $redflag['id'])}}" method="get" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="DELETE">
    @csrf
    <div class="modal fade" id="excluir_redflag_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir?</p>
                </div>
                <input type="hidden" name="redflag_id" id="redflag_id">
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
$('#excluir_redflag_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#redflag_id').val(recipientId)
    })      
</script>    

@endsection