@extends('layouts.main')

@section('title', 'Edit Prontuary')

@section('content')
<div class="pagetitle">
    <h1>Editar Prontuário</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/{{$avaliationOwtner['id']}}">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/{{$avaliationOwtner['id']}}">Avaliação</a></li>
            <li class="breadcrumb-item"><a href="/consults/{{$avaliation['id']}}">Consulta</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Prontuário</li>
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
                            <b>Data Avaliação:</b> &nbsp  {{ date( 'd/m/Y' , strtotime($avaliation['date_aval']))}}
                        </div> 
                        <div class="col-lg-4">
                            <b>Data Consulta:</b> &nbsp {{ date( 'd/m/Y' , strtotime($consult['date_consult']))}}
                        </div> 
                    </div>                             
                </div>
            </div>       
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="/prontuaries/update/{{$prontuary->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-13">
                        <div class="row">
                            <label for="title"><b>Descrição últimos dias:</b></label> 
                        </div>

                        <textarea class="form-control @error('description_last_days') is-invalid @enderror" id="description_last_days" name="description_last_days"> {{$prontuary->description_last_days}} </textarea>
                            @error('description_last_days')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                            @enderror  
                        
                    </div>
                </div>  
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                        <label for="title"><b>Nível de Dor:</b></label> 
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pain_level" id="one" value="1" {{ $prontuary->pain_level == "1" ? 'checked' : '' }}>
                            <label class="form-check-label" for="one">
                                1 
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pain_level" id="two" value="2" {{ $prontuary->pain_level == "2" ? 'checked' : '' }} >
                            <label class="form-check-label" for="two">
                            2
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pain_level" id="three" value="3" {{ $prontuary->pain_level == "3" ? 'checked' : '' }}  >
                            <label class="form-check-label" for="three">
                                3
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pain_level" id="four" value="4" {{ $prontuary->pain_level == "4" ? 'checked' : '' }}  >
                            <label class="form-check-label" for="four">
                                4
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pain_level" id="five" value="5" {{ $prontuary->pain_level == "5" ? 'checked' : '' }}  >
                            <label class="form-check-label" for="five">
                                5 
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pain_level" id="six" value="6" {{ $prontuary->pain_level == "6" ? 'checked' : '' }} >
                            <label class="form-check-label" for="six">
                                6 
                            </label>
                        </div>
                    
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pain_level" id="seven" value="7" {{ $prontuary->pain_level == "7" ? 'checked' : '' }}  >
                            <label class="form-check-label" for="seven">
                                7
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pain_level" id="eight" value="8" {{ $prontuary->pain_level == "8" ? 'checked' : '' }} >
                            <label class="form-check-label" for="eight">
                                8
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pain_level" id="nine" value="9" {{ $prontuary->pain_level == "9" ? 'checked' : '' }} >
                            <label class="form-check-label" for="nine">
                                9
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pain_level" id="ten" value="10" {{ $prontuary->pain_level == "10" ? 'checked' : '' }} >
                            <label class="form-check-label" for="ten">
                                10
                            </label>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="row">
                        <label for="title"><b>Qualidade da Dor:</b></label> 
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pain_quality" id="twinge" value="pontada" {{ $prontuary->pain_quality == "pontada" ? 'checked' : '' }}>
                            <label class="form-check-label" for="twinge">
                                Pontada 
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pain_quality" id="shock" value="choque" {{ $prontuary->pain_quality == "choque" ? 'checked' : '' }} >
                            <label class="form-check-label" for="shock">
                            Choque
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pain_quality" id="burn" value="queimor" {{ $prontuary->pain_quality == "queimor" ? 'checked' : '' }}  >
                            <label class="form-check-label" for="burn">
                                Queimor
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pain_quality" id="weary" value="cansada" {{ $prontuary->pain_quality == "cansada" ? 'checked' : '' }}  >
                            <label class="form-check-label" for="weary">
                                Cansada
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pain_quality" id="grip" value="aperto" {{ $prontuary->pain_quality == "aperto" ? 'checked' : '' }}  >
                            <label class="form-check-label" for="grip">
                                Aperto 
                            </label>
                        </div>
                    </div>
                </div> 
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <label for="title"><b>Melhoria de Função:</b></label> 
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="function_improvement" id="yes" value="sim" {{ $prontuary->function_improvement == "sim" ? 'checked' : '' }} >
                            <label class="form-check-label" for="yes">
                                Sim 
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="function_improvement" id="no" value="não" {{ $prontuary->function_improvement == "não" ? 'checked' : '' }} >
                            <label class="form-check-label" for="no">
                            Não
                            </label>
                        </div>
                    </div>
                </div>  
                <br>
                <div class="row" >
                    <div class="col-md-8 offset-md-2 text-center">   
                        <input type="submit" class="btn btn-dark" value="Editar">
                    </div>
                </div>      
            </form> 
        </div>
    </div>
</section>    


@endsection