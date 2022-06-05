@extends('layouts.main')

@section('title', 'Editar Shoulder')

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
            <li class="breadcrumb-item active" aria-current="page">Ombro</li>
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
            <form action="/shoulder/update/{{$shoulder['id']}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="title">Flexão Direita:</label>
                        <input type="text" class="form-control @error('right_flexion') is-invalid @enderror" id="right_flexion" name="right_flexion" value="{{$shoulder->right_flexion}}" > 
                        @error('right_flexion')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Flexão Esquerda:</label>
                        <input type="text" class="form-control  @error('left_flexion') is-invalid @enderror" id="left_flexion" name="left_flexion" value="{{$shoulder->left_flexion}}" > 
                        @error('left_flexion')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror   
                    </div>
            
                    <div class="col-md-3">
                        <label for="title">Extensão Direita:</label>
                        <input type="text" class="form-control  @error('right_extension') is-invalid @enderror" id="right_extension" name="right_extension" value="{{$shoulder->right_extension}}" > 
                        @error('right_extension')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Extensão Esquerda:</label>
                        <input type="text" class="form-control @error('left_extension') is-invalid @enderror" id="left_extension" name="left_extension" value="{{$shoulder->left_extension}}" > 
                        @error('left_extension')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror   
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="title">Rotação Externa Direita:</label>
                        <input type="text" class="form-control  @error('right_external_rotation') is-invalid @enderror" id="right_external_rotation" name="right_external_rotation" value="{{$shoulder->right_external_rotation}}" > 
                        @error('right_external_rotation')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Rotação Externa Esquerda:</label>
                        <input type="text" class="form-control @error('left_external_rotation') is-invalid @enderror" id="left_external_rotation" name="left_external_rotation" value="{{$shoulder->left_external_rotation}}" > 
                        @error('left_external_rotation')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror   
                    </div>
                
                    <div class="col-md-3">
                        <label for="title">Rotação Interna Direita:</label>
                        <input type="text" class="form-control  @error('right_internal_rotation') is-invalid @enderror" id="right_internal_rotation" name="right_internal_rotation" value="{{$shoulder->right_internal_rotation}}" > 
                        @error('right_internal_rotation')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Rotação Interna Esquerda:</label>
                        <input type="text" class="form-control  @error('left_internal_rotation') is-invalid @enderror" id="left_internal_rotation" name="left_internal_rotation" value="{{$shoulder->left_internal_rotation}}" > 
                        @error('left_internal_rotation')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror   
                    </div>
                </div> 
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="title">Abdução Direita:</label> 
                        <input type="text" class="form-control  @error('right_abduction') is-invalid @enderror" id="right_abduction" name="right_abduction" value="{{$shoulder->right_abduction}}" > 
                        @error('right_abduction')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Abdução Esquerda:</label>
                        <input type="text" class="form-control  @error('left_abduction') is-invalid @enderror" id="left_abduction" name="left_abduction" value="{{$shoulder->left_abduction}}" > 
                        @error('left_abduction')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror   
                    </div>
                    
                    <div class="col-md-3">
                        <label for="title">Empurrar Braço Horiz. Direita:</label> 
                        <input type="text" class="form-control  @error('push_right_horizontal_arm') is-invalid @enderror" id="push_right_horizontal_arm" name="push_right_horizontal_arm" value="{{$shoulder->push_right_horizontal_arm}}" > 
                        @error('push_right_horizontal_arm')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Empurrar Braço Horiz. Esquerda:</label>
                        <input type="text" class="form-control  @error('push_left_horizontal_arm') is-invalid @enderror" id="push_left_horizontal_arm" name="push_left_horizontal_arm" value="{{$shoulder->push_left_horizontal_arm}}" > 
                        @error('push_left_horizontal_arm')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror   
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="title">Empurrar Braço Vert. Direita:</label> 
                        <input type="text" class="form-control  @error('push_right_vertical_arm') is-invalid @enderror" id="push_right_vertical_arm" name="push_right_vertical_arm" value="{{$shoulder->push_right_vertical_arm}}" > 
                        @error('push_right_vertical_arm')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Empurrar Braço Vert. Esquerda:</label>
                        <input type="text" class="form-control  @error('push_left_vertical_arm') is-invalid @enderror" id="push_left_vertical_arm" name="push_left_vertical_arm" value="{{$shoulder->push_left_vertical_arm}}" > 
                        @error('push_left_vertical_arm')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror   
                    </div>
                
                    <div class="col-md-3">
                        <label for="title">Puxada Direita:</label> 
                        <input type="text" class="form-control  @error('right_pull') is-invalid @enderror" id="right_pull" name="right_pull" value="{{$shoulder->right_pull}}" > 
                        @error('right_pull')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Puxada Esquerda:</label>
                        <input type="text" class="form-control  @error('left_pull') is-invalid @enderror" id="left_pull" name="left_pull" value="{{$shoulder->left_pull}}" > 
                        @error('left_pull')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror   
                    </div>
                </div>  
                <br>
                <div class="row">
                    <div class="col-md-2 offset-md-5">   
                        <input type="submit" class="btn btn-dark" value="Editar">
                    </div>  
                </div>
                <br>  
            </form>
        </div>
    </div>
</section>    
<br>
     
@endsection