@extends('layouts.main')

@section('title', 'Edit Questionnnaire AEDC')

@section('content')
<div class="pagetitle">
    <h1>Editar Questionário AEDC</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/{{$avaliationOwtner['id']}}">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/{{$avaliation['id']}}">Avaliação Info</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Questionário AEDC</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card text-white bg-dark">
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
            <form action="/aedc_questionnaire/update/{{$aedc_questionnaire->id}}" method="POST" enctype="multipart/form-data">
                @csrf  
                @method('PUT')  
                <br>  
                <table class="table table-light"> 
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group col-md-4">
                                    <label for="title">AEDC img:</label>
                            
                                    <input type="file" class="form-control-file @error('aedc_img') is-invalid @enderror" id="aedc_img" name="aedc_img "> 
                                        <a href="/img/aedc_questionnaire/{{ $aedc_questionnaire->aedc_img }}">
                                            <img src="/img/aedc_questionnaire/{{ $aedc_questionnaire->aedc_img}}" alt="{{ $aedc_questionnaire->aedc_img}}" class="img-preview">
                                        </a>
                                    @error('aedc_img')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror  
                                </div> 
                            </td>
                            <td>  
                
                                <div class="form-group col-md-4">
                                        <label for="title">Score:</label>
                                        <input type="text"  class="form-control @error('aedc_score') is-invalid @enderror" id="aedc_score" name="aedc_score"  value="{{$aedc_questionnaire->aedc_score}}"> 
                                        @error('aedc_score')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror  
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                        <br>
                <div class="row">
                    <div class="col-md-2 offset-md-5">   
                        <input type="submit" class="btn btn-dark" value="Editar">
                    </div>   
                </div>   
            </form>
        </div>
    </div>
</section>    
 

@endsection