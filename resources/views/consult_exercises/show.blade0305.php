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
            <div class="col-lg-3 col-md-12 col-sm-12 _leftNav mb-30">
                <div class="card leftNav cate-sect mb-30">
                    <h5>Refine By:<span class="_t-item">(0 items)</span></h5>
                    <div class="col-12 p-0" id="catFilters"></div>
                </div>
       
                <div class="card leftNav cate-sect">

                    <div class="accordion" id="accordionExample">
                        <div class="card-header" id="headingTwo">
                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Área do Corpo</button>
                        </div>

                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"   data-parent="#accordionExample">
                      
                            <div class="panel-body">
                                
                                <div class="form-check">
                                        <input class="form-check-input category_checkbox" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Cervical
                                        </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Ombro
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Torácica e Lombar
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Cotovelo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Punho e Mão 
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Quadril e Pelve
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Joelho
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Pé e Tornozelo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Face
                                    </label>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card leftNav cate-sect">
                    <div class="accordion" id="accordionExample">
                        <div class="card-header" id="headingThree">
                            <button class="btn btn-link" type="button" data-toggle="collapse"  data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                Objetivo</button>
                               
                        </div>

                        <div id="collapseThree" class="collapse show" aria-labelledby="headingThree"  data-parent="#accordionExample">
                       
                            <div class="panel-body">
                            
                                <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Fortalecimento
                                            </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Mobilidade
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Propriepção
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Cardiorrespiratório
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Neurodinâmica 
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Aquecimento
                                    </label>
                                </div>
                            
                            </div>
                        </div>
                    </div>    
                </div>
                 
                <div class="card leftNav cate-sect">
                    <div class="accordion" id="accordionExample">
                        <div class="card-header" id="headingFour">
                            <button class="btn btn-link" type="button" data-toggle="collapse"  data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                Equipamento</button>
                               
                        </div>

                        <div id="collapseFour" class="collapse show" aria-labelledby="headingFour"  data-parent="#accordionExample">
                       
                            <div class="panel-body">
                            
                                <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Anel de Pilates
                                            </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Barra
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Bastão
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Elástico
                                    </label>
                                </div>
                                                           
                            </div>
                        </div>
                    </div>    
                </div>
                
               
            </div>
        

            <div class="col-lg-9 col-md-12 col-sm-12 mb-30">
                <div class="card rightSide h-100 mb-0">
                    <h1><span class="greencolor category_name_heading"></span></h1>
                    <div class="row m-0 causes_div">

                    </div>
                </div>
            </div>

              
           
        </div>
        
            
       
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

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.category_checkbox', function () {
        
        });    

    });
</script>    

@endsection