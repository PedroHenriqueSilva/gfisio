@extends('layouts.main')

@section('title', 'Avaliações')

@section('content')
<div class="container">
   <br>
   <br> 
   <br>
    <div class="row align-items-end">
        <div class="col-md-10 offset-md-1" id="breadcrumbs">
            <nav aria-label="breadcrumb" >
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="/users/patients">Pacientes</a></li>
                        <li class="breadcrumb-item"><a href="">Avaliação</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Adicionar Exames</li>
                    </ol>
            </nav>
        </div>  
    </div>
</div> 

<div class="container col-md-10 offset-md-1" id="info-container" >
    <br>
    <form action="/exams/store/{{$avaliation_id}}" method="POST" enctype="multipart/form-data">
        @csrf      
            <div class="row">
                    <div class="col-md-6">
                        <label for="title">Nome:</label>
                        <input type="text"  class="form-control" id="name" name="name"> 
                    </div> 
                    <div class="col-md-3 offset-md-1">
                        <div class="form-group">
                            <label for="image">Exames:</label>
                            <input type="file" id="image" name="image" class="from-control-file">
                        </div>
                    </div>
            </div> 
                    <br>
            <div class=" row">
                <div class="col-md-10">
                    <label for="title">Descrição:</label>
                    <textarea class="form-control" id="description" name="description"> </textarea>
                </div> 
            </div>
        
            <div class="row">
                <div class="col-md-2 offset-md-11">   
                    <input type="submit" class="btn btn-dark" id="btn-register-avaliation" value="Salvar">
                </div>  
            </div>   
       
    </form>
</div>
        
@endsection