@extends('layouts.main')

@section('title', 'Edit Exercises')

@section('content') 
<div class="pagetitle">
    <h1>Editar Exercícios</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/exercises">Exercícios</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastrar Exercícios</li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <form action="/exercises/update/{{$exercise->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="row">    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title"><b>Nome:</b></label>
                            <input type="text" class="form-control @error('exercise_name') is-invalid @enderror" id="exercise_name" name="exercise_name" value="{{$exercise->exercise_name}}">
                            @error('exercise_name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror  
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title"><b>Descrição:</b></label>
                            <textarea class="form-control @error('exercise_description') is-invalid @enderror" id="exercise_description" name="exercise_description"> {{$exercise->exercise_description}} </textarea>
                                @error('exercise_description')
                                <div class="invalid-feedback">
                                        {{$message}}
                                </div>
                                @enderror  
                        </div>
                    </div>
                </div>    
                <hr>
                <div class="col-md-12">
                    <label for="title"><b>Especialidade:</b>&nbsp &nbsp</label>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exercise_specialty" id="skeletal_muscle" value="muscoloesqueletica" {{ $exercise->exercise_specialty == "muscoloesqueletica" ? 'checked' : '' }} >
                        <label class="form-check-label" for="skeletal_muscle">
                            Muscoloesquelética 
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exercise_specialty" id="geriatrics" value="geriatria" {{ $exercise->exercise_specialty == "geriatria" ? 'checked' : '' }}>
                        <label class="form-check-label" for="geriatrics">
                            Geriatria 
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exercise_specialty" id="sports" value="esportiva"  {{ $exercise->exercise_specialty == "esportiva" ? 'checked' : '' }}>
                        <label class="form-check-label" for="sports">
                            Esportiva 
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exercise_specialty" id="postural" value="postural" {{ $exercise->exercise_specialty == "postural" ? 'checked' : '' }}>
                        <label class="form-check-label" for="postural">
                            Postural 
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exercise_specialty" id="respiratory" value="respiratoria" {{ $exercise->exercise_specialty == "respiratoria" ? 'checked' : '' }}>
                        <label class="form-check-label" for="respiratory">
                            Respiratória 
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exercise_specialty" id="facial" value="facial" {{ $exercise->exercise_specialty == "facial" ? 'checked' : '' }}>
                        <label class="form-check-label" for="facial">
                            Facial 
                        </label>
                    </div>
                
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exercise_specialty" id="self_massage" value="automassagem" {{ $exercise->exercise_specialty == "automassagem" ? 'checked' : '' }}>
                        <label class="form-check-label" for="self_massage">
                            Automassagem &nbsp &nbsp
                        </label>
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                                <label for="title"><b>Área do Corpo:</b></label> 

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_body_area" id="cervical" value="cervical" {{ $exercise->exercise_body_area == "cervical" ? 'checked' : '' }}>
                            <label class="form-check-label" for="cervical">
                                Cervical 
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_body_area" id="shoulder" value="ombro" {{ $exercise->exercise_body_area == "ombro" ? 'checked' : '' }}>
                            <label class="form-check-label" for="shoulder">
                            Ombro
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_body_area" id="thoracic_lumbar" value="toracica_lombar" {{ $exercise->exercise_body_area == "toracica_lombar" ? 'checked' : '' }}>
                            <label class="form-check-label" for="thoracic_lumbar">
                                Torácica e Lombar
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_body_area" id="elbow" value="cotovelo" {{ $exercise->exercise_body_area == "cotovelo" ? 'checked' : '' }}>
                            <label class="form-check-label" for="elbow">
                                Cotovelo
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_body_area" id="fist_hand" value="punho_mao" {{ $exercise->exercise_body_area == "punho_mao" ? 'checked' : '' }}>
                            <label class="form-check-label" for="fist_hand">
                                Punho e Mão 
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_body_area" id="hip_pelvis" value="quadril_pelvis" {{ $exercise->exercise_body_area == "quadril_pelvis" ? 'checked' : '' }}>
                            <label class="form-check-label" for="hip_pelvis">
                                Quadril e Pelve 
                            </label>
                        </div>
                    
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_body_area" id="knee" value="joelho" {{ $exercise->exercise_body_area == "joelho" ? 'checked' : '' }}>
                            <label class="form-check-label" for="knee">
                                Joelho
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_body_area" id="foot_ankle" value="pe_tornozelo" {{ $exercise->exercise_body_area == "pe_tornozelo" ? 'checked' : '' }}>
                            <label class="form-check-label" for="foot_ankle">
                                Pé e Tornozelo
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_body_area" id="face" value="face" {{ $exercise->exercise_body_area == "face" ? 'checked' : '' }}>
                            <label class="form-check-label" for="face">
                                Face
                            </label>
                        </div>

                    </div>
                    <br>   
                    <div class="col-md-2 offset-md-1 ">
                                <label for="title"><b>Objetivos:</b>&nbsp &nbsp</label> 

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_objective" id="fortification" value="fortalecimento" {{ $exercise->exercise_objective == "fortalecimento" ? 'checked' : '' }}>
                            <label class="form-check-label" for="cervical">
                                Fortalecimento
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_objective" id="mobility" value="mobilidade" {{ $exercise->exercise_objective == "mobilidade" ? 'checked' : '' }}>
                            <label class="form-check-label" for="mobility">
                            Mobilidade
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_objective" id="proprioception" value="propriocepcao" {{ $exercise->exercise_objective == "propriocepcao" ? 'checked' : '' }}>
                            <label class="form-check-label" for="proprioception">
                                Propriocepção
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_objective" id="cardiorespiratory" value="cardiorespiratorio" {{ $exercise->exercise_objective == "cardiorespiratorio" ? 'checked' : '' }}>
                            <label class="form-check-label" for="cardiorespiratory">
                                Cardiorrespiratório
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_objective" id="neurodynamics" value="neurodinamica" {{ $exercise->exercise_objective == "neurodinamica" ? 'checked' : '' }}>
                            <label class="form-check-label" for="neurodynamics">
                                Neurodinâmica
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_objective" id="heating" value="aquecimento" {{ $exercise->exercise_objective == "aquecimento" ? 'checked' : '' }}>
                            <label class="form-check-label" for="heating">
                                Aquecimento
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 offset-md-2">    
                        <div class="form-group">
                            <label for="title"><b>Equipamento:</b></label>
                            <select name="exercise_equipment" id="exercise_equipment" class="form-control @error('exercise_equipment') is-invalid @enderror"  >
                                <option value="">-- Select --</option>
                                <option value="barra" {{$exercise->exercise_equipment == "barra" ? 'selected' : '' }} >Barra</option>
                                <option value="bastao" {{$exercise->exercise_equipment == "bastao" ? 'selected' : '' }} >Bastão</option>
                                <option value="bola" {{$exercise->exercise_equipment == "bola" ? 'selected' : '' }} >Bola</option>
                                <option value="corda" {{$exercise->exercise_equipment == "corda" ? 'selected' : '' }} >Corda</option>
                                <option value="elastico" {{$exercise->exercise_equipment == "elastico" ? 'selected' : '' }} >Elástico</option>
                                <option value="halter" {{$exercise->exercise_equipment == "halter" ? 'selected' : '' }} >halter</option>
                                <option value="kettlebell" {{$exercise->exercise_equipment == "kettlebell" ? 'selected' : '' }} >kettlebell</option>

                        </select>
                            @error('exercise_equipment')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror  
                        </div>
                    </div>

                </div>
                <hr>
                <div class="col-md-12">
                        <div class="form-group">
                            <label for="title"><b>Vídeo:</b></label>
                            <input type="file" class="form-control-file @error('exercise_video') is-invalid @enderror" id="exercise_video" name="exercise_video"> 
                            <a href="/videos/exercise_video/{{ $exercise->exercise_video}}">
                                <video src="/videos/exercise_video/{{ $exercise->exercise_video}}" alt="{{ $exercise->exercise_video}}" class="video-preview">
                            </a>        
                        </div>
                </div>     
                <hr>
        
                <div class="row" >
                    <div class="col-md-2 offset-md-5 ">  
                        <input type="submit" class="btn btn-dark" value="Editar">
                    </div>
                </div>   
                <br><br>
      
            </form> 
        </div>
    </div>
</section>

@endsection