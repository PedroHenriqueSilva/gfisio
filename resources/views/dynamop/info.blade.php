@extends('layouts.main')

@section('title', 'Dynamop') 

@section('content')
<div class="pagetitle">
    <h1>Dynamop</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/{{$avaliationOwtner['id']}}">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/{{$avaliationOwtner['id']}}">Avaliação</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/{{$avaliation['id']}}">Avaliação Info</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dynamop</li>
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
            @if($dynamop == 'false')      
                <a href="/dynamop/store/{{$avaliation['id']}}" class="btn btn-dark">Novo</a> 
            @else        
                <a href="/pdfs/pdf_dynamop/{{$dynamop['id']}}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Imprimir">Imprimir</a>    
                <br><br>
                <div class="card">
                    <div class="card-body">
                        <!-- Default Tabs -->
                        <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100 active" id="shoulder-tab" data-bs-toggle="tab" data-bs-target="#shoulder-justified" type="button" role="tab" aria-controls="shoulder" aria-selected="true">Ombro</button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="hip_knee-tab" data-bs-toggle="tab" data-bs-target="#hip_knee-justified" type="button" role="tab" aria-controls="hip_knee" aria-selected="false">Quadril/Joelho</button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="elbow_fist-tab" data-bs-toggle="tab" data-bs-target="#elbow_fist-justified" type="button" role="tab" aria-controls="elbow_fist" aria-selected="false">Cotovelo/Punho</button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="ankle-tab" data-bs-toggle="tab" data-bs-target="#ankle-justified" type="button" role="tab" aria-controls="ankle" aria-selected="false">Tornozelo</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2" id="myTabjustifiedContent">
                            <!-- shoulder -->
                            <div class="tab-pane fade show active" id="shoulder-justified" role="tabpanel" aria-labelledby="shoulder-tab">
                                @if($shoulder=='false')<br>    
                                    <form action="/shoulder/store/{{$dynamop['id']}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="title">Flexão Direita:</label>
                                                <input type="text" class="form-control @error('right_flexion') is-invalid @enderror" id="right_flexion" name="right_flexion" value="{{old('right_flexion')}}" > 
                                                @error('right_flexion')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Flexão Esquerda:</label>
                                                <input type="text" class="form-control @error('left_flexion') is-invalid @enderror" id="left_flexion" name="left_flexion" value="{{old('left_flexion')}}" > 
                                                @error('left_flexion')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                    
                                            <div class="col-md-3">
                                                <label for="title">Extensão Direita:</label>
                                                <input type="text" class="form-control @error('right_extension') is-invalid @enderror" id="right_extension" name="right_extension" value="{{old('right_extension')}}" > 
                                                @error('right_extension')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Extensão Esquerda:</label>
                                                <input type="text" class="form-control @error('left_extension') is-invalid @enderror" id="left_extension" name="left_extension" value="{{old('left_extension')}}" > 
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
                                                <input type="text" class="form-control @error('right_external_rotation') is-invalid @enderror" id="right_external_rotation" name="right_external_rotation" value="{{old('right_external_rotation')}}" > 
                                                @error('right_external_rotation')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Rotação Externa Esquerda:</label>
                                                <input type="text" class="form-control @error('left_external_rotation') is-invalid @enderror" id="left_external_rotation" name="left_external_rotation" value="{{old('left_external_rotation')}}" > 
                                                @error('left_external_rotation')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                        
                                            <div class="col-md-3">
                                                <label for="title">Rotação Interna Direita:</label>
                                                <input type="text" class="form-control @error('right_internal_rotation') is-invalid @enderror" id="right_internal_rotation" name="right_internal_rotation" value="{{old('right_internal_rotation')}}" > 
                                                @error('right_internal_rotation')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Rotação Interna Esquerda:</label>
                                                <input type="text" class="form-control @error('left_internal_rotation') is-invalid @enderror" id="left_internal_rotation" name="left_internal_rotation" value="{{old('left_internal_rotation')}}" > 
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
                                                <input type="text" class="form-control @error('right_abduction') is-invalid @enderror" id="right_abduction" name="right_abduction" value="{{old('right_abduction')}}" > 
                                                @error('right_abduction')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Abdução Esquerda:</label>
                                                <input type="text" class="form-control @error('left_abduction') is-invalid @enderror" id="left_abduction" name="left_abduction" value="{{old('left_abduction')}}" > 
                                                @error('left_abduction')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                        
                                            <div class="col-md-3">
                                                <label for="title">Empurrar Braço Horiz. Direita:</label> 
                                                <input type="text" class="form-control @error('push_right_horizontal_arm') is-invalid @enderror" id="push_right_horizontal_arm" name="push_right_horizontal_arm" value="{{old('push_right_horizontal_arm')}}" > 
                                                @error('push_right_horizontal_arm')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Empurrar Braço Horiz. Esquerda:</label>
                                                <input type="text" class="form-control @error('push_left_horizontal_arm') is-invalid @enderror" id="push_left_horizontal_arm" name="push_left_horizontal_arm" value="{{old('push_left_horizontal_arm')}}" > 
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
                                                <input type="text" class="form-control @error('push_right_vertical_arm') is-invalid @enderror" id="push_right_vertical_arm" name="push_right_vertical_arm" value="{{old('push_right_vertical_arm')}}" > 
                                                @error('push_right_vertical_arm')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Empurrar Braço Vert. Esquerda:</label>
                                                <input type="text" class="form-control @error('push_left_vertical_arm') is-invalid @enderror" id="push_left_vertical_arm" name="push_left_vertical_arm" value="{{old('push_left_vertical_arm')}}" > 
                                                @error('push_left_vertical_arm')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                    
                                            <div class="col-md-3">
                                                <label for="title">Puxada Direita:</label> 
                                                <input type="text" class="form-control @error('right_pull') is-invalid @enderror" id="right_pull" name="right_pull" value="{{old('right_pull')}}" > 
                                                @error('right_pull')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Puxada Esquerda:</label>
                                                <input type="text" class="form-control @error('left_pull') is-invalid @enderror" id="left_pull" name="left_pull" value="{{old('left_pull')}}" > 
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
                                            <div class="col-md-2 offset-md-5">   
                                                <input type="submit" class="btn btn-dark" value="Salvar">
                                            </div>  
                                        </div>  
                                
                                    </form>
                                    <br>
                                    <br>
                                @else
                                    <br>
                                    <div class="row">
                                        <table class="table table-white">
                                            <tbody>
                                                <tr>
                                                    <td><b>Flexão Direita: </b>{{$shoulder['right_flexion']}}</td>
                                                    <td><b>Flexão Esquerda: </b>{{$shoulder['left_flexion']}}</td>
                                                    <td><b>Extensão Direita: </b>{{$shoulder['right_extension']}}</td>
                                                    <td><b>Extensão Esquerda: </b>{{$shoulder['left_extension']}}</td>
                                                <tr>   
                                                <tr>
                                                    <td><b>Rotação Externa Direita: </b>{{$shoulder['right_external_rotation']}}</td>
                                                    <td><b>Rotação Externa Esquerda: </b>{{$shoulder['left_external_rotation']}}</td>
                                                    <td><b>Rotação Interna Direita: </b>{{$shoulder['right_internal_rotation']}}</td>
                                                    <td><b>Rotação Interna Esquerda: </b>{{$shoulder['left_internal_rotation']}}</td>
                                                <tr>  
                                                <tr>
                                                    <td><b>Abdução Direita: </b>{{$shoulder['right_abduction']}}</td>
                                                    <td><b>Abdução Esquerda: </b>{{$shoulder['left_abduction']}}</td>
                                                    <td><b>Empurrar Braço Horiz. Direita: </b>{{$shoulder['push_right_horizontal_arm']}}</td>
                                                    <td><b>Empurrar Braço Horiz. Esquerda: </b>{{$shoulder['push_left_horizontal_arm']}}</td>
                                                <tr>   
                                                <tr>
                                                    <td><b>Empurrar Braço Horiz. Direita: </b>{{$shoulder['push_right_vertical_arm']}}</td>
                                                    <td><b>Empurrar Braço Horiz. Esquerda:</b>{{$shoulder['push_left_vertical_arm']}}</td>
                                                    <td><b>Puxada Direita: </b>{{$shoulder['right_pull']}}</td>
                                                    <td><b>Puxada Esquerda:  </b>{{$shoulder['left_pull']}}</td>
                                                <tr>          
                                            </tbody>
                                        </table>
                                    </div>     
                                    <br>
                                    <div class="row">
                                        <div class="col-md-10 offset-md-1 text-center" >
                                            <a href="/shoulder/edit/{{$shoulder['id']}}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Editar"> Editar</a>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir_shoulder_modal" data-id="{{$shoulder['id']}}">Excluir</button>
                                            <a href="/shoulder/relatorio/{{$shoulder['id']}}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Relatorio"> Relatório</a>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                @endif  
                            </div>
                            <!-- hip_Knee -->
                            <div class="tab-pane fade" id="hip_knee-justified" role="tabpanel" aria-labelledby="hip_knee-tab">
                                @if($hip_knee=="false")   <br> 
                                    <form action="/hip_knee/store/{{$dynamop['id']}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="title">Extensão Quadril Direita:</label>
                                                <input type="text" class="form-control @error('right_hip_extension') is-invalid @enderror" id="right_hip_extension" name="right_hip_extension" value="{{old('right_hip_extension')}}" > 
                                                @error('right_hip_extension')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Extensão Quadril Esquerda:</label>
                                                <input type="text" class="form-control @error('left_hip_extension') is-invalid @enderror" id="left_hip_extension" name="left_hip_extension" value="{{old('left_hip_extension')}}" > 
                                                @error('left_hip_extension')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                    
                                            <div class="col-md-3">
                                                <label for="title">Flexão Quadril Direita:</label>
                                                <input type="text" class="form-control @error('right_hip_flexion') is-invalid @enderror" id="right_hip_flexion" name="right_hip_flexion" value="{{old('right_hip_flexion')}}" > 
                                                @error('right_hip_flexion')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Flexão Quadril Esquerda:</label>
                                                <input type="text" class="form-control @error('left_hip_flexion') is-invalid @enderror" id="left_hip_flexion" name="left_hip_flexion" value="{{old('left_hip_flexion')}}" > 
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
                                                <input type="text" class="form-control @error('right_hip_abduction') is-invalid @enderror" id="right_hip_abduction" name="right_hip_abduction" value="{{old('right_hip_abduction')}}" > 
                                                @error('right_hip_abduction')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Abdução Quadril Esquerda:</label>
                                                <input type="text" class="form-control @error('left_hip_abduction') is-invalid @enderror" id="left_hip_abduction" name="left_hip_abduction" value="{{old('left_hip_abduction')}}" > 
                                                @error('left_hip_abduction')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                        
                                            <div class="col-md-3">
                                                <label for="title">Adução Quadril Direita:</label>
                                                <input type="text" class="form-control @error('right_hip_adduction') is-invalid @enderror" id="right_hip_adduction" name="right_hip_adduction" value="{{old('right_hip_adduction')}}" > 
                                                @error('right_hip_adduction')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Adução Quadril Esquerda:</label>
                                                <input type="text" class="form-control @error('left_hip_adduction') is-invalid @enderror" id="left_hip_adduction" name="left_hip_adduction" value="{{old('left_hip_adduction')}}" > 
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
                                                <input type="text" class="form-control @error('right_knee_flexion') is-invalid @enderror" id="right_knee_flexion" name="right_knee_flexion" value="{{old('right_knee_flexion')}}" > 
                                                @error('right_knee_flexion')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Flexão Joelho Esquerda:</label>
                                                <input type="text" class="form-control @error('left_knee_flexion') is-invalid @enderror" id="left_knee_flexion" name="left_knee_flexion" value="{{old('left_knee_flexion')}}" > 
                                                @error('left_knee_flexion')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                        
                                            <div class="col-md-3">
                                                <label for="title">Extensão Joelho Direita:</label>
                                                <input type="text" class="form-control @error('right_knee_extension') is-invalid @enderror" id="right_knee_extension" name="right_knee_extension" value="{{old('right_knee_extension')}}" > 
                                                @error('right_knee_extension')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Extensão Joelho Esquerda:</label>
                                                <input type="text" class="form-control @error('left_knee_extension') is-invalid @enderror" id="left_knee_extension" name="left_knee_extension" value="{{old('left_knee_extension')}}" > 
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
                                            <div class="col-md-2 offset-md-6">   
                                                <input type="submit" class="btn btn-dark" id="btn_salvar" value="Salvar">
                                            </div>  
                                        </div> 
                                    </form>
                                    <br>
                                    <br>
                                @else
                                     <br>
                                    <div class="row">
                                        <table class="table table-white">
                                            <tbody>
                                                <tr>
                                                    <td><b>Extensão Quadril Direita: </b>{{$hip_knee['right_hip_extension']}}</td>
                                                    <td><b>Extensão Quadril Esquerda: </b>{{$hip_knee['left_hip_extension']}}</td>
                                                    <td><b>Flexão Quadril Direita: </b>{{$hip_knee['right_hip_flexion']}}</td>
                                                    <td><b>Flexão Quadril Esquerda: </b>{{$hip_knee['left_hip_flexion']}}</td>
                                                <tr>   
                                                <tr>
                                                    <td><b>Abdução Quadril Direita: </b>{{$hip_knee['right_hip_abduction']}}</td>
                                                    <td><b>Abdução Quadril Esquerda: </b>{{$hip_knee['left_hip_abduction']}}</td>
                                                    <td><b>Adução Quadril Direita: </b>{{$hip_knee['right_hip_adduction']}}</td>
                                                    <td><b>Adução Quadril Esquerda:</b>{{$hip_knee['left_hip_adduction']}}</td>
                                                <tr>  
                                                <tr>
                                                    <td><b>Flexão Joelho Direita: </b>{{$hip_knee['right_knee_flexion']}}</td>
                                                    <td><b>Flexão Joelho Esquerda: </b>{{$hip_knee['left_knee_flexion']}}</td>
                                                    <td><b>Extensão Joelho Direita: </b>{{$hip_knee['right_knee_extension']}}</td>
                                                    <td><b>Extensão Joelho Esquerda: </b>{{$hip_knee['left_knee_extension']}}</td>
                                                <tr> 
                                                    
                                            </tbody>
                                        </table>
                                    </div>      
                                    <br>
                                    <div class="row">
                                        <div class="col-md-10 offset-md-1 text-center" >
                                            <a href="/hip_knee/edit/{{$hip_knee['id']}}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Editar"> Editar</a>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir_hip_modal" data-id="{{$hip_knee['id']}}">Excluir</button>
                                            <a href="/hip_knee/relatorio/{{$hip_knee['id']}}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Relatorio"> Relatório</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!-- elbow_fist -->
                            <div class="tab-pane fade" id="elbow_fist-justified" role="tabpanel" aria-labelledby="elbow_fist-tab">
                                @if($elbow_fist=="false")    
                                    <form action="/elbow_fist/store/{{$dynamop['id']}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="title">Flexão Cotovelo Direita:</label>
                                                <input type="text" class="form-control @error('right_elbow_flexion') is-invalid @enderror" id="right_elbow_flexion" name="right_elbow_flexion" value="{{old('right_elbow_flexion')}}" > 
                                                @error('right_elbow_flexion')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Flexão Cotovelo Esquerda:</label>
                                                <input type="text" class="form-control @error('left_elbow_flexion') is-invalid @enderror" id="left_elbow_flexion" name="left_elbow_flexion" value="{{old('left_elbow_flexion')}}" > 
                                                @error('left_elbow_flexion')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                    
                                            <div class="col-md-3">
                                                <label for="title">Extensão Cotovelo Direita:</label>
                                                <input type="text" class="form-control @error('right_elbow_extension') is-invalid @enderror" id="right_elbow_extension" name="right_elbow_extension" value="{{old('right_elbow_extension')}}" > 
                                                @error('right_elbow_extension')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Extensão Cotovelo Esquerda:</label>
                                                <input type="text" class="form-control @error('left_elbow_extension') is-invalid @enderror" id="left_elbow_extension" name="left_elbow_extension" value="{{old('left_elbow_extension')}}" > 
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
                                                <input type="text" class="form-control @error('right_fist_flexion') is-invalid @enderror" id="right_fist_flexion" name="right_fist_flexion" value="{{old('right_fist_flexion')}}" > 
                                                @error('right_fist_flexion')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Flexão Punho Esquerda:</label>
                                                <input type="text" class="form-control @error('left_fist_flexion') is-invalid @enderror" id="left_fist_flexion" name="left_fist_flexion" value="{{old('left_fist_flexion')}}" > 
                                                @error('left_fist_flexion')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                        
                                            <div class="col-md-3">
                                                <label for="title">Extensão Punho Direita:</label>
                                                <input type="text" class="form-control @error('right_fist_extension') is-invalid @enderror" id="right_fist_extension" name="right_fist_extension" value="{{old('right_fist_extension')}}" > 
                                                @error('right_fist_extension')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Extensão Punho Esquerda:</label>
                                                <input type="text" class="form-control @error('left_fist_extension') is-invalid @enderror" id="left_fist_extension" name="left_fist_extension" value="{{old('left_fist_extension')}}" > 
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
                                                <input type="text" class="form-control @error('right_supination') is-invalid @enderror" id="right_supination" name="right_supination" value="{{old('right_supination')}}" > 
                                                @error('right_supination')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Supinação Esquerda:</label>
                                                <input type="text" class="form-control @error('left_supination') is-invalid @enderror" id="left_supination" name="left_supination" value="{{old('left_supination')}}" > 
                                                @error('left_supination')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                        
                                            <div class="col-md-3">
                                                <label for="title">Pronação Direita:</label>
                                                <input type="text" class="form-control @error('right_pronation') is-invalid @enderror" id="right_pronation" name="right_pronation" value="{{old('right_pronation')}}" > 
                                                @error('right_pronation')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Pronação Esquerda:</label>
                                                <input type="text" class="form-control @error('left_pronation') is-invalid @enderror" id="left_pronation" name="left_pronation" value="{{old('left_pronation')}}" > 
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
                                            <div class="col-md-2 offset-md-6">   
                                                <input type="submit" class="btn btn-dark" id="btn-register-avaliation" value="Salvar">
                                            </div>  
                                        </div> 
                                        <br>
                                    <br>
                                    </form>
                                @else
                                    <br>
                                    <div class="row">
                                        <table class="table table-white">
                                            <tbody>
                                                <tr>
                                                    <td><b>Flexão Cotovelo Direita: </b>{{$elbow_fist['right_elbow_flexion']}}</td>
                                                    <td><b>Flexão Cotovelo Esquerda: </b>{{$elbow_fist['left_elbow_flexion']}}</td>
                                                    <td><b>Extensão Cotovelo Direita: </b>{{$elbow_fist['right_elbow_extension']}}</td>
                                                    <td><b>Extensão Cotovelo Esquerda:</b>{{$elbow_fist['left_elbow_extension']}}</td>
                                                <tr>   
                                                <tr>
                                                    <td><b>Flexão Punho Direita: </b>{{$elbow_fist['right_fist_flexion']}}</td>
                                                    <td><b>Flexão Punho Esquerda: </b>{{$elbow_fist['left_fist_flexion']}}</td>
                                                    <td><b>Extensão Punho Direita:</b>{{$elbow_fist['right_fist_extension']}}</td>
                                                    <td><b>Extensão Punho Esquerda:</b>{{$elbow_fist['left_fist_extension']}}</td>
                                                <tr>  
                                                <tr>
                                                    <td><b>Supinação Direita: </b>{{$elbow_fist['right_supination']}}</td>
                                                    <td><b>Supinação Esquerda: </b>{{$elbow_fist['left_supination']}}</td>
                                                    <td><b>Pronação Direita: </b>{{$elbow_fist['right_pronation']}}</td>
                                                    <td><b>Pronação Esquerda: </b>{{$elbow_fist['left_pronation']}}</td>
                                                <tr> 
                                                    
                                            </tbody>
                                        </table>
                                    </div>      
                                    <br>
                                    <div class="row">
                                        <div class="col-md-10 offset-md-1 text-center" >
                                            <a href="/elbow_fist/edit/{{$elbow_fist['id']}}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Editar"> Editar</a>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir_elbow_fist_modal" data-id="{{$elbow_fist['id']}}">Excluir</button>
                                            <a href="/elbow_fist/relatorio/{{$elbow_fist['id']}}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Relatorio"> Relatório</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!-- ankle -->
                            <div class="tab-pane fade" id="ankle-justified" role="tabpanel" aria-labelledby="ankle-tab">
                                @if($ankle=="false")  <br>  
                                    <form action="/ankle/store/{{$dynamop['id']}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="title">Flexão Plantar Direita:</label>
                                                <input type="text" class="form-control @error('right_plantar_flexion') is-invalid @enderror" id="right_plantar_flexion" name="right_plantar_flexion" value="{{old('right_plantar_flexion')}}" > 
                                                @error('right_plantar_flexion')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Flexão Plantar Esquerda:</label>
                                                <input type="text" class="form-control @error('left_plantar_flexion') is-invalid @enderror" id="left_plantar_flexion" name="left_plantar_flexion" value="{{old('left_plantar_flexion')}}" > 
                                                @error('left_plantar_flexion')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                    
                                            <div class="col-md-3">
                                                <label for="title">Dorsiflexão Direita:</label>
                                                <input type="text" class="form-control @error('right_dorsiflexion') is-invalid @enderror" id="right_dorsiflexion" name="right_dorsiflexion" value="{{old('right_dorsiflexion')}}" > 
                                                @error('right_dorsiflexion')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Dorsiflexão Esquerda:</label>
                                                <input type="text" class="form-control @error('left_dorsiflexion') is-invalid @enderror" id="left_dorsiflexion" name="left_dorsiflexion" value="{{old('left_dorsiflexion')}}" > 
                                                @error('left_dorsiflexion')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="title">Inversão Direita:</label>
                                                <input type="text" class="form-control @error('right_inversion') is-invalid @enderror" id="right_inversion" name="right_inversion" value="{{old('right_inversion')}}" > 
                                                @error('right_inversion')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Inversão Esquerda:</label>
                                                <input type="text" class="form-control @error('left_inversion') is-invalid @enderror" id="left_inversion" name="left_inversion" value="{{old('left_inversion')}}" > 
                                                @error('left_inversion')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                        
                                            <div class="col-md-3">
                                                <label for="title">Eversão Direita:</label>
                                                <input type="text" class="form-control @error('right_eversion') is-invalid @enderror" id="right_eversion" name="right_eversion" value="{{old('right_eversion')}}" > 
                                                @error('right_eversion')
                                                    <div class="invalid-feedback">
                                                            {{$message}}
                                                    </div>
                                                @enderror   
                                            </div>
                                            <div class="col-md-3">
                                                <label for="title">Eversão Esquerda:</label>
                                                <input type="text" class="form-control @error('left_eversion') is-invalid @enderror" id="left_eversion" name="left_eversion" value="{{old('left_eversion')}}" > 
                                                @error('left_eversion')
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
                                                <input type="submit" class="btn btn-dark"  value="Salvar">
                                            </div>  
                                        </div> 
                                    </form>
                                @else
                                    <br>
                                    <div class="row">
                                        <table class="table table-white">
                                            <tbody>
                                                <tr>
                                                    <td><b>Flexão Plantar Direita: </b>{{$ankle['right_plantar_flexion']}}</td>
                                                    <td><b>Flexão Plantar Esquerda: </b>{{$ankle['left_plantar_flexion']}}</td>
                                                    <td><b>Dorsiflexão Direita:</b>{{$ankle['right_dorsiflexion']}}</td>
                                                    <td><b>Dorsiflexão Esquerda: </b>{{$ankle['left_dorsiflexion']}}</td>
                                                <tr>   
                                                <tr>
                                                    <td><b>Inversão Direita: </b>{{$ankle['right_inversion']}}</td>
                                                    <td><b>Inversão Esquerda: </b>{{$ankle['left_inversion']}}</td>
                                                    <td><b>Eversão Direita: </b>{{$ankle['right_eversion']}}</td>
                                                    <td><b>Eversão Esquerda: </b>{{$ankle['left_eversion']}}</td>
                                                <tr>  
                                                    
                                            </tbody>
                                        </table>
                                    </div>      
                                    <br>
                                    <div class="row">
                                        <div class="col-md-10 offset-md-1 text-center" >
                                            <a href="/ankle/edit/{{$ankle['id']}}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Editar"> Editar</a>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir_ankle_modal" data-id="{{$ankle['id']}}">Excluir</button>
                                            <a href="/ankle/relatorio/{{$ankle['id']}}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Relatorio"> Relatório</a>
                                        </div>
                                    </div>
                                @endif
                            </div>          
                        </div>
                    </div>
                </div>
            @endif  
            </div>  
        </div>
