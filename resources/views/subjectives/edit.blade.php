@extends('layouts.main')

@section('title', 'Editar Subjetiva')

@section('content')
<div class="pagetitle">
    <h1>Subjetiva</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/{{$avaliationOwtner['id']}}">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/{{$avaliationOwtner['id']}}">Avaliações</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/{{$avaliation['id']}}">Avaliação Info</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Subjetiva</li>
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
            <form action="/subjective/update/{{$subjective->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="row">
                    <div class="form-group">
                        <label for="title"><b>Subjetiva Imagem:&nbsp&nbsp</b></label>
                        <a href="/img/subjective/{{ $subjective->subjective_img }}">    
                            <img src="/img/subjective/{{ $subjective->subjective_img }}" alt="{{ $subjective->subjective_img }}" class="img-preview">
                        </a>  
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
                            <input class="form-check-input" type="radio" name="subjective_scale" id="one" value="1" {{ ($subjective->subjective_scale) == "1" ? 'checked' : '' }} >
                            <label class="form-check-label" for="one">
                                1 
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="subjective_scale" id="two" value="2" {{ ($subjective->subjective_scale) == "2" ? 'checked' : '' }} >
                            <label class="form-check-label" for="two">
                            2
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="subjective_scale" id="three" value="3" {{ ($subjective->subjective_scale) == "3" ? 'checked' : '' }}  >
                            <label class="form-check-label" for="three">
                                3
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="subjective_scale" id="four" value="4" {{ ($subjective->subjective_scale) == "4" ? 'checked' : '' }}  >
                            <label class="form-check-label" for="four">
                                4
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="subjective_scale" id="five" value="5" {{ ($subjective->subjective_scale) == "5" ? 'checked' : '' }}  >
                            <label class="form-check-label" for="five">
                                5 
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="subjective_scale" id="six" value="6" {{ ($subjective->subjective_scale) == "6" ? 'checked' : '' }} >
                            <label class="form-check-label" for="six">
                                6 
                            </label>
                        </div>
                    
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="subjective_scale" id="seven" value="7" {{ ($subjective->subjective_scale) == "7" ? 'checked' : '' }}  >
                            <label class="form-check-label" for="seven">
                                7
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="subjective_scale" id="eight" value="8" {{ ($subjective->subjective_scale) == "8" ? 'checked' : '' }} >
                            <label class="form-check-label" for="eight">
                                8
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="subjective_scale" id="nine" value="9" {{ ($subjective->subjective_scale) == "9" ? 'checked' : '' }} >
                            <label class="form-check-label" for="nine">
                                9
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="subjective_scale" id="ten" value="10" {{($subjective->subjective_scale) == "10" ? 'checked' : '' }} >
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
                            <input class="form-check-input" type="radio" name="subjective_characteristic" id="twinge" value="pontada" {{ ($subjective->subjective_characteristic) == "pontada" ? 'checked' : '' }} >
                            <label class="form-check-label" for="twinge">
                                Pontada 
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="subjective_characteristic" id="shock" value="choque" {{ ($subjective->subjective_characteristic) == "choque" ? 'checked' : '' }} >
                            <label class="form-check-label" for="shock">
                            Choque
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="subjective_characteristic" id="burn" value="queimor" {{ ($subjective->subjective_characteristic) == "queimor" ? 'checked' : '' }}  >
                            <label class="form-check-label" for="burn">
                                Queimor
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="subjective_characteristic" id="weary" value="cansada" {{ ($subjective->subjective_characteristic) == "cansada" ? 'checked' : '' }}  >
                            <label class="form-check-label" for="weary">
                                Cansada
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="subjective_characteristic" id="grip" value="aperto" {{ ($subjective->subjective_characteristic) == "aperto" ? 'checked' : '' }}  >
                            <label class="form-check-label" for="grip">
                                Aperto 
                            </label>
                        </div>
                    </div>

                    <div class="col-md-5 offset-md-1">
                        <div class="row">
                        <label for="title"><b>Localização Espacial:</b></label> 
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="subjective_spatial_location" id="superficial" value="superficial" {{ ($subjective->subjective_spatial_location) == "superficial" ? 'checked' : '' }} checked>
                            <label class="form-check-label" for="superficial">
                                Superficial 
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="subjective_spatial_location" id="median" value="mediana" {{  ($subjective->subjective_spatial_location) == "mediana" ? 'checked' : '' }} >
                            <label class="form-check-label" for="median">
                            Mediana
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="subjective_spatial_location" id="deep" value="profunda" {{  ($subjective->subjective_spatial_location) == "profunda" ? 'checked' : '' }}  >
                            <label class="form-check-label" for="deep">
                                Profunda
                            </label>
                        </div>
                        
                    </div>
                </div> 
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <label for="title"><b>Anotações  :</b></label> 
                        </div>

                        <textarea class="form-control @error('subjective_description') is-invalid @enderror" id="subjective_description" name="subjective_description"> {{ $subjective->subjective_description}} </textarea>
                            @error('subjective_description')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                            @enderror  
                        
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