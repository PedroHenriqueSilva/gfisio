@extends('layouts.main')

@section('title', 'Create Consults')

@section('content')

<div class="row align-items-end">
    <div class="col-md-12" id="breadcrumbs">
        <nav aria-label="breadcrumb" >
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Paciente</a></li>
                    <li class="breadcrumb-item"><a href="">Avaliação</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Criar Consultas</li>
                </ol>
        </nav>
    </div>  
</div>
<br>
<br>
<div class="col-md-12">
        <table class="table table-light">
                <tbody>
                    <tr class="col-md-10">
                        <td class="col-md-3"><b>Nome do Paciente:</b>&nbsp 
                        {{$avaliationOwner['name']}}
                        </td>
                        <td class="col-md-2"><b>Data Avaliação:</b>&nbsp
                        <?php
                        $data = new DateTime($avaliationOwner['date_nasc']);
                                
                        echo $data->format('d-m-Y');
                        ?>
            
                        </td>
                    </tr> 
                </tbody>  
        </table>
</div>
<div class="col-md-12">
    <ul class="nav nav-tabs mb-4 border-bottom border-dark bg-dark" id="profileTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-data-tab" data-bs-toggle="pill" data-bs-target="#pills-data" type="button" role="tab" aria-controls="pills-data" aria-selected="true">Dados</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-exercise-tab" data-bs-toggle="pill" data-bs-target="#pills-exercise" type="button" role="tab" aria-controls="pills-exercise" aria-selected="true">Exercícios</button>
        </li>
        
    </ul>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active " id="pills-data" role="tabpanel" aria-labelledby="pills-hip-tab">
            <form action="/consults/store/{{$avaliation['id']}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="customRange2">Nível de Dor:</label>
                        <input type="range" class="form-range" min="0" max="10" id="customRange2">
                                                
                    </div>          
                <div class="row">
                    <div class="col-md-2 offset-md-6">   
                        <input type="submit" class="btn btn-dark" id="btn_salvar" value="Salvar">
                    </div>  
                </div>  
        
            </form>
        </div>
        
    </div>    

</div>    
 
@endsection