</section>

<!-- Modal Excluir Shoulder-->
@if($shoulder != "false")
<form id = "deleteForm" action=" {{ route('shoulder.destroy', $shoulder['id'])}}" method="get" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="DELETE">
    @csrf
    <div class="modal fade" id="excluir_shoulder_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Dynamop: Ombro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir?</p>
                </div>
                <input type="hidden" name="shoulder_id" id="shoulder_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </div>
        </div>
    </div>
</form>    
@endif

<script type="text/javascript">
$('#excluir_shoulder_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#shoulder_id').val(recipientId)
    })      
</script>    

 
<!-- Modal Excluir hip_hnee-->
@if($hip_knee != "false")
<form id = "deleteForm" action=" {{ route('hip_knee.destroy', $hip_knee['id'])}}" method="get" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="DELETE">
    @csrf
    <div class="modal fade" id="excluir_hip_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Dynamop: Quadril/Joelho</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir?</p>
                </div>
                <input type="hidden" name="hip_id" id="hip_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </div>
        </div>
    </div>
</form>        
@endif

<script type="text/javascript">
$('#excluir_hip_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#hip_id').val(recipientId)
    })      
</script>    

<!-- Modal Excluir elbow_fist-->
@if($elbow_fist != "false")
<form id = "deleteForm" action=" {{ route('elbow_fist.destroy', $elbow_fist['id'])}}" method="get" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="DELETE">
    @csrf
    <div class="modal fade" id="excluir_elbow_fist_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Dynamop: Cotovelo/Punho</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir?</p>
                </div>
                <input type="hidden" name="elbow_fist_id" id="elbow_fist_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </div>
        </div>
    </div>
</form>    
@endif

<script type="text/javascript">
$('#excluir_elbow_fist_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#elbow_fist_id').val(recipientId)
    })      
</script>    


<!-- Modal Excluir ankle-->
@if($ankle != "false")
<form id = "deleteForm" action=" {{ route('ankle.destroy', $ankle['id'])}}" method="get" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="DELETE">
    @csrf
    <div class="modal fade" id="excluir_ankle_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Dynamop: Tornozelo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir?</p>
                </div>
                <input type="hidden" name="ankle_id" id="ankle_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </div>
        </div>
    </div>
</form>    
@endif

<script type="text/javascript">
$('#excluir_ankle_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#ankle_id').val(recipientId)
    })    
    
    $(function() { 
    // for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        // save the latest tab; use cookies if you like 'em better:
        localStorage.setItem('lastTab', $(this).attr('href'));
    });

    // go to the latest tab, if it exists:
    var lastTab = localStorage.getItem('lastTab');
    if (lastTab) {
        $('[href="' + lastTab + '"]').tab('show');
    }
});
</script>    

@endsection
