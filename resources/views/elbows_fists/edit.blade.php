@extends('layouts.main')

@section('title', 'Edit Cotovelo/Punho')

@section('content')
<div class="pagetitle">
    <h1>Editar Cotovelo-Punho</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/{{$avaliationOwtner['id']}}">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/{{$avaliationOwtner['id']}}">Avaliação </a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/{{$avaliation['id']}}">Avaliação Info</a></li>
            <li class="breadcrumb-item"><a href="/dynamop/info/{{$dynamop['avaliation_id']}}">Dynamop </a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Cotovelo-Punho </li>
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
            <form action="/elbow_fist/update/{{$elbow_fist['id']}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="title">Flexão Cotovelo Direita:</label>
                        <input type="text" class="form-control @error('right_elbow_flexion') is-invalid @enderror" id="right_elbow_flexion" name="right_elbow_flexion" value="{{$elbow_fist->right_elbow_flexion}}" > 
                        @error('right_elbow_flexion')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Flexão Cotovelo Esquerda:</label>
                        <input type="text" class="form-control @error('left_elbow_flexion') is-invalid @enderror" id="left_elbow_flexion" name="left_elbow_flexion" value="{{$elbow_fist->left_elbow_flexion}}" >  
                        @error('left_elbow_flexion')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror   
                    </div>
                                
                    <div class="col-md-3">
                        <label for="title">Extensão Cotovelo Direita:</label>
                        <input type="text" class="form-control @error('right_elbow_extension') is-invalid @enderror" id="right_elbow_extension" name="right_elbow_extension" value="{{$elbow_fist->right_elbow_extension}}" >  
                        @error('right_elbow_extension')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Extensão Cotovelo Esquerda:</label>
                        <input type="text" class="form-control @error('left_elbow_extension') is-invalid @enderror" id="left_elbow_extension" name="left_elbow_extension" value="{{$elbow_fist->left_elbow_extension}}" >   
                        @error('left_elbow_extension')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror   
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="title">Flexão Punho Direita:</label>
                        <input type="text" class="form-control @error('right_fist_flexion') is-invalid @enderror" id="right_fist_flexion" name="right_fist_flexion" value="{{$elbow_fist->right_fist_flexion}}" >  
                        @error('right_fist_flexion')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Flexão Punho Esquerda:</label>
                        <input type="text" class="form-control @error('left_fist_flexion') is-invalid @enderror" id="left_fist_flexion" name="left_fist_flexion" value="{{$elbow_fist->left_fist_flexion}}" >  
                        @error('left_fist_flexion')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror   
                    </div>
                
                    <div class="col-md-3">
                        <label for="title">Extensão Punho Direita:</label>
                        <input type="text" class="form-control @error('right_fist_extension') is-invalid @enderror" id="right_fist_extension" name="right_fist_extension" value="{{$elbow_fist->right_fist_extension}}" >  
                        @error('right_fist_extension')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Extensão Punho Esquerda:</label>
                        <input type="text" class="form-control @error('left_fist_extension') is-invalid @enderror" id="left_fist_extension" name="left_fist_extension" value="{{$elbow_fist->left_fist_extension}}" >  
                        @error('left_fist_extension')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror   
                    </div>
                </div> 
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="title">Supinação Direita:</label>
                        <input type="text" class="form-control @error('right_supination') is-invalid @enderror" id="right_supination" name="right_supination" value="{{$elbow_fist->right_supination}}" >  
                        @error('right_supination')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Supinação Esquerda:</label>
                        <input type="text" class="form-control @error('left_supination') is-invalid @enderror" id="left_supination" name="left_supination" value="{{$elbow_fist->left_supination}}" >  
                        @error('left_supination')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror   
                    </div>
                
                    <div class="col-md-3">
                        <label for="title">Pronação Direita:</label>
                        <input type="text" class="form-control @error('right_pronation') is-invalid @enderror" id="right_pronation" name="right_pronation" value="{{$elbow_fist->right_pronation}}" >  
                        @error('right_pronation')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Pronação Esquerda:</label>
                        <input type="text" class="form-control @error('left_pronation') is-invalid @enderror" id="left_pronation" name="left_pronation" value="{{$elbow_fist->left_pronation}}" >  
                        @error('left_pronation')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror   
                    </div>
                </div> 
                <br>
                <br>
                <div class="row">
                    <div class="col-md-2 offset-md-5">   
                        <input type="submit" class="btn btn-dark"  value="Editar">
                    </div>  
                </div> 
            </form> 
        </div>
    </div>
</section>
  
@endsection