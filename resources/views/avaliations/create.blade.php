@extends('layouts.main')

@section('title', 'Avaliações')

@section('content')
<div class="col-md-3">
<nav aria-label="breadcrumb" >
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="/users/patients">Pacientes</a></li>
                        <li class="breadcrumb-item"><a href="/avaliations/{{$avaliationOwner['id']}}">Avaliação</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Criar Avaliação</li>
                    </ol>
                </nav>
</div>  
<div id="info-container" class="col-md-10 offset-md-1">
    <h6 id="title-users">Cadastrando Avaliação</h6>
      <br>
    <table class="table table-light">
            <thead>    
            </thead>
            <tbody>
                <tr class="col-md-10">
                <td class="col-md-4"><b>Paciente:</b>&nbsp {{$avaliationOwner['name']}}</td>
                <td class="col-md-4"><b>Data Nascimento:</b>&nbsp
                <?php
                            $data = new DateTime($avaliationOwner['date_nasc']);
                            echo $data->format('d-m-Y');
                        ?>
                </td>        
                
                </tr>
            </tbody>        
    </table>
<div class="col-md-12">
   <form action="/avaliations/store/{{$id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="title">Dor:</label>
                    <input type="text"  class="form-control" id="pain" name="pain"> 
                </div> 
            
            </div>            
            <div class="row">
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
</div>    
@endsection