@extends('layouts.main')

@section('title', 'Editando Exame')

@section('content')
<div class="pagetitle">
    <h1>Editar Exame</h1>
    <nav aria-label="breadcrumb" >
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="users/show/{{$avaliationOwtner['id']}}">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/{{$avaliation['id']}}">Avaliação Info</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Exame</li>
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
            <form action="/exams/update/{{$exam->id}}" method="POST" enctype="multipart/form-data">
                @csrf     
                @method('PUT')
                <div class="row">
                        <div class="col-md-6">
                            <label for="title">Nome:</label>
                            <input type="text"  class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $exam->name }}"> 
                            @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div> 
                        <div class="col-md-3 offset-md-1">
                            <div class="form-group">
                                <label for="image">Exames:</label>
                                <input type="file" id="image" name="image" class="from-control-file">
                                <a href="/img/patients/{{ $exam->image }}">
                                    <img src="/img/patients/{{ $exam->image }}" alt="{{ $exam->name }}" class="img-preview">
                                </a>
                            </div>
                        </div>
                </div> 
                        <br>
                <div class=" row">
                    <div class="col-md-10">
                        <label for="title">Descrição:</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"> {{ $exam->description }} </textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div> 
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2">   
                        <input type="submit" class="btn btn-dark" value="Editar">
                    </div>  
                </div>   
            </form>
        </div>
    </div>
</section>

@endsection