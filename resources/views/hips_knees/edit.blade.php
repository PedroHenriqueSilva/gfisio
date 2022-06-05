@extends('layouts.main')

@section('title', 'Editar Hips_Knee')

@section('content')
<div class="pagetitle">
    <h1>Ombro</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/{{$avaliationOwtner['id']}}">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/{{$avaliationOwtner['id']}}">Avaliação </a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/{{$avaliation['id']}}">Avaliação Info</a></li>
            <li class="breadcrumb-item"><a href="/dynamop/info/{{$dynamop['avaliation_id']}}">Dynamop </a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Joelho-Quadril </li>
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
            <form action="/hip_knee/update/{{$hip_knee['id']}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="title">Extensão Quadril Direita:</label>
                        <input type="text" class="form-control @error('right_hip_extension') is-invalid @enderror" id="right_hip_extension" name="right_hip_extension" value="{{$hip_knee->right_hip_extension}}" > 
                        @error('right_hip_extension')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Extensão Quadril Esquerda:</label>
                        <input type="text" class="form-control @error('left_hip_extension') is-invalid @enderror" id="left_hip_extension" name="left_hip_extension" value="{{$hip_knee->left_hip_extension}}" > 
                        @error('left_hip_extension')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror   
                    </div>

                    <div class="col-md-3">
                        <label for="title">Flexão Quadril Direita:</label>
                        <input type="text" class="form-control @error('right_hip_flexion') is-invalid @enderror" id="right_hip_flexion" name="right_hip_flexion" value="{{$hip_knee->right_hip_flexion}}" > 
                        @error('right_hip_flexion')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Flexão Quadril Esquerda:</label>
                        <input type="text" class="form-control @error('left_hip_flexion') is-invalid @enderror" id="left_hip_flexion" name="left_hip_flexion" value="{{$hip_knee->left_hip_flexion}}" > 
                        @error('left_hip_flexion')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror   
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="title">Abdução Quadril Direita:</label>
                        <input type="text" class="form-control @error('right_hip_abduction') is-invalid @enderror" id="right_hip_abduction" name="right_hip_abduction" value="{{$hip_knee->right_hip_abduction}}" > 
                        @error('right_hip_abduction')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Abdução Quadril Esquerda:</label>
                        <input type="text" class="form-control @error('left_hip_abduction') is-invalid @enderror" id="left_hip_abduction" name="left_hip_abduction" value="{{$hip_knee->left_hip_abduction}}" > 
                        @error('left_hip_abduction')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror   
                    </div>
                
                    <div class="col-md-3">
                        <label for="title">Adução Quadril Direita:</label>
                        <input type="text" class="form-control @error('right_hip_adduction') is-invalid @enderror" id="right_hip_adduction" name="right_hip_adduction" value="{{$hip_knee->right_hip_adduction}}" > 
                        @error('right_hip_adduction')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Adução Quadril Esquerda:</label>
                        <input type="text" class="form-control @error('left_hip_adduction') is-invalid @enderror" id="left_hip_adduction" name="left_hip_adduction" value="{{$hip_knee->left_hip_adduction}}" > 
                        @error('left_hip_adduction')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror   
                    </div>
                </div> 
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="title">Flexão Joelho Direita:</label>
                        <input type="text" class="form-control @error('right_knee_flexion') is-invalid @enderror" id="right_knee_flexion" name="right_knee_flexion" value="{{$hip_knee->right_knee_flexion}}" > 
                        @error('right_knee_flexion')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Flexão Joelho Esquerda:</label>
                        <input type="text" class="form-control @error('left_knee_flexion') is-invalid @enderror" id="left_knee_flexion" name="left_knee_flexion" value="{{$hip_knee->left_knee_flexion}}" > 
                        @error('left_knee_flexion')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror   
                    </div>
                
                    <div class="col-md-3">
                        <label for="title">Extensão Joelho Direita:</label>
                        <input type="text" class="form-control @error('right_knee_extension') is-invalid @enderror" id="right_knee_extension" name="right_knee_extension" value="{{$hip_knee->right_knee_extension}}" > 
                        @error('right_knee_extension')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Extensão Joelho Esquerda:</label>
                        <input type="text" class="form-control @error('left_knee_extension') is-invalid @enderror" id="left_knee_extension" name="left_knee_extension" value="{{$hip_knee->left_knee_extension}}" > 
                        @error('left_hip_adduction')
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