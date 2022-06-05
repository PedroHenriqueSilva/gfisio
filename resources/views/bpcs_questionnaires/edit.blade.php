@extends('layouts.main')

@section('title', 'Edit Questionário BPCS')

@section('content')
<div class="pagetitle">
    <h1>Questionário BPCS</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/{{$avaliationOwtner['id']}}">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/{{$avaliation['id']}}">Avaliação Info</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Questionário BPCS</li>
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
            <form action="/bpcs_questionnaire/update/{{$bpcs_questionnaire->id}}" method="POST" enctype="multipart/form-data">
                @csrf  
                @method('PUT')  
                <table class="table table-light"> 
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group col-md-4">
                                        <label for="title">BPCS img:</label>
                                
                                        <input type="file" class="form-control-file @error('bpcs_img') is-invalid @enderror" id="bpcs_img" name="bpcs_img" > 
                                            <a href="/img/bpcs_questionnaire/{{ $bpcs_questionnaire->bpcs_img }}">
                                                <img src="/img/bpcs_questionnaire/{{ $bpcs_questionnaire->bpcs_img}}" alt="{{ $bpcs_questionnaire->bpcs_img}}" class="img-preview">
                                            </a>
                                        @error('bpcs_img')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror  
                                    </div> 
                                </td>
                                <td>  
                    
                                    <div class="form-group col-md-4">
                                        <label for="title">Score:</label>
                                        <input type="text"  class="form-control @error('bpcs_score') is-invalid @enderror" id="bpcs_score" name="bpcs_score"  value="{{$bpcs_questionnaire->bpcs_score}}"> 
                                        @error('bpcs_score')
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
                        <input type="submit" class="btn btn-dark" id="btn_salvar" value="Editar">
                    </div>   
                </div>   
            </form>
        </div>
    </div>
</section>

@endsection