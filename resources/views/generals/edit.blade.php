@extends('layouts.main')

@section('title', 'Editar Avaliação Geral')

@section('content')
<div class="pagetitle">
    <h1>Editar Avaliação Geral</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/patients">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/{{$avaliationOwtner['id']}}">Avaliação</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/{{$general->avaliation_id}}">Avaliação Info</a></li>
            <li class="breadcrumb-item active" aria-current="page">Visualizar Avaliação Geral</li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <b>Nome:</b>&nbsp  {{$avaliationOwtner['name']}}
                            </div>
                            <div class="col-lg-4">
                                <b>Data Nasc:</b> &nbsp {{$avaliationOwtner['date_nasc']}} 
                            </div> 
                        </div>
                    </div>
                </div>       
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="/general/update/{{$general->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')  
                <div class="row"> 
                        <div class="col-md-2">    
                            <div class="form-group" >
                                <label for="title">Idade:</label>
                                <input type="number"  class="form-control @error('age') is-invalid @enderror" id="age" name="age" min="0" value="{{$general->age}}">              
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
                                <input type="number"  class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" min="0" step="0.01" value="{{$general->weight}}" >
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
                                <input type="number"  class="form-control @error('height') is-invalid @enderror" id="height" name="height" min="0" step="0.01" value="{{$general->height}}">
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
                                <input type="number"  class="form-control @error('imc') is-invalid @enderror" id="imc" name="imc" min="0" step="0.01" value="{{$general->imc}}">  
                                @error('imc')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror  
                            </div>   
                        </div>
                </div>   
                        <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="title">Descrição do trabalho:</label>
                        <textarea class="form-control @error('job_description') is-invalid @enderror" id="job_description" name="job_description">{{$general->job_description}} </textarea>
                        @error('job_description')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror  
                    </div>
                    <div class="col-md-6">
                        <label for="title">Movimentos Mais Repetidos:</label>
                        <textarea class="form-control @error('repeated_movements') is-invalid @enderror" id="repeated_movements" name="repeated_movements"> {{$general->repeated_movements}}</textarea>
                        @error('repeated_movements')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror  
                    </div>
                </div>
                        <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="title">Demanda Física/Psicológica:</label>
                        <textarea class="form-control @error('demand_physical_psycho') is-invalid @enderror" id="demand_physical_psycho" name="demand_physical_psycho"> {{$general->demand_physical_psycho}}</textarea>
                        @error('demand_physical_psycho')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror  
                    </div>
                    <div class="col-md-6">
                        <label for="title">Correlaciona Piora Clínica com Trabalho:</label>
                        <textarea class="form-control @error('worse_clinical_work') is-invalid @enderror" id="worse_clinical_work" name="worse_clinical_work">{{$general->worse_clinical_work}} </textarea>
                        @error('worse_clinical_work')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror  
                    </div>
                </div>
                        <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="title">Hobby/Lazer</label>
                        <textarea class="form-control @error('leisure') is-invalid @enderror" id="leisure" name="leisure">{{$general->leisure}} </textarea>
                        @error('leisure')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror  
                    </div>
                    <div class="col-md-6">
                        <label for="title">Atividade Física:</label>
                        <textarea class="form-control @error('physical_activity') is-invalid @enderror" id="physical_activity" name="physical_activity"> {{$general->physical_activity}}</textarea>
                        @error('physical_activity')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror  
                    </div>
                </div> 
                <div class="row">  
                    <div class="col-md-6">
                        <label for="title">Tempo/XSemana:</label>
                        <textarea class="form-control @error('physical_activity_time') is-invalid @enderror" id="physical_activity_time" name="physical_activity_time">{{$general->physical_activity_time}} </textarea>
                        @error('physical_activity_time')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror  
                    </div>
                    <div class="col-md-6">
                        <label for="title">Sente desconforto na realização da atividade física:</label>
                        <textarea class="form-control @error('discomfort_physical_activity') is-invalid @enderror" id="discomfort_physical_activity" name="discomfort_physical_activity">{{$general->discomfort_physical_activity}} </textarea>
                        @error('discomfort_physical_activity')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror  
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2 offset-md-5">   
                        <input type="submit" class="btn btn-dark"  value="Editar">
                    </div>                  
                </div>
            </form> 
        </div>
    </div>
    <br><br><br>
</section>


@endsection