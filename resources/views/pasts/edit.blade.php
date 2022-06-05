@extends('layouts.main')

@section('title', 'Edit Histórico Pregresso')

@section('content')
<div class="pagetitle">
    <h1>Editar Histórico Pregresso</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/{{$avaliationOwtner['id']}}">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/{{$avaliationOwtner['id']}}">Avaliação</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/{{$avaliation['id']}}">Avaliação Info</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Histórico Pregresso</li>
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
            <form action="/past/update/{{$past->id}}" method="POST" enctype="multipart/form-data">
                @csrf   
                @method('PUT')
                <div class="row">
                        <table class="table ">
                            <tbody>
                                <tr class="col-md-10">
                                    <td class="col-md-6"><b>Bebe:&nbsp &nbsp</b>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="drink" id="sim_drink" value="sim" onclick="past(0)"  {{ $past->drink == "sim" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                        </div>        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="drink" id="nao_drink" value="nao"  onclick="past(1)" {{ $past->drink == "nao" ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio2">Não</label>
                                        </div>
                                        <br>
                                        <div class="col-md-10" id="drink_descr">
                                            <textarea class="form-control @error('drink_descr') is-invalid @enderror" id="description-past" name="drink_descr">@if(($past->drink)=="sim") {{$past->drink_descr}} @endif</textarea>
                                            @error('drink_descr')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror  
                                        </div>
                                    </td>

                                    <td class="col-md-6"><b>Fuma:&nbsp &nbsp</b>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="smoke" id="sim" value="sim" onclick="past(2)" {{ $past->smoke == "sim" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            </div>        
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="smoke" id="nao" value="nao" onclick="past(3)" {{ $past->smoke == "nao" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                        <br>
                                        <div class="col-md-10" id="smoke_descr">
                                            <textarea class="form-control @error('smoke_descr') is-invalid @enderror" id="description-past" name="smoke_descr">{{$past->smoke_descr}}</textarea>
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
                                            <input class="form-check-input" type="radio" name="diabetes" id="sim_diabetes" value="sim"  onclick="past(4)" {{ $past->diabetes == "sim" ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                        </div>        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="diabetes" id="nao_diabetes" value="nao" onclick="past(5)" {{ $past->diabetes == "nao" ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio2">Não</label>
                                        </div>
                                        <br>
                                        <div class="col-md-10" id="diabetes_descr">
                                            <textarea class="form-control @error('diabetes_descr') is-invalid @enderror" id="description-past" name="diabetes_descr">{{$past->diabetes_descr}}</textarea>
                                            @error('diabetes_descr')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror  
                                        </div>
                                    </td>

                                    <td class="col-md-6"><b>HAS:&nbsp &nbsp</b>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="has" id="sim" value="sim" onclick="past(6)" {{ $past->has == "sim" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            </div>        
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="has" id="nao" value="nao" onclick="past(7)" {{ $past->has == "nao" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                        <br>
                                        <div class="col-md-10" id="has_descr">
                                            <textarea class="form-control @error('has_descr') is-invalid @enderror" id="description-past" name="has_descr">{{$past->has_descr}}</textarea>
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
                                            <input class="form-check-input" type="radio" name="cholesterol" id="sim_cholesterol" value="sim" onclick="past(8)" {{ $past->cholesterol == "sim" ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                        </div>        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="cholesterol" id="nao_cholesterol" value="nao" onclick="past(9)" {{ $past->cholesterol == "nao" ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio2">Não</label>
                                        </div>
                                        <br>
                                        <div class="col-md-10" id="cholesterol_descr">
                                            <textarea class="form-control @error('cholesterol_descr') is-invalid @enderror" id="description-past" name="cholesterol_descr">{{$past->cholesterol_descr}}</textarea>
                                            @error('cholesterol_descr')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror  
                                        </div>
                                    </td>

                                    <td class="col-md-6"><b>Cardíaca:&nbsp &nbsp</b>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="heart" id="sim_heart" value="sim" onclick="past(10)" {{ $past->heart == "sim" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            </div>        
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="heart" id="nao_heart" value="nao" onclick="past(11)" {{ $past->heart == "nao" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                        <br>
                                        <div class="col-md-10" id="heart_descr">
                                            <textarea class="form-control @error('heart_descr') is-invalid @enderror" id="description-past" name="heart_descr">{{$past->heart_descr}}</textarea>
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
                                            <input class="form-check-input" type="radio" name="pulmonary" id="sim_pulmonary" value="sim"  onclick="past(12)" {{ $past->pulmonary == "sim" ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                        </div>        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pulmonary" id="nao_pulmonary" value="nao" onclick="past(13)" {{ $past->pulmonary == "nao" ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio2">Não</label>
                                        </div>
                                        <br>
                                        <div class="col-md-10" id="pulmonary_descr">
                                            <textarea class="form-control @error('cholesterol_descr') is-invalid @enderror" id="description-past" name="pulmonary_descr">{{$past->pulmonary_descr}}</textarea>
                                            @error('pulmonary_descr')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror  
                                        </div>
                                    </td>

                                    <td class="col-md-6"><b>Renal:&nbsp &nbsp</b>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="renal" id="sim_renal" value="sim"  onclick="past(14)" {{ $past->renal == "sim" ? 'checked' : '' }} >
                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            </div>        
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="renal" id="nao_renal" value="nao"  onclick="past(15)" {{ $past->renal == "nao" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                        <br>
                                        <div class="col-md-10" id="renal_descr">
                                            <textarea class="form-control @error('heart_descr') is-invalid @enderror" id="description-past" name="renal_descr">{{$past->renal_descr}}</textarea>
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
                                            <input class="form-check-input" type="radio" name="gastrointestinal" id="sim_gastrointestinal" value="sim"  onclick="past(16)" {{ $past->gastrointestinal == "sim" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                        </div>        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gastrointestinal" id="nao_gastrointestinal" value="nao" onclick="past(17)" {{ $past->gastrointestinal == "nao" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="inlineRadio2">Não</label>
                                        </div>
                                        <br>
                                        <div class="col-md-10" id="gastrointestinal_descr">
                                            <textarea class="form-control @error('gastrointestinal_descr') is-invalid @enderror" id="description-past" name="gastrointestinal_descr">{{$past->gastrointestinal_descr}}</textarea>
                                            @error('gastrointestinal_descr')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror  
                                        </div>
                                    </td>

                                    <td class="col-md-6"><b>Neurológica:&nbsp &nbsp</b>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="neurological" id="sim_neurological" value="sim" onclick="past(18)"{{ $past->neurological == "sim" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            </div>        
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="neurological" id="nao_neurological" value="nao" onclick="past(19)"{{ $past->neurological == "nao" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                        <br>
                                        <div class="col-md-10" id="neurological_descr">
                                            <textarea class="form-control @error('neurological_descr') is-invalid @enderror" id="description-past" name="neurological_descr">{{$past->neurological_descr}}</textarea>
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
                                            <input class="form-check-input" type="radio" name="psychological" id="sim_psychological" value="sim"  onclick="past(20)" {{ $past->psychological == "sim" ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                        </div>        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="psychological" id="nao_psychological" value="nao"  onclick="past(21)"{{ $past->psychological == "nao" ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio2">Não</label>
                                        </div>
                                        <br>
                                        <div class="col-md-10" id="psychological_descr">
                                            <textarea class="form-control @error('psychological_descr') is-invalid @enderror" id="description-past" name="psychological_descr">{{$past->psychological_descr}}</textarea>
                                            @error('psychological_descr')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror  
                                        </div>
                                    </td>

                                    <td class="col-md-6"><b>Reumatológica:&nbsp &nbsp</b>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rheumatological" id="sim_rheumatological" value="sim" onclick="past(22)" {{ $past->rheumatological == "sim" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            </div>        
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rheumatological" id="nao_rheumatological" value="nao"  onclick="past(23)" {{ $past->rheumatological == "nao" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                        <br>
                                        <div class="col-md-10" id="rheumatological_descr">
                                            <textarea class="form-control @error('rheumatological_descr') is-invalid @enderror" id="description-past" name="rheumatological_descr">{{$past->rheumatological_descr}}</textarea>
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
                                            <input class="form-check-input" type="radio" name="vascular" id="sim_vascular" value="sim" onclick="past(24)"{{ $past->vascular == "sim" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                        </div>        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="vascular" id="nao_vascular" value="nao" onclick="past(25)"{{ $past->vascular == "nao" ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio2">Não</label>
                                        </div>
                                        <br>
                                        <div class="col-md-10" id="vascular_descr">
                                            <textarea class="form-control @error('vascular_descr') is-invalid @enderror" id="description-past" name="vascular_descr">{{$past->vascular_descr}}</textarea>
                                            @error('vascular_descr')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror  
                                        </div>
                                    </td>

                                    <td class="col-md-6"><b>Mamária:&nbsp &nbsp</b>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="mammary" id="sim_mammary" value="sim" onclick="past(26)"{{ $past->mammary == "sim" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            </div>        
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="mammary" id="nao_mammary" value="nao" onclick="past(27)"{{ $past->mammary == "nao" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                        <br>
                                        <div class="col-md-10" id="mammary_descr">
                                            <textarea class="form-control @error('mammary_descr') is-invalid @enderror" id="description-past" name="mammary_descr">{{$past->mammary_descr}}</textarea>
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
                                                <input class="form-check-input" type="radio" name="uterus" id="sim_uterus" value="sim"  onclick="past(28)"{{ $past->uterus == "sim" ? 'checked' : '' }} >
                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            </div>        
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="uterus" id="nao_uterus" value="nao" onclick="past(29)"{{ $past->uterus == "nao" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                        <br>
                                        <div class="col-md-10" id="uterus_descr">
                                            <textarea class="form-control @error('uterus_descr') is-invalid @enderror" id="description-past" name="uterus_descr">{{$past->uterus_descr}}</textarea>
                                            @error('uterus_descr')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror  
                                        </div>
                                    </td>

                                    <td class="col-md-6"><b>Escroto:&nbsp &nbsp</b>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="scrotum" id="sim_scrotum" value="sim" onclick="past(30)"{{ $past->scrotum == "sim" ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                        </div>        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="scrotum" id="nao_scrotum" value="nao" onclick="past(31)"{{ $past->scrotum == "nao" ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio2">Não</label>
                                        </div>
                                        <br>
                                        <div class="col-md-10" id="scrotum_descr">
                                            <textarea class="form-control @error('scrotum_descr') is-invalid @enderror" id="description-past" name="scrotum_descr">{{$past->scrotum_descr}}</textarea>
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
                                                <input class="form-check-input" type="radio" name="thyroid" id="sim_thyroid" value="sim"  onclick="past(32)" {{ $past->thyroid == "sim" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            </div>        
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="thyroid" id="nao_thyroid" value="nao" onclick="past(33)"{{ $past->thyroid == "nao" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                            <br>
                                            <div class="col-md-10" id="thyroid_descr">
                                                <textarea class="form-control @error('thyroid_descr') is-invalid @enderror" id="description-past" name="thyroid_descr">{{$past->thyroid_descr}}</textarea>
                                                @error('thyroid_descr')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror  
                                            </div>
                                        </td>   
                                    <td class="col-md-6"><b>Covid-19:&nbsp &nbsp</b>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="covid19" id="sim_covid19" value="sim" onclick="past(34)" {{ $past->covid19 == "sim" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            </div>        
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="covid19" id="nao_covid19" value="nao"  onclick="past(35)"{{ $past->covid19 == "nao" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                        <br>
                                        <div class="col-md-10" id="covid19_descr">
                                            <textarea class="form-control @error('covid19_descr') is-invalid @enderror" id="description-past" name="covid19_descr">{{$past->covid19_descr}}</textarea>
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
                                                <input class="form-check-input" type="radio" name="fracture" id="sim_fracture" value="sim"  onclick="past(36)" {{ $past->fracture == "sim" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            </div>        
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="fracture" id="nao_fracture" value="nao"  onclick="past(37)" {{ $past->fracture == "nao" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                            <br>
                                            <div class="col-md-10" id="fracture_descr">
                                                <textarea class="form-control @error('fracture_descr') is-invalid @enderror" id="description-past" name="fracture_descr">{{$past->fracture_descr}}</textarea>
                                                @error('fracture_descr')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror  
                                            </div>
                                        </td>   
                                    <td class="col-md-6"><b>Histórico de CA:&nbsp &nbsp</b>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="historical_ca" id="sim_historical_ca" value="sim" onclick="past(38)"{{ $past->historical_ca == "sim" ? 'checked' : '' }} >
                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            </div>        
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="historical_ca" id="nao_historical_ca" value="nao"  onclick="past(39)" {{ $past->historical_ca == "nao" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                        <br>
                                        <div class="col-md-10" id="hist_ca_descr">
                                            <textarea class="form-control @error('hist_ca_descr') is-invalid @enderror" id="description-past" name="hist_ca_descr">{{$past->hist_ca_descr}}</textarea>
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
                                                <input class="form-check-input" type="radio" name="hist_family_ca" id="sim_hist_family_ca" value="sim"  onclick="past(40)" {{ $past->hist_family_ca == "sim" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            </div>        
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hist_family_ca" id="nao_hist_family_ca" value="nao"  onclick="past(41)"{{ $past->hist_family_ca == "nao" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                            <br>
                                            <div class="col-md-10" id="hist_family_ca_descr">
                                                <textarea class="form-control @error('hist_family_ca_descr') is-invalid @enderror" id="description-past" name="hist_family_ca_descr">{{$past->hist_family_ca_descr}}</textarea>
                                                @error('hist_family_ca_descr')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror  
                                            </div>
                                        </td>   
                                    <td class="col-md-6"><b>Histórico de Cirurgias:&nbsp &nbsp</b>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="historical_surgeries" id="sim_historical_surgeries" value="sim"  onclick="past(42)" {{ $past->historical_surgeries == "sim" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            </div>        
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="historical_surgeries" id="nao_historical_surgeries" value="nao"  onclick="past(43)" {{ $past->historical_surgeries == "nao" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                        <br>
                                        <div class="col-md-10" id="hist_surgeries_descr">
                                            <textarea class="form-control @error('hist_surgeries_descr') is-invalid @enderror" id="description-past" name="hist_surgeries_descr">{{$past->hist_surgeries_descr}}</textarea>
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
                        <input type="submit" class="btn btn-dark" id="btn_salvar" value="Editar">
                    </div>  
                </div>
            </form> 
        </div>
    </div>
</section>
<br><br><br>
@endsection