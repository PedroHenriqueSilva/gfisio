@extends('layouts.main')

@section('title', 'Visualizar Avaliações')

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
                        <li class="breadcrumb-item"><a href="/users/patients">Paciente</a></li>
                        <li class="breadcrumb-item"><a href="">Avaliação Info</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ombro</li>
                    </ol>
            </nav>
        </div>  
    </div>
    <br>
</div> 

<div id="info-container" class="col-md-10 offset-md-1">
<br>
        @if($shoulder == "false")  
        <form action="/shoulder/store/{{$dynamop['id']}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="title">Flexão Direita:</label>
                    <input type="form-control @error('right_flexion') is-invalid @enderror" id="right_flexion" name="right_flexion" value="{{old('right_flexion')}}" > 
                    @error('right_flexion')
                        <div class="invalid-feedback">
                                {{$message}}
                        </div>
                    @enderror   
                </div>
                <div class="col-md-6">
                    <label for="title">Flexão Esquerda:</label>
                    <input type="form-control @error('left_flexion') is-invalid @enderror" id="left_flexion" name="left_flexion" value="{{old('left_flexion')}}" > 
                    @error('left_flexion')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror   
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="title">Extensão Direita:</label>
                    <input type="form-control @error('right_extension') is-invalid @enderror" id="right_extension" name="right_extension" value="{{old('right_extension')}}" > 
                    @error('right_extension')
                        <div class="invalid-feedback">
                                {{$message}}
                        </div>
                    @enderror   
                </div>
                <div class="col-md-6">
                    <label for="title">Extensão Esquerda:</label>
                    <input type="form-control @error('left_extension') is-invalid @enderror" id="left_extension" name="left_extension" value="{{old('left_extension')}}" > 
                    @error('left_extension')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror   
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="title">Rotação Externa Direita:</label>
                    <input type="form-control @error('right_external_rotation') is-invalid @enderror" id="right_external_rotation" name="right_external_rotation" value="{{old('right_external_rotation')}}" > 
                    @error('right_external_rotation')
                        <div class="invalid-feedback">
                                {{$message}}
                        </div>
                    @enderror   
                </div>
                <div class="col-md-6">
                    <label for="title">Rotação Externa Esquerda:</label>
                    <input type="form-control @error('left_external_rotation') is-invalid @enderror" id="left_external_rotation" name="left_external_rotation" value="{{old('left_external_rotation')}}" > 
                    @error('left_external_rotation')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror   
                </div>
            </div> 
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="title">Rotação Interna Direita:</label>
                    <input type="form-control @error('right_internal_rotation') is-invalid @enderror" id="right_internal_rotation" name="right_internal_rotation" value="{{old('right_internal_rotation')}}" > 
                    @error('right_internal_rotation')
                        <div class="invalid-feedback">
                                {{$message}}
                        </div>
                    @enderror   
                </div>
                <div class="col-md-6">
                    <label for="title">Rotação Interna Esquerda:</label>
                    <input type="form-control @error('left_internal_rotation') is-invalid @enderror" id="left_internal_rotation" name="left_internal_rotation" value="{{old('left_internal_rotation')}}" > 
                    @error('left_internal_rotation')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror   
                </div>
            </div> 
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="title">Abdução Direita:</label> 
                    <input type="form-control @error('right_abduction') is-invalid @enderror" id="right_abduction" name="right_abduction" value="{{old('right_abduction')}}" > 
                    @error('right_abduction')
                        <div class="invalid-feedback">
                                {{$message}}
                        </div>
                    @enderror   
                </div>
                <div class="col-md-6">
                    <label for="title">Abdução Esquerda:</label>
                    <input type="form-control @error('left_abduction') is-invalid @enderror" id="left_abduction" name="left_abduction" value="{{old('left_abduction')}}" > 
                    @error('left_abduction')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror   
                </div>
            </div> 
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="title">Empurrar Braço Horiz. Direita:</label> 
                    <input type="form-control @error('push_right_horizontal_arm') is-invalid @enderror" id="push_right_horizontal_arm" name="push_right_horizontal_arm" value="{{old('push_right_horizontal_arm')}}" > 
                    @error('push_right_horizontal_arm')
                        <div class="invalid-feedback">
                                {{$message}}
                        </div>
                    @enderror   
                </div>
                <div class="col-md-6">
                    <label for="title">Empurrar Braço Horiz. Esquerda:</label>
                    <input type="form-control @error('push_left_horizontal_arm') is-invalid @enderror" id="push_left_horizontal_arm" name="push_left_horizontal_arm" value="{{old('push_left_horizontal_arm')}}" > 
                    @error('push_left_horizontal_arm')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror   
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="title">Empurrar Braço Vert. Direita:</label> 
                    <input type="form-control @error('push_right_vertical_arm') is-invalid @enderror" id="push_right_vertical_arm" name="push_right_vertical_arm" value="{{old('push_right_vertical_arm')}}" > 
                    @error('push_right_vertical_arm')
                        <div class="invalid-feedback">
                                {{$message}}
                        </div>
                    @enderror   
                </div>
                <div class="col-md-6">
                    <label for="title">Empurrar Braço Vert. Esquerda:</label>
                    <input type="form-control @error('push_left_vertical_arm') is-invalid @enderror" id="push_left_vertical_arm" name="push_left_vertical_arm" value="{{old('push_left_vertical_arm')}}" > 
                    @error('push_left_vertical_arm')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror   
                </div>
            </div> 
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="title">Puxada Direita:</label> 
                    <input type="form-control @error('right_pull') is-invalid @enderror" id="right_pull" name="right_pull" value="{{old('right_pull')}}" > 
                    @error('right_pull')
                        <div class="invalid-feedback">
                                {{$message}}
                        </div>
                    @enderror   
                </div>
                <div class="col-md-6">
                    <label for="title">Puxada Esquerda:</label>
                    <input type="form-control @error('left_pull') is-invalid @enderror" id="left_pull" name="left_pull" value="{{old('left_pull')}}" > 
                    @error('left_pull')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror   
                </div>
            </div>  
                <br>
                <br>
            <div class="row">
                <div class="col-md-2 offset-md-11">   
                    <input type="submit" class="btn btn-dark" id="btn-register-avaliation" value="Salvar">
                </div>  
            </div>  
        @endif     
        </form>
</div>        
@endsection