@extends('layouts.main')

@section('title', 'Edit historic')

@section('content')
<div class="pagetitle">
    <h1>Editar Histórico</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/{{$avaliationOwtner['id']}}">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/{{$avaliationOwtner['id']}}">Avaliação</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/{{$avaliation['id']}}">Avaliação Info</a></li>
            <li class="breadcrumb-item"><a href="/historic/show/{{$historic['id']}}">Histórico</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Histórico</li>
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
                                <b>Data Nasc:</b> &nbsp {{date( 'd-m-Y' , strtotime($avaliationOwtner['date_nasc']))}} 
                            </div> 
                        </div>
                    </div>
                </div>       
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="/historic/update/{{$historic->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <label for="title">Diagnóstico médico:</label>
                            <textarea class="form-control @error('medical_diagnostic') is-invalid @enderror" id="medical_diagnostic" name="medical_diagnostic"> {{$historic->medical_diagnostic}}</textarea>
                            @error('medical_diagnostic')
                                <div class="invalid-feedback">
                                        {{$message}}
                                </div>
                            @enderror   
                        </div>
                        <div class="col-md-6">
                            <label for="title">Medicação:</label>
                            <textarea class="form-control @error('medication') is-invalid @enderror" id="medication" name="medication" >{{$historic->medication}} </textarea>
                            @error('medication')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror   
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-8">
                            <label for="title">Queixa principal:</label>
                            <textarea class="form-control @error('complaint') is-invalid @enderror" id="complaint" name="complaint">{{$historic->complaint}} </textarea>
                            @error('complaint')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror   
                        </div>
                    </div>  
                    <br>
                    <div class="row">  
                        <div class="col-md-12">
                            <label for="title">História:</label>
                            <textarea class="form-control @error('story') is-invalid @enderror" id="story" name="story" > {{$historic->story}}</textarea>
                            @error('story')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror   
                        </div>
                    </div>
                    <br>
                
                    <div class="row">
                        <div class="col-md-2 ">   
                            <input type="submit" class="btn btn-dark" value="Editar">
                        </div>  
                    </div>   
            </form>
        </div>
    </div>
</section>
<br><br>
@endsection