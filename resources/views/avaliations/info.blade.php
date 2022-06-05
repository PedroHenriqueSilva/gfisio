@extends('layouts.main')

@section('title', 'Avaliações')

@section('content')
<div class="pagetitle">
    <h1>Avaliação</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/patients">Pacientes</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/{{$avaliationOwtner['id']}}">Avaliação</a></li>
            <li class="breadcrumb-item active" aria-current="page">Criar Avaliação</li>
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
            <div class="card">
                <div class="card-body">
                 <!-- Default Tabs -->
                <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100 active" id="geral-tab" data-bs-toggle="tab" data-bs-target="#geral-justified" type="button" role="tab" aria-controls="geral" aria-selected="true">Geral</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="historic_pregress-tab" data-bs-toggle="tab" data-bs-target="#historic_pregress-justified" type="button" role="tab" aria-controls="historic_pregress" aria-selected="false">Histórico Pregresso</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="redflags-tab" data-bs-toggle="tab" data-bs-target="#redflags-justified" type="button" role="tab" aria-controls="redflags" aria-selected="false">Redflags</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="historic-tab" data-bs-toggle="tab" data-bs-target="#historic-justified" type="button" role="tab" aria-controls="historic" aria-selected="false">Histórico</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="subjective-tab" data-bs-toggle="tab" data-bs-target="#subjective-justified" type="button" role="tab" aria-controls="subjective" aria-selected="false">Subjetiva</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="objective-tab" data-bs-toggle="tab" data-bs-target="#objective-justified" type="button" role="tab" aria-controls="objective" aria-selected="false">Objetiva</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="questionnaires-tab" data-bs-toggle="tab" data-bs-target="#questionnaires-justified" type="button" role="tab" aria-controls="questionnaires" aria-selected="false">Questionários</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="exams-tab" data-bs-toggle="tab" data-bs-target="#exams-justified" type="button" role="tab" aria-controls="exams" aria-selected="false">Exames</button>
                    </li>
                </ul>

                <div class="tab-content pt-2" id="myTabjustifiedContent">
                    <!-- Geral -->
                    <div class="tab-pane fade show active" id="geral-justified" role="tabpanel" aria-labelledby="geral-tab">
                        @if($avaliationGeneral == "false")
                        <br>
                        <form action="/general/store/{{$avaliation['id']}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row" id="info">
                                    <div class="col-md-2">    
                                        <div class="form-group" >
                                            <label for="title">Idade:</label>
                                            <input type="number"  class="form-control @error('age') is-invalid @enderror" id="age" name="age" min="0" value="{{old('age')}}">
                                            @error('age')
                                            <div class="invalid-feedback">
                                                    {{$message}}
                                            </div>
                                            @enderror   
                                        </div>
                                    </div>
                                    <div class="col-md-2">    
                                        <div class="form-group" >
                                            <label for="title">Peso:</label>
                                            <input type="number"  class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" min="0" step="0.01"value="{{old('weight')}}" >
                                            @error('weight')
                                            <div class="invalid-feedback">
                                                    {{$message}}
                                            </div>
                                            @enderror   
                                        </div>   
                                    </div>
                                    <div class="col-md-2">    
                                        <div class="form-group" >
                                            <label for="title">Altura:</label>
                                            <input type="number"  class="form-control @error('height') is-invalid @enderror" id="height" name="height" min="0" step="0.01" value="{{old('height')}}">
                                            @error('height')
                                            <div class="invalid-feedback">
                                                    {{$message}}
                                            </div>
                                            @enderror   
                                        </div>   
                                    </div>
                                    <div class="col-md-2">    
                                        <div class="form-group" >
                                            <label for="title">IMC:</label>
                                            <input type="number"  class="form-control @error('imc') is-invalid @enderror" id="imc" name="imc" min="0" step="0.01" value="{{old('imc')}}" >  
                                            @error('imc')
                                            <div class="invalid-feedback">
                                                    {{$message}}
                                            </div>
                                            @enderror   
                                        </div>   
                                    </div>
                            </div>
                            <br>
                            <div class="row" id="info">
                                <div class="col-md-6">
                                    <label for="title">Descrição do trabalho:</label>
                                    <textarea class="form-control @error('job_description') is-invalid @enderror" id="job_description" name="job_description"> {{old('job_description')}}</textarea>
                                    @error('job_description')
                                    <div class="invalid-feedback">
                                            {{$message}}
                                    </div>
                                    @enderror   
                                </div>
                                <div class="col-md-6">
                                    <label for="title">Movimentos Mais Repetidos:</label>
                                    <textarea class="form-control @error('repeated_movements') is-invalid @enderror" id="repeated_movements" name="repeated_movements"> {{old('repeated_movements')}}</textarea>
                                    @error('repeated_movements')
                                    <div class="invalid-feedback">
                                            {{$message}}
                                    </div>
                                    @enderror   
                                </div>
                            </div>
                            <br>
                            <div class="row" id="info">
                                <div class="col-md-6">
                                    <label for="title">Demanda Física/Psicológica:</label>
                                    <textarea class="form-control @error('demand_physical_psycho') is-invalid @enderror" id="demand_physical_psycho" name="demand_physical_psycho"> {{old('demand_physical_psycho')}}</textarea>
                                    @error('demand_physical_psycho')
                                    <div class="invalid-feedback">
                                            {{$message}}
                                    </div>
                                    @enderror   
                                </div>
                                <div class="col-md-6">
                                    <label for="title">Correlaciona Piora Clínica com Trabalho:</label>
                                    <textarea class="form-control @error('worse_clinical_work') is-invalid @enderror" id="worse_clinical_work" name="worse_clinical_work">{{old('worse_clinical_work')}} </textarea>
                                    @error('worse_clinical_work')
                                    <div class="invalid-feedback">
                                            {{$message}}
                                    </div>
                                    @enderror   
                                </div>
                            </div>
                            <br>
                            <div class="row" id="info">
                                <div class="col-md-6">
                                    <label for="title">Hobby/Lazer</label>
                                    <textarea class="form-control @error('leisure') is-invalid @enderror" id="leisure" name="leisure">{{old('leisure')}} </textarea>
                                    @error('leisure')
                                    <div class="invalid-feedback">
                                            {{$message}}
                                    </div>
                                    @enderror   
                                </div>
                                <div class="col-md-6">
                                    <label for="title">Atividade Física:</label>
                                    <textarea class="form-control @error('physical_activity') is-invalid @enderror" id="physical_activity" name="physical_activity"> {{old('physical_activity')}}</textarea>
                                    @error('physical_activity')
                                    <div class="invalid-feedback">
                                            {{$message}}
                                    </div>
                                    @enderror   
                                </div>
                            </div> 
                            <br>
                            <div class="row" id="info">   
                                <div class="col-md-6">
                                    <label for="title">Tempo/XSemana:</label>
                                    <textarea class="form-control @error('physical_activity_time') is-invalid @enderror" id="physical_activity_time" name="physical_activity_time">{{old('physical_activity_time')}} </textarea>
                                    @error('physical_activity_time')
                                    <div class="invalid-feedback">
                                            {{$message}}
                                    </div>
                                    @enderror   
                                </div>
                                <div class="col-md-6">
                                    <label for="title">Sente desconforto na realização da atividade física:</label>
                                    <textarea class="form-control @error('discomfort_physical_activity') is-invalid @enderror" id="discomfort_physical_activity" name="discomfort_physical_activity">{{old('discomfort_physical_activity')}} </textarea>
                                    @error('discomfort_physical_activity')
                                    <div class="invalid-feedback">
                                            {{$message}}
                                    </div>
                                    @enderror   
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">   
                                    <input type="submit" class="btn btn-dark" id="btn_salvar" value="Salvar">
                                </div>  
                            </div>  
                            <br>
                            <br> 
                        </form>
                        <hr>
                        @else
                        <br>
                        <div class="row" id="info">
                            
                            <h6>Esse paciente possui uma avaliação geral cadastrada!</h6>
                        </div>   
                        <div class="row">
                            <div class="col-md-1 offset-md-10">
                                <a href="/general/show/{{ $avaliationGeneral['id']}}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Visualizar Avaliação geral">Visualizar</a>
                            </div>
                        </div>   
                        <hr> 
                         @endif   
                    </div>
                    <!-- EndGeral -->
                    <!-- Histórico Pregresso -->   
                    <div class="tab-pane fade" id="historic_pregress-justified" role="tabpanel" aria-labelledby="historic_pregress-tab">
                        @if($past == "false")
                            <form action="/past/store/{{$avaliation['id']}}" method="POST" enctype="multipart/form-data">
                                @csrf   
                                    <div class="row" id="info">
                                        <table class="table table-white">
                                            <tbody>
                                                <tr class="col-md-12">
                                                    <td class="col-md-6"><b>Bebe:&nbsp &nbsp</b>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="drink" id="sim_drink" value="sim" {{old('drink') == "sim" ? 'checked' : '' }} onclick="past(0)" checked>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                        </div>        
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="drink" id="nao_drink" value="nao" {{old('drink') == "nao" ? 'checked' : '' }} onclick="past(1)">
                                                            <label class="form-check-label" for="inlineRadio2">Não</label>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-10" id="drink_descr">
                                                            <textarea class="form-control @error('drink_descr') is-invalid @enderror" id="description-past" name="drink_descr">@if(old('drink')=="sim") {{old('drink_descr')}}@endif</textarea>
                                                            @error('drink_descr')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror  
                                                        </div>
                                                    </td>

                                                    <td class="col-md-6"><b>Fuma:&nbsp &nbsp</b>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="smoke" id="sim" value="sim" {{old('smoke') == "sim" ? 'checked' : '' }} onclick="past(2)" checked>
                                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            </div>        
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="smoke" id="nao" value="nao" {{old('smoke') == "nao" ? 'checked' : '' }} onclick="past(3)">
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                        <br>
                                                        <div class="col-md-10" id="smoke_descr">
                                                            <textarea class="form-control @error('smoke_descr') is-invalid @enderror" id="description-past" name="smoke_descr">@if(old('smoke')=="sim") {{old('smoke_descr')}}@endif</textarea>
                                                            @error('smoke_descr')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror  
                                                        </div>
                                                    </td>
                                                </tr> 

                                                <tr class="col-md-12">
                                                    <td class="col-md-6"><b>Diabetes:&nbsp &nbsp</b>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="diabetes" id="sim_diabetes" value="sim" {{old('diabetes') == "sim" ? 'checked' : '' }} onclick="past(4)" checked>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                        </div>        
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="diabetes" id="nao_diabetes" value="nao" {{old('diabetes') == "nao" ? 'checked' : '' }} onclick="past(5)">
                                                            <label class="form-check-label" for="inlineRadio2">Não</label>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-10" id="diabetes_descr">
                                                            <textarea class="form-control @error('diabetes_descr') is-invalid @enderror" id="description-past" name="diabetes_descr">@if(old('diabetes')=="sim") {{old('diabetes_descr')}}@endif</textarea>
                                                            @error('diabetes_descr')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror  
                                                        </div>
                                                    </td>

                                                    <td class="col-md-6"><b>HAS:&nbsp &nbsp</b>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="has" id="sim" value="sim" {{old('has') == "sim" ? 'checked' : '' }} onclick="past(6)" checked>
                                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            </div>        
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="has" id="nao" value="nao" {{old('has') == "nao" ? 'checked' : '' }} onclick="past(7)">
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                        <br>
                                                        <div class="col-md-10" id="has_descr">
                                                            <textarea class="form-control @error('has_descr') is-invalid @enderror" id="description-past" name="has_descr">@if(old('has')=="sim") {{old('has_descr')}}@endif</textarea>
                                                            @error('has_descr')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror  
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr class="col-md-10">
                                                    <td class="col-md-6"><b>Colesterol:&nbsp &nbsp</b>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="cholesterol" id="sim_cholesterol" value="sim" {{old('cholesterol') == "sim" ? 'checked' : '' }} onclick="past(8)" checked>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                        </div>        
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="cholesterol" id="nao_cholesterol" value="nao" {{old('cholesterol') == "nao" ? 'checked' : '' }} onclick="past(9)">
                                                            <label class="form-check-label" for="inlineRadio2">Não</label>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-10" id="cholesterol_descr">
                                                            <textarea class="form-control @error('cholesterol_descr') is-invalid @enderror" id="description-past" name="cholesterol_descr">@if(old('cholesterol')=="sim") {{old('cholesterol_descr')}}@endif</textarea>
                                                            @error('cholesterol_descr')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror  
                                                        </div>
                                                    </td>

                                                    <td class="col-md-6"><b>Cardíaca:&nbsp &nbsp</b>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="heart" id="sim_heart" value="sim" {{old('heart') == "sim" ? 'checked' : '' }} onclick="past(10)" checked>
                                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            </div>        
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="heart" id="nao_heart" value="nao" {{old('heart') == "nao" ? 'checked' : '' }} onclick="past(11)">
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                        <br>
                                                        <div class="col-md-10" id="heart_descr">
                                                            <textarea class="form-control @error('heart_descr') is-invalid @enderror" id="description-past" name="heart_descr">@if(old('heart')=="sim") {{old('heart_descr')}}@endif</textarea>
                                                            @error('heart_descr')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror  
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr class="col-md-10">
                                                    <td class="col-md-6"><b>Pulmonar:&nbsp &nbsp</b>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pulmonary" id="sim_pulmonary" value="sim" {{old('pulmonary') == "sim" ? 'checked' : '' }} onclick="past(12)" checked>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                        </div>        
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pulmonary" id="nao_pulmonary" value="nao" {{old('pulmonary') == "nao" ? 'checked' : '' }} onclick="past(13)">
                                                            <label class="form-check-label" for="inlineRadio2">Não</label>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-10" id="pulmonary_descr">
                                                            <textarea class="form-control @error('cholesterol_descr') is-invalid @enderror" id="description-past" name="pulmonary_descr">@if(old('pulmonary')=="sim") {{old('pulmonary_descr')}}@endif</textarea>
                                                            @error('pulmonary_descr')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror  
                                                        </div>
                                                    </td>

                                                    <td class="col-md-6"><b>Renal:&nbsp &nbsp</b>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="renal" id="sim_renal" value="sim" {{old('renal') == "sim" ? 'checked' : '' }} onclick="past(14)" checked>
                                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            </div>        
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="renal" id="nao_renal" value="nao" {{old('renal') == "nao" ? 'checked' : '' }} onclick="past(15)">
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                        <br>
                                                        <div class="col-md-10" id="renal_descr">
                                                            <textarea class="form-control @error('heart_descr') is-invalid @enderror" id="description-past" name="renal_descr">@if(old('renal')=="sim") {{old('renal_descr')}}@endif</textarea>
                                                            @error('renal_descr')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror  
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr class="col-md-10">
                                                    <td class="col-md-6"><b>Gastrointestinal:&nbsp &nbsp</b>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gastrointestinal" id="sim_gastrointestinal" value="sim" {{old('gastrointestinal') == "sim" ? 'checked' : '' }} onclick="past(16)" checked>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                        </div>        
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gastrointestinal" id="nao_gastrointestinal" value="nao" {{old('gastrointestinal') == "nao" ? 'checked' : '' }} onclick="past(17)">
                                                            <label class="form-check-label" for="inlineRadio2">Não</label>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-10" id="gastrointestinal_descr">
                                                            <textarea class="form-control @error('gastrointestinal_descr') is-invalid @enderror" id="description-past" name="gastrointestinal_descr">@if(old('gastrointestinal')=="sim") {{old('gastrointestinal_descr')}}@endif</textarea>
                                                            @error('gastrointestinal_descr')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror  
                                                        </div>
                                                    </td>

                                                    <td class="col-md-6"><b>Neurológica:&nbsp &nbsp</b>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="neurological" id="sim_neurological" value="sim" {{old('neurological') == "sim" ? 'checked' : '' }} onclick="past(18)" checked>
                                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            </div>        
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="neurological" id="nao_neurological" value="nao" {{old('neurological') == "nao" ? 'checked' : '' }} onclick="past(19)">
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                        <br>
                                                        <div class="col-md-10" id="neurological_descr">
                                                            <textarea class="form-control @error('neurological_descr') is-invalid @enderror" id="description-past" name="neurological_descr">@if(old('neurological')=="sim") {{old('neurological_descr')}}@endif</textarea>
                                                            @error('neurological_descr')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror  
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr class="col-md-10">
                                                    <td class="col-md-6"><b>Psicológica:&nbsp &nbsp</b>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="psychological" id="sim_psychological" value="sim" {{old('psychological') == "sim" ? 'checked' : '' }} onclick="past(20)" checked>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                        </div>        
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="psychological" id="nao_psychological" value="nao" {{old('psychological') == "nao" ? 'checked' : '' }} onclick="past(21)">
                                                            <label class="form-check-label" for="inlineRadio2">Não</label>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-10" id="psychological_descr">
                                                            <textarea class="form-control @error('psychological_descr') is-invalid @enderror" id="description-past" name="psychological_descr">@if(old('psychological')=="sim") {{old('psychological_descr')}}@endif</textarea>
                                                            @error('psychological_descr')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror  
                                                        </div>
                                                    </td>

                                                    <td class="col-md-6"><b>Reumatológica:&nbsp &nbsp</b>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="rheumatological" id="sim_rheumatological" value="sim" {{old('rheumatological') == "sim" ? 'checked' : '' }} onclick="past(22)" checked>
                                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            </div>        
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="rheumatological" id="nao_rheumatological" value="nao" {{old('rheumatological') == "nao" ? 'checked' : '' }} onclick="past(23)">
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                        <br>
                                                        <div class="col-md-10" id="rheumatological_descr">
                                                            <textarea class="form-control @error('rheumatological_descr') is-invalid @enderror" id="description-past" name="rheumatological_descr">@if(old('rheumatological')=="sim") {{old('rheumatological_descr')}}@endif</textarea>
                                                            @error('rheumatological_descr')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror  
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr class="col-md-10">
                                                    <td class="col-md-6"><b>Vascular:&nbsp &nbsp</b>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="vascular" id="sim_vascular" value="sim" {{old('vascular') == "sim" ? 'checked' : '' }} onclick="past(24)" checked>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                        </div>        
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="vascular" id="nao_vascular" value="nao" {{old('vascular') == "nao" ? 'checked' : '' }} onclick="past(25)">
                                                            <label class="form-check-label" for="inlineRadio2">Não</label>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-10" id="vascular_descr">
                                                            <textarea class="form-control @error('vascular_descr') is-invalid @enderror" id="description-past" name="vascular_descr">@if(old('vascular')=="sim") {{old('vascular_descr')}}@endif</textarea>
                                                            @error('vascular_descr')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror  
                                                        </div>
                                                    </td>

                                                    <td class="col-md-6"><b>Mamária:&nbsp &nbsp</b>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="mammary" id="sim_mammary" value="sim" {{old('mammary') == "sim" ? 'checked' : '' }} onclick="past(26)" checked>
                                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            </div>        
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="mammary" id="nao_mammary" value="nao" {{old('mammary') == "nao" ? 'checked' : '' }} onclick="past(27)">
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                        <br>
                                                        <div class="col-md-10" id="mammary_descr">
                                                            <textarea class="form-control @error('mammary_descr') is-invalid @enderror" id="description-past" name="mammary_descr">@if(old('mammary')=="sim") {{old('mammary_descr')}}@endif</textarea>
                                                            @error('mammary_descr')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror  
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr class="col-md-10">    
                                                    <td class="col-md-6"><b>Útero:&nbsp &nbsp</b>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="uterus" id="sim_uterus" value="sim" {{old('uterus') == "sim" ? 'checked' : '' }} onclick="past(28)" checked>
                                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            </div>        
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="uterus" id="nao_uterus" value="nao" {{old('uterus') == "nao" ? 'checked' : '' }} onclick="past(29)">
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                        <br>
                                                        <div class="col-md-10" id="uterus_descr">
                                                            <textarea class="form-control @error('uterus_descr') is-invalid @enderror" id="description-past" name="uterus_descr">@if(old('uterus')=="sim") {{old('uterus_descr')}}@endif</textarea>
                                                            @error('uterus_descr')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror  
                                                        </div>
                                                    </td>

                                                    <td class="col-md-6"><b>Escroto:&nbsp &nbsp</b>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="scrotum" id="sim_scrotum" value="sim" {{old('scrotum') == "sim" ? 'checked' : '' }} onclick="past(30)" checked>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                        </div>        
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="scrotum" id="nao_scrotum" value="nao" {{old('scrotum') == "nao" ? 'checked' : '' }} onclick="past(31)">
                                                            <label class="form-check-label" for="inlineRadio2">Não</label>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-10" id="scrotum_descr">
                                                            <textarea class="form-control @error('scrotum_descr') is-invalid @enderror" id="description-past" name="scrotum_descr">@if(old('scrotum')=="sim") {{old('scrotum_descr')}}@endif</textarea>
                                                            @error('scrotum_descr')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror  
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr class="col-md-10">  
                                                    <td class="col-md-6"><b>Tireóide:&nbsp &nbsp</b>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="thyroid" id="sim_thyroid" value="sim" {{old('thyroid') == "sim" ? 'checked' : '' }} onclick="past(32)" checked>
                                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            </div>        
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="thyroid" id="nao_thyroid" value="nao" {{old('thyroid') == "nao" ? 'checked' : '' }} onclick="past(33)">
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                            <br>
                                                            <div class="col-md-10" id="thyroid_descr">
                                                                <textarea class="form-control @error('thyroid_descr') is-invalid @enderror" id="description-past" name="thyroid_descr">@if(old('thyroid')=="sim") {{old('thyroid_descr')}}@endif</textarea>
                                                                @error('thyroid_descr')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror  
                                                            </div>
                                                        </td>   
                                                    <td class="col-md-6"><b>Covid-19:&nbsp &nbsp</b>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="covid19" id="sim_covid19" value="sim" {{old('covid19') == "sim" ? 'checked' : '' }} onclick="past(34)" checked>
                                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            </div>        
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="covid19" id="nao_covid19" value="nao" {{old('covid19') == "nao" ? 'checked' : '' }} onclick="past(35)">
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                        <br>
                                                        <div class="col-md-10" id="covid19_descr">
                                                            <textarea class="form-control @error('covid19_descr') is-invalid @enderror" id="description-past" name="covid19_descr">@if(old('covid19')=="sim") {{old('covid19_descr')}}@endif</textarea>
                                                            @error('covid19_descr')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror  
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr class="col-md-10">  
                                                    <td class="col-md-6"><b>Fratura:&nbsp &nbsp</b>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="fracture" id="sim_fracture" value="sim" {{old('fracture') == "sim" ? 'checked' : '' }} onclick="past(36)" checked>
                                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            </div>        
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="fracture" id="nao_fracture" value="nao" {{old('fracture') == "nao" ? 'checked' : '' }} onclick="past(37)">
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                            <br>
                                                            <div class="col-md-10" id="fracture_descr">
                                                                <textarea class="form-control @error('fracture_descr') is-invalid @enderror" id="description-past" name="fracture_descr">@if(old('fracture')=="sim") {{old('fracture_descr')}}@endif</textarea>
                                                                @error('fracture_descr')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror  
                                                            </div>
                                                        </td>   
                                                    <td class="col-md-6"><b>Histórico de CA:&nbsp &nbsp</b>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="historical_ca" id="sim_historical_ca" value="sim" {{old('historical_ca') == "sim" ? 'checked' : '' }} onclick="past(38)" checked>
                                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            </div>        
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="historical_ca" id="nao_historical_ca" value="nao" {{old('historical_ca') == "nao" ? 'checked' : '' }} onclick="past(39)">
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                        <br>
                                                        <div class="col-md-10" id="hist_ca_descr">
                                                            <textarea class="form-control @error('hist_ca_descr') is-invalid @enderror" id="description-past" name="hist_ca_descr">@if(old('historical_ca')=="sim") {{old('hist_ca_descr')}}@endif</textarea>
                                                            @error('hist_ca_descr')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror  
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr class="col-md-10">  
                                                    <td class="col-md-6"><b>Histórico de familiares com CA: &nbsp</b>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="hist_family_ca" id="sim_hist_family_ca" value="sim" {{old('hist_family_ca') == "sim" ? 'checked' : '' }} onclick="past(40)" checked>
                                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            </div>        
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="hist_family_ca" id="nao_hist_family_ca" value="nao" {{old('hist_family_ca') == "nao" ? 'checked' : '' }} onclick="past(41)">
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                            <br>
                                                            <div class="col-md-10" id="hist_family_ca_descr">
                                                                <textarea class="form-control @error('hist_family_ca_descr') is-invalid @enderror" id="description-past" name="hist_family_ca_descr">@if(old('hist_family_ca')=="sim") {{old('hist_family_ca_descr')}}@endif</textarea>
                                                                @error('hist_family_ca_descr')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror  
                                                            </div>
                                                        </td>   
                                                    <td class="col-md-6"><b>Histórico de Cirurgias:&nbsp &nbsp</b>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="historical_surgeries" id="sim_historical_surgeries" value="sim" {{old('historical_surgeries') == "sim" ? 'checked' : '' }} onclick="past(42)" checked>
                                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            </div>        
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="historical_surgeries" id="nao_historical_surgeries" value="nao" {{old('historical_surgeries') == "nao" ? 'checked' : '' }} onclick="past(43)">
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                        <br>
                                                        <div class="col-md-10" id="hist_surgeries_descr">
                                                            <textarea class="form-control @error('hist_surgeries_descr') is-invalid @enderror" id="description-past" name="hist_surgeries_descr">@if(old('historical_surgeries')=="sim") {{old('hist_surgeries_descr')}}@endif</textarea>
                                                            @error('hist_surgeries_descr')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror  
                                                        </div>
                                                    </td>

                                                </tr>
                                            </tbody> 
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">   
                                            <input type="submit" class="btn btn-dark"  value="Salvar">
                                        </div>  
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                            </form> 
                        @else
                            <br>
                            <div class="row" id="info">
                                <br>
                            <h6>Esse paciente possui um histórico pregresso cadastrada!</h6>
                            </div> 
                            <div class="row">
                                <div class="col-md-1 offset-md-10">
                                    <a href="/past/show/{{ $past['id']}}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Visualizar Histórico pregresso">Visualizar</a>
                                </div>
                            </div>      
                        @endif     
                    </div>
                    <!-- EndHistóricoPregresso -->
                    <!-- Redflags -->
                    <div class="tab-pane fade" id="redflags-justified" role="tabpanel" aria-labelledby="redflags-tab">
                        @if($redflag == "false")    
                            <form action="/redflags/store/{{$avaliation['id']}}" method="POST" enctype="multipart/form-data">
                                @csrf 
                            
                                <div class="row" id="info">
                                    <table class="table table-white">
                                        <tbody>
                                            <tr class="col-md-10">
                                                <td class="col-md-6"><b>Febre Ultimamente:&nbsp &nbsp</b>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fever" id="simfebre" value="sim"{{old('fever') == "sim" ? 'checked' : '' }} onclick="text(0)" checked>
                                                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                    </div>        
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fever" id="naofebre" value="nao" {{old('fever') == "nao" ? 'checked' : '' }}  onclick="text(1)">
                                                        <label class="form-check-label" for="inlineRadio2">Não</label>
                                                    </div>
                                                
                                                    <div class="col-md-10" id="fever">
                                                        <textarea class="form-control @error('fever_descr') is-invalid @enderror" id="description-redflags" name="fever_descr">@if(old('fever')=="sim") {{old('fever_descr')}}@endif </textarea>
                                                        @error('fever_descr')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                        @enderror  
                                                    </div>
                                                </td>

                                                <td class="col-md-6"><b>Caído Ultimamente:&nbsp &nbsp</b>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fallen" id="simcaido" value="sim"{{old('fallen') == "sim" ? 'checked' : '' }} onclick="text(2)" checked>
                                                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                    </div>        
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="fallen" id="naocaido" value="nao"{{old('fallen') == "nao" ? 'checked' : '' }} onclick="text(3)">
                                                        <label class="form-check-label" for="inlineRadio2">Não</label>
                                                    </div>
                                                    
                                                    <div class="col-md-10" id="fallen">
                                                        <textarea class="form-control @error('fallen_descr') is-invalid @enderror" id="description-redflags" name="fallen_descr"> @if(old('fallen')=="sim") {{old('fallen_descr')}}@endif</textarea>
                                                        @error('fallen_descr')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                        @enderror  
                                                    </div>
                        
                                                </td>
                                            </tr> 
                                            <tr class="col-md-8">
                                                <td class="col-md-6"><b>Tonturas:&nbsp &nbsp &nbsp &nbsp</b>
                                                    <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="dizziness" id="sim_tontura" value="sim" {{old('dizziness') == "sim" ? 'checked' : '' }} onclick="text(4)" checked>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="dizziness" id="nao_tontura" value="nao" {{old('dizziness') == "nao" ? 'checked' : '' }} onclick="text(5)" >
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-10" id="dizziness">
                                                        <textarea class="form-control @error('dizziness_descr') is-invalid @enderror" id="description-redflags" name="dizziness_descr"> @if(old('dizziness')=="sim") {{old('dizziness_descr')}}@endif</textarea>
                                                        @error('dizziness_descr')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                        @enderror  
                                                    </div>
                                            </td>
                                            <td class="col-md-6"><b>Dificuldades ao andar:&nbsp &nbsp</b>
                                                    <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="dif_walking" id="sim_dif_andar" value="sim" {{old('dif_walking') == "sim" ? 'checked' : '' }} onclick="text(6)" checked>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="dif_walking" id="nao_dif_andar" value="nao" {{old('dif_walking') == "nao" ? 'checked' : '' }} onclick="text(7)" >
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-10" id="dif_walking">
                                                        <textarea class="form-control @error('dif_walking_descr') is-invalid @enderror" id="description-redflags" name="dif_walking_descr">@if(old('dif_walking')=="sim") {{old('dif_walking_descr')}}@endif </textarea>
                                                        @error('dif_walking_descr')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                        @enderror  
                                                    </div>
                                            </tr> 

                                            <tr class="col-md-8">
                                                <td class="col-md-6"><b>Dor Notura:&nbsp &nbsp &nbsp &nbsp</b>
                                                    <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="notura_pain" id="sim_dor_notura" value="sim" {{old('notura_pain') == "sim" ? 'checked' : '' }} onclick="text(8)" checked>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="notura_pain" id="nao_dor_notura" value="nao" {{old('notura_pain') == "nao" ? 'checked' : '' }} onclick="text(9)" >
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-10" id="notura_pain">     
                                                    <textarea class="form-control @error('notura_pain_descr') is-invalid @enderror" id="description-redflags" name="notura_pain_descr">@if(old('notura_pain')=="sim") {{old('notura_pain_descr')}}@endif </textarea>
                                                    @error('notura_pain_descr')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                        @enderror     
                                                </div>
                                            </td>
                                            <td class="col-md-6"><b>Rigidez ao levantar:&nbsp &nbsp</b>
                                                    <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="stiffness" id="sim_rigidez" value="sim" {{old('stiffness') == "sim" ? 'checked' : '' }} onclick="text(10)" checked>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="stiffness" id="nao_rigidez" value="nao" {{old('stiffness') == "nao" ? 'checked' : '' }} onclick="text(11)" >
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-10" id="stiffness">
                                                        <textarea class="form-control @error('stiffness_descr') is-invalid @enderror" id="description-redflags" name="stiffness_descr">@if(old('stiffness')=="sim") {{old('stiffness_descr')}}@endif</textarea>
                                                        @error('stiffness_descr')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                        @enderror  
                                                    </div>
                                            </tr> 

                                            <tr class="col-md-8">
                                                <td class="col-md-6"><b>Perda de peso sem motivos: &nbsp &nbsp &nbsp</b>
                                                    <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="weight_loss" id="sim_perda_peso" value="sim" {{old('weight_loss') == "sim" ? 'checked' : '' }} onclick="text(12)" checked>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="weight_loss" id="nao_perda_peso" value="nao" {{old('weight_loss') == "nao" ? 'checked' : '' }} onclick="text(13)" >
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-10" id="weight_loss">
                                                        <textarea class="form-control @error('weight_loss_descr') is-invalid @enderror" id="description-redflags" name="weight_loss_descr"> @if(old('weight_loss')=="sim") {{old('weight_loss_descr')}}@endif</textarea>
                                                        @error('weight_loss_descr')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                        @enderror  
                                                    </div>
                                            </td>
                                            <td class="col-md-6"><b>Desmaios sem motivos:&nbsp &nbsp</b>
                                                    <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="faint" id="sim_desmaio" value="sim" {{old('faint') == "sim" ? 'checked' : '' }} onclick="text(14)" checked>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="faint" id="nao_desmaio" value="nao" {{old('faint') == "nao" ? 'checked' : '' }} onclick="text(15)" >
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-10" id="faint">
                                                        <textarea class="form-control @error('faint_descr') is-invalid @enderror" id="description-redflags" name="faint_descr"> @if(old('faint')=="sim") {{old('faint_descr')}}@endif</textarea>
                                                        @error('faint_descr')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                        @enderror  
                                                    </div>
                                            </tr> 

                                            <tr class="col-md-8">
                                                <td class="col-md-6"><b>Formigamento corporal: &nbsp &nbsp &nbsp</b>
                                                    <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="formication" id="sim_formigamento" value="sim" {{old('formication') == "sim" ? 'checked' : '' }} onclick="text(16)" checked>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="formication" id="nao_formigamento" value="nao" {{old('formication') == "nao" ? 'checked' : '' }}onclick="text(17)" >
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-10" id="formication">
                                                        <textarea class="form-control @error('formication_descr') is-invalid @enderror" id="description-redflags" name="formication_descr">@if(old('formication')=="sim") {{old('formication_descr')}}@endif </textarea>
                                                        @error('formication_descr')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                        @enderror  
                                                    </div>
                                            </td>
                                            <td class="col-md-6"><b>Cansaço/Fadiga anormal:&nbsp &nbsp</b>
                                                    <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="tiredness" id="sim_cansaco" value="sim" {{old('tiredness') == "sim" ? 'checked' : '' }}onclick="text(18)" checked>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tiredness" id="nao_cansaco" value="nao"{{old('tiredness') == "nao" ? 'checked' : '' }} onclick="text(19)" >
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-10" id="tiredness">
                                                        <textarea class="form-control @error('tiredness_descr') is-invalid @enderror" id="description-redflags" name="tiredness_descr">@if(old('tiredness')=="sim") {{old('tiredness_descr')}}@endif </textarea>
                                                        @error('tiredness_descr')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                        @enderror  
                                                    </div>
                                            </tr> 

                                            <tr class="col-md-8">
                                                <td class="col-md-6"><b>Dor que não passa: &nbsp &nbsp &nbsp</b>
                                                    <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="endless_pain" id="sim_dor_nao_passa" value="sim"{{old('endless_pain') == "sim" ? 'checked' : '' }} onclick="text(20)" checked>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="endless_pain" id="nao_dor_nao_passa" value="nao"{{old('endless_pain') == "nao" ? 'checked' : '' }} onclick="text(21)" >
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-10" id="endless_pain">
                                                        <textarea class="form-control @error('endless_pain_descr') is-invalid @enderror" id="description-redflags" name="endless_pain_descr">@if(old('endless_pain')=="sim") {{old('endless_pain_descr')}}@endif </textarea>
                                                        @error('endless_pain_descr')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                        @enderror  
                                                    </div>
                                            </td>
                                            <td class="col-md-6"><b>Disfunções Urinárias:&nbsp &nbsp</b>
                                                    <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="urinary_dysfunction" id="sim_disf_urinaria" value="sim" {{old('urinary_dysfunction') == "sim" ? 'checked' : '' }} onclick="text(22)" checked>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="urinary_dysfunction" id="nao_disf_urinaria" value="nao" {{old('urinary_dysfunction') == "nao" ? 'checked' : '' }}onclick="text(23)" >
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-10" id="urinary_dysfunction">
                                                        <textarea class="form-control @error('urinary_dysfunction_descr') is-invalid @enderror" id="description-redflags" name="urinary_dysfunction_descr">@if(old('urinary_dysfunction')=="sim") {{old('urinary_dysfunction_descr')}}@endif </textarea>
                                                        @error('urinary_dysfunction_descr')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                        @enderror  
                                                    </div>
                                            </tr> 

                                            <tr class="col-md-8">
                                                <td class="col-md-6"><b>Disfunções intestinais: &nbsp &nbsp &nbsp</b>
                                                    <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="intestinal_dysfunction" id="sim_disf_intestinal" value="sim" {{old('intestinal_dysfunction') == "sim" ? 'checked' : '' }}onclick="text(24)" checked>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="intestinal_dysfunction" id="nao_disf_intestinal" value="nao" {{old('intestinal_dysfunction') == "nao" ? 'checked' : '' }} onclick="text(25)" >
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-10" id="intestinal_dysfunction">
                                                        <textarea class="form-control @error('intestinal_dysfunction_descr') is-invalid @enderror" id="description-redflags" name="intestinal_dysfunction_descr"> @if(old('intestinal_dysfunction')=="sim") {{old('intestinal_dysfunction_descr')}}@endif</textarea>
                                                        @error('intestinal_dysfunction_descr')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                        @enderror  
                                                    </div>
                                            </td>
                                            <td class="col-md-6"><b>Disfunções Sexuais:&nbsp &nbsp</b>
                                                    <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="sexual_dysfunction" id="sim_disf_disf_sexual" value="sim" {{old('sexual_dysfunction') == "sim" ? 'checked' : '' }}onclick="text(26)" checked>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="sexual_dysfunction" id="nao_disf_sexual" value="nao" {{old('sexual_dysfunction') == "nao" ? 'checked' : '' }} onclick="text(27)" >
                                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-10" id="sexual_dysfunction">
                                                        <textarea class="form-control @error('sexual_dysfunction_descr') is-invalid @enderror" id="description-redflags" name="sexual_dysfunction_descr">@if(old('sexual_dysfunction')=="sim") {{old('sexual_dysfunction_descr')}}@endif</textarea>
                                                        @error('sexual_dysfunction_descr')
                                                        <div class="invalid-feedback">
                                                                {{$message}}
                                                        </div>
                                                        @enderror  
                                                    </div>
                                            </tr> 
                                        </tbody>  
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">   
                                        <input type="submit" class="btn btn-dark"value="Salvar">
                                    </div>  
                                </div>
                                <br>
                                <br>
                                <br>
                            </form>
                        @else
                            <br>
                            <div class="row" id="info">
                                <h6>Esse paciente possui uma redflag cadastrada!</h6>
                            </div>   
                            <div class="row">
                                <div class="col-md-1 offset-md-10">
                                    <a href="/redflags/show/{{ $redflag['id']}}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Visualizar Redflags">Visualizar</a>
                                </div>
                            </div>   
                        @endif   
                    </div>
                    <!-- EndRedflags -->
                    <!-- Histórico -->
                    <div class="tab-pane fade" id="historic-justified" role="tabpanel" aria-labelledby="historic-tab">
                        @if($historic == "false")
                        <br>
                        <form action="/historic/store/{{$avaliation['id']}}" method="POST" enctype="multipart/form-data">
                         @csrf
                            <div class="row" id="info">
                                <div class="col-md-6">
                                    <label for="title">Diagnóstico médico:</label>
                                    <textarea class="form-control @error('medical_diagnostic') is-invalid @enderror" id="medical_diagnostic" name="medical_diagnostic"> {{old('medical_diagnostic')}}</textarea>
                                    @error('medical_diagnostic')
                                        <div class="invalid-feedback">
                                                {{$message}}
                                        </div>
                                    @enderror   
                                </div>
                                <div class="col-md-6">
                                    <label for="title">Medicação:</label>
                                    <textarea class="form-control @error('medication') is-invalid @enderror" id="medication" name="medication" >{{old('medication')}} </textarea>
                                    @error('medication')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror   
                                </div>
                            </div>
                            <br>
                            <div class="row" id="info">
                                <div class="col-md-8">
                                    <label for="title">Queixa principal:</label>
                                    <textarea class="form-control @error('complaint') is-invalid @enderror" id="complaint" name="complaint">{{old('complaint')}} </textarea>
                                    @error('complaint')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror   
                                </div>
                            </div>  
                            <br>
                            <div class="row" id="info">  
                                <div class="col-md-12">
                                    <label for="title">História:</label>
                                    <textarea class="form-control @error('story') is-invalid @enderror" id="story" name="story" > {{old('story')}}</textarea>
                                    @error('story')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror   
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-1">   
                                    <input type="submit" class="btn btn-dark" value="Salvar">
                                </div>  
                            </div>   
                        </form><br><br>
                        @else
                        <br>   
            
                        <div class="row" id="info">     
                            <h6>Esse paciente possui um histórico cadastrado!</h6>
                        </div> 
                        <div class="row">
                            <div class="col-md-1 offset-md-10">
                                <a href="/historic/show/{{ $historic['id']}}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Visualizar Histórico">Visualizar</a>
                            </div>
                        </div>    
                        @endif  
                        <hr>    
                    </div>
                    <!-- EndHistórico --> 
                    <div class="tab-pane fade" id="subjective-justified" role="tabpanel" aria-labelledby="subjective-tab">
                        @if($subjective == "false")<br>
                            <form action="/subjective/store/{{$avaliation['id']}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group">
                                        <label for="title"><b>Subjetiva Imagem:&nbsp&nbsp</b></label>
                                        
                                        <input type="file" class="form-control-file @error('subjective_img') is-invalid @enderror" id="subjective_img" name="subjective_img"> 
                                            @error('subjective_img')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror  
                                    </div>
                                </div>   
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="title"><b>Escala Visual e Analógica de Dor:</b></label> 
                                        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="subjective_scale" id="one" value="1" {{ old('subjective_scale') == "1" ? 'checked' : '' }} checked>
                                            <label class="form-check-label" for="one">
                                                1 
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="subjective_scale" id="two" value="2" {{ old('subjective_scale') == "2" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="two">
                                            2
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="subjective_scale" id="three" value="3" {{ old('subjective_scale') == "3" ? 'checked' : '' }}  >
                                            <label class="form-check-label" for="three">
                                                3
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="subjective_scale" id="four" value="4" {{ old('subjective_scale') == "4" ? 'checked' : '' }}  >
                                            <label class="form-check-label" for="four">
                                                4
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="subjective_scale" id="five" value="5" {{ old('subjective_scale') == "5" ? 'checked' : '' }}  >
                                            <label class="form-check-label" for="five">
                                                5 
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="subjective_scale" id="six" value="6" {{ old('subjective_scale') == "6" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="six">
                                                6 
                                            </label>
                                        </div>
                                    
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="subjective_scale" id="seven" value="7" {{ old('subjective_scale') == "7" ? 'checked' : '' }}  >
                                            <label class="form-check-label" for="seven">
                                                7
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="subjective_scale" id="eight" value="8" {{ old('subjective_scale') == "8" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="eight">
                                                8
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="subjective_scale" id="nine" value="9" {{ old('subjective_scale') == "9" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="nine">
                                                9
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="subjective_scale" id="ten" value="10" {{ old('subjective_scale') == "10" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="ten">
                                                10
                                            </label>
                                        </div>

                                    </div>
                                </div>   
                                <br>
                                <div class="row"> 
                                    <div class="col-md-6">
                                        <div class="row">
                                        <label for="title"><b>Qualidade da Dor:</b></label> 
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="subjective_characteristic" id="twinge" value="pontada" {{ old('subjective_characteristic') == "pontada" ? 'checked' : '' }} checked>
                                            <ion-icon name="eyedrop"></ion-icon>
                                            <label class="form-check-label" for="twinge">
                                                Pontada 
                                            </label> 
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="subjective_characteristic" id="shock" value="choque" {{ old('subjective_characteristic') == "choque" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="shock">
                                            <ion-icon name="flash"></ion-icon>
                                            Choque
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="subjective_characteristic" id="burn" value="queimor" {{ old('subjective_characteristic') == "queimor" ? 'checked' : '' }}  >
                                            <label class="form-check-label" for="burn">
                                            <ion-icon name="flame"></ion-icon>
                                                Queimor
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="subjective_characteristic" id="weary" value="cansada" {{ old('subjective_characteristic') == "cansada" ? 'checked' : '' }}  >
                                            <label class="form-check-label" for="weary">
                                            <ion-icon name="battery-dead"></ion-icon>
                                                Cansada
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="subjective_characteristic" id="grip" value="aperto" {{ old('subjective_characteristic') == "aperto" ? 'checked' : '' }}  >
                                            <label class="form-check-label" for="grip">
                                            <ion-icon name="construct"></ion-icon>
                                                Aperto 
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="title"><b>Localização Espacial:</b></label> 
                                        </div>
                                        <div class="form-check form-check-inline" >
                                            <input class="form-check-input" type="radio" name="subjective_spatial_location" id="superficial" value="superficial" {{ old('subjective_spatial_location') == "superficial" ? 'checked' : '' }} checked>
                                            <label class="form-check-label" for="superficial" id="superficial"> 
                                                Superficial 
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="subjective_spatial_location" id="median" value="mediana" {{ old('subjective_spatial_location') == "mediana" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="median" id="median">
                                            Mediana
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="subjective_spatial_location" id="deep" value="profunda" {{ old('subjective_spatial_location') == "profunda" ? 'checked' : '' }}  >
                                            <label class="form-check-label" for="deep" id="deep">
                                                Profunda
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div> 
                                <br>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <label for="title"><b>Anotações:</b></label> 
                                        </div>

                                        <textarea class="form-control @error('subjective_description') is-invalid @enderror" id="subjective_description" name="subjective_description"> {{old('subjective_description')}} </textarea>
                                            @error('subjective_description')
                                            <div class="invalid-feedback">
                                                    {{$message}}
                                            </div>
                                            @enderror  
                                        
                                    </div>
                                </div>  
                                
                                <br>
                                <div class="row" >
                                    <div class="col-md-2">   
                                        <input type="submit" class="btn btn-dark" value="Cadastrar">
                                    </div>
                                </div>      

                            </form>     
                            <br><br>
                        @else
                            <br>    
                            <div class="row">
                                <h6>Esse paciente possui uma avaliação subjetiva cadastrada!</h6>
                            </div> 
                            <div class="row">
                                <div class="col-md-1 offset-md-10">
                                    <a href="/subjective/show/{{ $subjective['id']}}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Visualizar Subjetiva">Visualizar</a>
                                </div>
                            </div>    
                        @endif 
                        <hr>
                    </div>
                    <!-- Objetiva --> 
                    <div class="tab-pane fade" id="objective-justified" role="tabpanel" aria-labelledby="objective-tab">
                    <div class="col-md-6">
                        <a href="/dynamop/info/{{$avaliation['id']}}" class="btn btn-outline-dark" data-id="">Dynamop </a>
                    </div>   
                    </div>
                     <!-- EndObjetiva --> 
                     <!-- Questionnaire --> 
                    <div class="tab-pane fade" id="questionnaires-justified" role="tabpanel" aria-labelledby="questionnaires-tab">
                    <br>
                    @if($questionnaire == 'false')
                        <a href="/questionnaire/store/{{$avaliation['id']}}" class="btn btn-dark" id="btn_new_avaliation">Novo</a></td>
                    @else
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Questionário: Sensibilização Central - CSI</td>
                                    <td><a href="/csi_questionnaire/{{$questionnaire['id']}}" class="btn" data-toggle="tooltip" data-placement="top" title="CSI"><i class="bi bi-file-earmark-text"></i></a></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Questionário: Escala de pensamento catastrófico sobre a dor -B-PCS</td>
                                    <td><a href="/bpcs_questionnaire/{{$questionnaire['id']}}" class="btn" data-toggle="tooltip" data-placement="top" title="CSI"><i class="bi bi-file-earmark-text"></i></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Questionário: Escala de autoeficácia para dor</td>
                                    <td><a href="/aedc_questionnaire/{{$questionnaire['id']}}" class="btn" data-toggle="tooltip" data-placement="top" title="ADEC"><i class="bi bi-file-earmark-text"></i></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Questionário: Crenças para evitar o medo - FABQ</td>
                                    <td><a href="/fabq_questionnaire/{{$questionnaire['id']}}" class="btn" data-toggle="tooltip" data-placement="top" title="CSI"><i class="bi bi-file-earmark-text"></i></a></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Questionário: Escala tampa de Cinesofobia</td>
                                    <td><a href="/etc_questionnaire/{{$questionnaire['id']}}" class="btn" data-toggle="tooltip" data-placement="top" title="CSI"><i class="bi bi-file-earmark-text"></i></a></td>
                                    <td></td>
                                </tr>
                            
                            </tbody>   
                        </table>
                        <br>
                        <br>
                        @endif
                    </div>
                    <!-- EndQuestionnaire --> 
                    <!-- Exames --> 
                    <div class="tab-pane fade" id="exams-justified" role="tabpanel" aria-labelledby="exams-tab">
                       <br>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Cadastrar Exames
                                </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form action="/exams/store/{{$avaliation['id']}}" method="POST" enctype="multipart/form-data">
                                            @csrf    
                                            <br>  
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="title">Nome:</label>
                                                    <input type="text"  class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}"> 
                                                    @error('name')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                    @enderror   
                                                </div> 
                                                <div class="col-md-3 offset-md-1">
                                                    <div class="form-group">
                                                        <label for="image">Exames:</label>
                                                        <input type="file" id="image" name="image" class="form-control-file @error('image') is-invalid @enderror" >
                                                        @error('image')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror  
                                                    </div>
                                                </div>
                                            </div> 
                                            <br>
                                            <div class=" row">
                                                <div class="col-md-10">
                                                    <label for="title">Descrição:</label>
                                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description')}} </textarea>
                                                    @error('description')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                    @enderror   
                                                </div> 
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-2 offset-md-6">   
                                                    <input type="submit" class="btn btn-dark" id="btn_salvar" value="Salvar">
                                                
                                                </div>   
                                            </div>   
                                        </form>
                                    </div>
                                </div>
                            </div>
                
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Exames Cadastrados
                                </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <br>
                                        <a href="/exams/{{$avaliation['id']}}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Editar">Visualizar exames</a>   
                                    </div>
                                </div>
                            </div>  
                   
                        </div>  
                    </div>
                    <!-- EndExames --> 
                </div><!-- End Default Tabs -->

                </div>
            </div>
        </div>
    </div>
</section>        
        
<script>
$(function() { 
    // for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        // save the latest tab; use cookies if you like 'em better:
        localStorage.setItem('lastTab', $(this).attr('href'));
    }); 

    // go to the latest tab, if it exists:
    var lastTab = localStorage.getItem('lastTab');
    if (lastTab) {
        $('[href="' + lastTab + '"]').tab('show');
    }
});
</script>    
@endsection


