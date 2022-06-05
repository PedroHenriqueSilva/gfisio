@extends('layouts.main')

@section('title', 'Editar Shoulder')

@section('content')
<div class="pagetitle">
    <h1>Editar Tornozelo</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/{{$avaliationOwtner['id']}}">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/{{$avaliationOwtner['id']}}">Avaliação </a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/{{$avaliation['id']}}">Avaliação Info</a></li>
            <li class="breadcrumb-item"><a href="/dynamop/info/{{$dynamop['avaliation_id']}}">Dynamop </a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Tornozelo </li>
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
            <form action="/ankle/update/{{$ankle['id']}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="title">Flexão Plantar Direita:</label>
                        <input type="text" class="form-control @error('right_plantar_flexion') is-invalid @enderror" id="right_plantar_flexion" name="right_plantar_flexion" value="{{$ankle->right_plantar_flexion}}"> 
                        @error('right_plantar_flexion')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Flexão Plantar Esquerda:</label>
                        <input type="text" class="form-control @error('left_plantar_flexion') is-invalid @enderror" id="left_plantar_flexion" name="left_plantar_flexion" value="{{$ankle->left_plantar_flexion}}"> 
                        @error('left_plantar_flexion')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror   
                    </div>
            
                    <div class="col-md-3">
                        <label for="title">Dorsiflexão Direita:</label>
                        <input type="text" class="form-control @error('right_dorsiflexion') is-invalid @enderror" id="right_dorsiflexion" name="right_dorsiflexion" value="{{$ankle->right_dorsiflexion}}"> 
                        @error('right_dorsiflexion')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Dorsiflexão Esquerda:</label>
                        <input type="text" class="form-control @error('left_dorsiflexion') is-invalid @enderror" id="left_dorsiflexion" name="left_dorsiflexion" value="{{$ankle->left_dorsiflexion}}"> 
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
                        <input type="text" class="form-control @error('right_inversion') is-invalid @enderror" id="right_inversion" name="right_inversion" value="{{$ankle->right_inversion}}"> 
                        @error('right_inversion')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Inversão Esquerda:</label>
                        <input type="text" class="form-control @error('left_inversion') is-invalid @enderror" id="left_inversion" name="left_inversion" value="{{$ankle->left_inversion}}"> 
                        @error('left_inversion')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror   
                    </div>
                
                    <div class="col-md-3">
                        <label for="title">Eversão Direita:</label>
                        <input type="text" class="form-control @error('right_eversion') is-invalid @enderror" id="right_eversion" name="right_eversion" value="{{$ankle->right_eversion}}"> 
                        @error('right_eversion')
                            <div class="invalid-feedback">
                                    {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="col-md-3">
                        <label for="title">Eversão Esquerda:</label>
                        <input type="text" class="form-control @error('left_eversion') is-invalid @enderror" id="left_eversion" name="left_eversion" value="{{$ankle->left_eversion}}"> 
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
                        <input type="submit" class="btn btn-dark" value="Editar">
                    </div>  
                </div> 
            </form>
        </div>
    </div>
</section>


@endsection