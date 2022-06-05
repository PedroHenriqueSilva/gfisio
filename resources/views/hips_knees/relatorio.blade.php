@extends('layouts.main')

@section('title', 'Relatório Hips_Knee')

@section('content')
<div class="pagetitle">
    <h1>Relatório Joelho-Quadril</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/@foreach($data as $d) {{$d['user_id']}} @endforeach">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/@foreach($data as $d) {{$d['user_id']}} @endforeach">Avaliação </a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/@foreach($data as $d) {{$d['avaliation_id']}} @endforeach">Avaliação Info</a></li>
            <li class="breadcrumb-item"><a href="/dynamop/info/@foreach($data as $d) {{$d['avaliation_id']}} @endforeach">Dynamop </a></li>
            <li class="breadcrumb-item active" aria-current="page">Relatório Joelho-Quadril </li>
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
                            <b>Nome:</b>&nbsp  @foreach($data as $d) {{$d['name']}} @endforeach
                        </div>
                        <div class="col-lg-4">
                            <b>Data Nasc:</b> &nbsp @foreach($data as $d){{ date( 'd-m-Y' , strtotime($d['date_nasc']))}} @endforeach
                        </div> 
                    </div>                             
                </div>
            </div>       
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
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
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div id="container">
            </div>
        </div>
    </div>
</section>

@php
    foreach($data as $d){ 
        $hip_extension = abs($d['right_hip_extension'] - $d['left_hip_extension']);
        $hip_flexion = abs($d['right_hip_flexion'] - $d['left_hip_flexion']);
        $hip_abduction = abs($d['right_hip_abduction'] - $d['left_hip_abduction']);
        $hip_adduction = abs($d['right_hip_adduction'] - $d['left_hip_adduction']);
        $knee_flexion = abs($d['right_knee_flexion'] - $d['left_knee_flexion']);
        $knee_extension = abs($d['right_knee_extension'] - $d['left_knee_extension']);
 }
@endphp


<br>
<br>
<br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
 Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Hip_knee'
    },
    legend: {
      enabled: true,
    },
    xAxis: {
        categories: [
            'Extensão Quadril',
            'Flexão Quadril',
            'Abdução Quadril',
            'Adução Quadril',
            'Flexão Joelho',
            'Extensão Joelho',
            
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'KG (kg)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} Kg</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0,
         
           
           }
    },
    series: [{
      
        
        name: 'Direita',
        data:[  @foreach($data as $d) {{$d['right_hip_extension']}} @endforeach,
                @foreach($data as $d) {{$d['right_hip_flexion']}} @endforeach,
                @foreach($data as $d) {{$d['right_hip_abduction']}} @endforeach,
                @foreach($data as $d) {{$d['right_hip_adduction']}} @endforeach,
                @foreach($data as $d) {{$d['right_knee_flexion']}} @endforeach,
                @foreach($data as $d) {{$d['right_knee_extension']}} @endforeach,
               

            ]
    }, {
             
        name: 'Esquerda',
        data: [@foreach($data as $d) {{$d['left_hip_extension']}} @endforeach,
                @foreach($data as $d) {{$d['left_hip_flexion']}} @endforeach,   
                @foreach($data as $d) {{$d['left_hip_abduction']}} @endforeach,
                @foreach($data as $d) {{$d['left_hip_adduction']}} @endforeach,
                @foreach($data as $d) {{$d['left_knee_flexion']}} @endforeach,
                @foreach($data as $d) {{$d['left_knee_extension']}} @endforeach,
                   
            
    ]

    }, {
                
        name: 'Diferença',
        data: [{{$hip_extension}} ,{{$hip_flexion}},{{$hip_abduction}},{{$hip_adduction}},{{$knee_flexion}},{{$knee_extension}}
                      
        ],
              
        color:'red'
    }]
});
 </script>       

@endsection