@extends('layouts.main')

@section('title', 'Create Exercises')

@section('content')
<div class="pagetitle">
    <h1>Cadastrar Exercícios</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="">Exercícios</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastrar Exercícios</li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <form action="/exercises/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title"><b>Nome:</b></label>
                            <input type="text" class="form-control @error('exercise_name') is-invalid @enderror" id="exercise_name" name="exercise_name" value="{{old('exercise_name')}}">
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
                            <textarea class="form-control @error('exercise_description') is-invalid @enderror" id="exercise_description" name="exercise_description"> {{old('exercise_description')}} </textarea>
                                @error('exercise_description')
                                <div class="invalid-feedback">
                                        {{$message}}
                                </div>
                                @enderror  
                        </div>
                    </div>
                </div>    
                <hr>
                <div class="col-md-13">
                <label for="title"><b>Especialidade:</b>&nbsp &nbsp</label>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exercise_specialty" id="skeletal_muscle" value="muscoloesqueletica" {{ old('exercise_specialty') == "muscoloesqueletica" ? 'checked' : '' }} checked>
                        <label class="form-check-label" for="skeletal_muscle">
                            Muscoloesquelética 
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exercise_specialty" id="geriatrics" value="geriatria" {{ old('exercise_specialty') == "geriatria" ? 'checked' : '' }}>
                        <label class="form-check-label" for="geriatrics">
                            Geriatria 
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exercise_specialty" id="sports" value="esportiva" {{ old('exercise_specialty') == "esportiva" ? 'checked' : '' }}>
                        <label class="form-check-label" for="sports">
                            Esportiva 
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exercise_specialty" id="postural" value="postural" {{ old('exercise_specialty') == "postural" ? 'checked' : '' }}>
                        <label class="form-check-label" for="postural">
                            Postural 
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exercise_specialty" id="respiratory" value="respiratoria" {{ old('exercise_specialty') == "respiratoria" ? 'checked' : '' }}>
                        <label class="form-check-label" for="respiratory">
                            Respiratória 
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exercise_specialty" id="facial" value="facial" {{ old('exercise_specialty') == "facial" ? 'checked' : '' }}>
                        <label class="form-check-label" for="facial">
                            Facial 
                        </label>
                    </div>
                
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exercise_specialty" id="self_massage" value="automassagem" {{ old('exercise_specialty') == "automassagem" ? 'checked' : '' }}>
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
                            <input class="form-check-input" type="radio" name="exercise_body_area" id="cervical" value="cervical" {{ old('exercise_body_area') == "cervical" ? 'checked' : '' }} checked>
                            <label class="form-check-label" for="cervical">
                                Cervical 
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_body_area" id="shoulder" value="ombro" {{ old('exercise_body_area') == "ombro" ? 'checked' : '' }} >
                            <label class="form-check-label" for="shoulder">
                            Ombro
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_body_area" id="thoracic_lumbar" value="toracica_lombar" {{ old('exercise_body_area') == "toracica_lombar" ? 'checked' : '' }}  >
                            <label class="form-check-label" for="thoracic_lumbar">
                                Torácica e Lombar
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_body_area" id="elbow" value="cotovelo" {{ old('exercise_body_area') == "cotovelo" ? 'checked' : '' }}  >
                            <label class="form-check-label" for="elbow">
                                Cotovelo
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_body_area" id="fist_hand" value="punho_mao" {{ old('exercise_body_area') == "punho_mao" ? 'checked' : '' }}  >
                            <label class="form-check-label" for="fist_hand">
                                Punho e Mão 
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_body_area" id="hip_pelvis" value="quadril_pelvis" {{ old('exercise_body_area') == "quadril_pelvis" ? 'checked' : '' }} >
                            <label class="form-check-label" for="hip_pelvis">
                                Quadril e Pelve 
                            </label>
                        </div>
                    
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_body_area" id="knee" value="joelho" {{ old('exercise_body_area') == "joelho" ? 'checked' : '' }}  >
                            <label class="form-check-label" for="knee">
                                Joelho
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_body_area" id="foot_ankle" value="pe_tornozelo" {{ old('exercise_body_area') == "pe_tornozelo" ? 'checked' : '' }} >
                            <label class="form-check-label" for="foot_ankle">
                                Pé e Tornozelo
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_body_area" id="face" value="face" {{ old('exercise_body_area') == "face" ? 'checked' : '' }} >
                            <label class="form-check-label" for="face">
                                Face
                            </label>
                        </div>

                    </div>
                    <br>   
                    <div class="col-md-2 offset-md-1 ">
                                <label for="title"><b>Objetivos:</b>&nbsp &nbsp</label> 

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_objective" id="fortification" value="fortalecimento" {{ old('exercise_objective') == "fortalecimento" ? 'checked' : '' }} checked>
                            <label class="form-check-label" for="cervical">
                                Fortalecimento
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_objective" id="mobility" value="mobilidade" {{ old('exercise_objective') == "mobilidade" ? 'checked' : '' }} >
                            <label class="form-check-label" for="mobility">
                            Mobilidade
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_objective" id="proprioception" value="propriocepcao" {{ old('exercise_objective') == "propriocepcao" ? 'checked' : '' }}  >
                            <label class="form-check-label" for="proprioception">
                                Propriocepção
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_objective" id="cardiorespiratory" value="cardiorespiratorio" {{ old('exercise_objective') == "cardiorespiratorio" ? 'checked' : '' }}  >
                            <label class="form-check-label" for="elbow">
                                Cardiorrespiratório
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_objective" id="neurodynamics" value="neurodinamica" {{ old('exercise_objective') == "neurodinamica" ? 'checked' : '' }}  >
                            <label class="form-check-label" for="neurodynamics">
                                Neurodinâmica
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="exercise_objective" id="heating" value="aquecimento" {{ old('exercise_objective') == "aquecimento" ? 'checked' : '' }} >
                            <label class="form-check-label" for="heating">
                                Aquecimento
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 offset-md-2">    
                        <div class="form-group">
                            <label for="title"><b>Equipamento:</b></label>
                            <select name="exercise_equipment" id="exercise_equipment" class="form-control @error('exercise_equipment') is-invalid @enderror"  size="6">
                                <option value="">-- Select --</option>
                                <option value="barra" {{old('exercise_equipment') == "barra" ? 'selected' : '' }} >Barra</option>
                                <option value="bastao" {{old('exercise_equipment') == "bastao" ? 'selected' : '' }} >Bastão</option>
                                <option value="bolla" {{old('exercise_equipment') == "ball" ? 'selected' : '' }} >Bola</option>
                                <option value="corda" {{old('exercise_equipment') == "rope" ? 'selected' : '' }} >Bola</option>
                                <option value="elastico" {{old('exercise_equipment') == "elastico" ? 'selected' : '' }} >Elástico</option>
                                <option value="halter" {{old('exercise_equipment') == "halter" ? 'selected' : '' }} >Halter</option>
                                <option value="kettlebell" {{old('exercise_equipment') == "kettlebell" ? 'selected' : '' }}>kettlebell</option>

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
                <div class="col-md-13 ">
                        <div class="form-group">
                            <label for="title"><b>Vídeo:</b></label>
                            <input type="file" class="form-control-file @error('exercise_video') is-invalid @enderror" id="exercise_video" name="exercise_video"> 
                                @error('exercise_video')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror  
                        </div>
                </div>    
                <hr>
                
                <div class="row" >
                    <div class="col-md-2 offset-md-5 ">  
                        <input type="submit" class="btn btn-dark" value="Cadastrar">
                    </div>
                </div>   
                <br>
                <br>     
            </form>
        </div>
    </div>
</section>   

<br>
<br>
@endsection