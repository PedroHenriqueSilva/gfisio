@extends('layouts.main')

@section('title', 'Consults Exercises')

@section('content')
<div class="row align-items-end">
    <div class="col-md-12" id="breadcrumbs">
        <nav aria-label="breadcrumb" >
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Paciente</a></li>
                    <li class="breadcrumb-item"><a href="">Avaliação</a></li>
                    <li class="breadcrumb-item"><a href="">Consulta</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Exercícios Consulta</li>
                </ol>
        </nav>
    </div>  
</div>
<br>
<br>
<div class="col-md-13">
        <table class="table table-light">
                <tbody>
                    <tr class="col-md-10">
                        <td class="col-md-4"><b>Nome do Paciente:</b>&nbsp 
                            @foreach($data as $d) {{$d['name']}} @endforeach
                        </td>
                        <td class="col-md-2"><b>Data Avaliação:</b>&nbsp
                            @foreach($data as $d){{ date( 'd/m/Y' , strtotime($d['date_nasc']))}} @endforeach
                        </td>

                        <td class="col-md-2"><b>Data Consulta:</b>&nbsp
                            @foreach($data as $d){{ date( 'd/m/Y' , strtotime($d['date_consult']))}} @endforeach
                        </td>

                    </tr> 
                </tbody>  
        </table>
</div>
<div class="col-md-13">
    <div id ="cards_container" class="row">
        @foreach($exercises as $exercise)
            <div class="card col-md-3" style="width: 15rem;">
            
            <a href="/videos/exercise_video/{{ $exercise->exercise_video}}">
                <video src="/videos/exercise_video/{{ $exercise->exercise_video}}" alt="{{ $exercise->exercise_video}}" class="video-preview">
            </a>
            <div class="card-body">
                <h5 class="card-title">{{$exercise->exercise_name}}</h5>
                <p class="card-text">{{$exercise->exercise_description}}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{$exercise->exercise_body_area}}</li>
                
            </ul>
            <div class="card-body">
                <a href="#" class="card-link">Adicionar</a>
                <a href="#" class="card-link">Remover</a>
            </div>
            </div>
        @endforeach
    </div>    
</div>
<br>
<br>
<br>

@endsection