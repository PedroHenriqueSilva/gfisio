@extends('layouts.main')

@section('title', 'Information Histórico Pregresso')

@section('content')
<div class="pagetitle">
    <h1>Histórico Pregresso</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/{{$avaliationOwtner['id']}}">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/{{$avaliationOwtner['id']}}">Avaliação</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/{{$avaliation['id']}}">Avaliação Info</a></li>
            <li class="breadcrumb-item active" aria-current="page">Visualizar Histórico Pregresso</li>
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
                            <td class="col-md-2"><b>Bebe:</b>&nbsp {{ $past->drink }}</td>
                            @if(!empty($past->drink_descr))
                                <td class="col-md-8"><b>Descrição:</b>&nbsp {{ $past->drink_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Fuma:</b>&nbsp {{ $past->smoke }}</td>
                            @if(!empty($past->smoke_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $past->smoke_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif  
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Diabetes:</b>&nbsp {{ $past->diabetes }}</td>
                            @if(!empty($past->diabetes_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $past->diabetes_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>HAS:</b>&nbsp {{ $past->has }}</td>
                            @if(!empty($past->has_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $past->has_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Colesterol:</b>&nbsp {{ $past->cholesterol }}</td>
                            @if(!empty($past->cholesterol_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $past->cholesterol_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Cardíaca:</b>&nbsp {{ $past->heart }}</td>
                            @if(!empty($past->heart_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $past->heart_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Pulmonar:</b>&nbsp {{ $past->pulmonary }}</td>
                            @if(!empty($past->pulmonary_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $past->pulmonary_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif  
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Renal:</b>&nbsp {{ $past->renal }}</td>
                            @if(!empty($past->renal_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $past->renal_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif  
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Gastrointestinal:</b>&nbsp {{ $past->gastrointestinal }}</td>
                            @if(!empty($past->gastrointestinal_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $past->gastrointestinal_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Neurológica:</b>&nbsp {{ $past->neurological }}</td>
                            @if(!empty($past->neurological_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $past->neurological_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Psicológica:</b>&nbsp {{ $past->psychological }}</td>
                            @if(!empty($past->psychological_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $past->psychological_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Reumatológica:</b>&nbsp {{ $past->rheumatological}}</td>
                            @if(!empty($past->rheumatological_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $past->rheumatological_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Vascular:</b>&nbsp {{ $past->vascular }}</td>
                            @if(!empty($past->vascular_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $past->vascular_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Mamária:</b>&nbsp {{ $past->mammary }}</td>
                            @if(!empty($past->mammary_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $past->mammary_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Útero:</b>&nbsp {{ $past->uterus }}</td>
                            @if(!empty($past->uterus_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $past->uterus_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Escroto:</b>&nbsp {{ $past->scrotum }}</td>
                            @if(!empty($past->scrotum_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $past->scrotum_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Tireóide:</b>&nbsp {{ $past->thyroid }}</td>
                            @if(!empty($past->thyroid_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $past->thyroid_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Covid-19:</b>&nbsp {{ $past->covid19 }}</td>
                            @if(!empty($past->covid19_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $past->covid19_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Fratura:</b>&nbsp {{ $past->fracture }}</td>
                            @if(!empty($past->fracture_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $past->fracture_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Histórico de CA:</b>&nbsp {{ $past->historical_ca }}</td>
                            @if(!empty($past->hist_ca_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $past->hist_ca_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Histórico de familiares com CA:</b>&nbsp {{ $past->hist_family_ca }}</td>
                            @if(!empty($past->hist_family_ca_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $past->hist_family_ca_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4"><b>Histórico de cirurgias:</b>&nbsp {{ $past->historical_surgeries }}</td>
                            @if(!empty($past->hist_surgeries_descr))
                            <td class="col-md-4"><b>Descrição:</b>&nbsp {{ $past->hist_surgeries_descr }}</td> 
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
            <a href="/pdfs/pdf_past/{{$past->id}}" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Imprimir Avaliação geral">Imprimir</a>
            <a href="/past/edit/{{$past->id}}" class="btn btn-dark"> Editar</a> 
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir_historico_pregresso_modal" data-id="{{$past->id}}">Excluir</button>
        </div> 
    </div>  
</section>     
<br><br>


<!-- Modal Excluir Histórico Pregresso-->
@if($past != "false")
<form id = "deleteForm" action=" {{ route('past.destroy', $past['id'])}}" method="get" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="DELETE">
    @csrf
    <div class="modal fade" id="excluir_historico_pregresso_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir?</p>
                </div>
                <input type="hidden" name="past_id" id="past_id">
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
$('#excluir_historico_pregresso_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#past_id').val(recipientId)
    })      
</script>    

@endsection