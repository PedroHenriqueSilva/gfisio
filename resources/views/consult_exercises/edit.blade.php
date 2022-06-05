@extends('layouts.main')

@section('title', 'Consults Exercises')

@section('content')
<div class="pagetitle">
    <h1>Editar Exercício Consulta</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="">Paciente</a></li>
            <li class="breadcrumb-item"><a href="">Avaliação</a></li>
            <li class="breadcrumb-item"><a href="">Consulta</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Exercícios Consulta</li>
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
                            <b>Nome:</b>&nbsp  @foreach($data as $d) {{$d['name']}} @endforeach
                        </div>
                        <div class="col-lg-4">
                            <b>Data Avaliação:</b> &nbsp  @foreach($data as $d){{ date( 'd-m-Y' , strtotime($d['date_nasc']))}} @endforeach
                        </div> 
                        <div class="col-lg-4">
                            <b>Data Consulta:</b> &nbsp   @foreach($data as $d){{ date( 'd-m-Y' , strtotime($d['date_consult']))}} @endforeach
                        </div> 
                    </div>                             
                </div>
            </div>       
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="/consult_exercises/update/{{$consult_exercises->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
                <div class="card">
                    <div class="card-header">
                        Editar Cadastro Exercício 
                    </div>

                    <div class="card-body">
                        <table class="table" >
                            <thead>
                            <tr>
                                
                                <th>Séries</th>
                                <th>Quantidade</th>
                                <th>Execução</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                                <tr>
                                    
                                    <td>
                                    <input type="text" class="form-control @error('serie') is-invalid @enderror" id="serie" name="serie" value="{{$consult_exercises->serie}}">
                                        @error('serie')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror     
                                                                            
                                    </td>
                                    <td>
                                        <input type="text" class="form-control @error('repeat') is-invalid @enderror" id="repeat" name="repeat" value="{{$consult_exercises->repeat}}">
                                        @error('repeat')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror     
                                    </td>
                                    <td>
                                        <textarea name="execution" class="form-control @error('execution') is-invalid @enderror" id="execution" >{{$consult_exercises->execution}}</textarea>
                                        @error('execution')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror                            
                                    </td>
                                    
                                </tr>
                            
                            </tbody>
                        </table>

                        
                    </div>
                    <div class="col-md-1 offset-md-5">
                            <input class="btn btn-dark" type="submit" value="Editar ">
                        </div>
                        <br>
                </div>
            <br>
            </form>
        </div>
    </div>
</section>    

@endsection