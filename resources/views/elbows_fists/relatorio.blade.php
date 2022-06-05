@extends('layouts.main')

@section('title', 'Relatório Elbow_Fist')

@section('content')
<div class="pagetitle">
    <h1>Relatório Cotovelo-Punho</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/@foreach($data as $d) {{$d['user_id']}} @endforeach">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/@foreach($data as $d) {{$d['user_id']}} @endforeach">Avaliação </a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/@foreach($data as $d) {{$d['avaliation_id']}} @endforeach">Avaliação Info</a></li>
            <li class="breadcrumb-item"><a href="/dynamop/info/@foreach($data as $d) {{$d['avaliation_id']}} @endforeach">Dynamop </a></li>
            <li class="breadcrumb-item active" aria-current="page">Relatório Cotovelo-Punho </li>
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
        $elbow_flexion = abs($d['right_elbow_flexion'] - $d['left_elbow_flexion']);
        $elbow_extension = abs($d['right_elbow_extension'] - $d['left_elbow_extension']);
        $fist_flexion = abs($d['right_fist_flexion'] - $d['left_fist_flexion']);
        $fist_extension = abs($d['right_fist_extension'] - $d['left_fist_extension']);
        $supination = abs($d['right_supination'] - $d['left_supination']);
        $pronation = abs($d['right_pronation'] - $d['left_pronation']);
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
        text: 'Elbow_Fist'
    },
    legend: {
      enabled: true,
    },
    xAxis: {
        categories: [
            'Flexão Cotovelo',
            'Extensão Cotovelo',
            'Flexão Punho',
            'Extensão Punho',
            'Supinação',
            'Pronação',
            
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
        data:[  @foreach($data as $d) {{$d['right_elbow_flexion']}} @endforeach,
                @foreach($data as $d) {{$d['right_elbow_extension']}} @endforeach,
                @foreach($data as $d) {{$d['right_fist_flexion']}} @endforeach,
                @foreach($data as $d) {{$d['right_fist_extension']}} @endforeach,
                @foreach($data as $d) {{$d['right_supination']}} @endforeach,
                @foreach($data as $d) {{$d['right_pronation']}} @endforeach,
               

            ]
    }, {
             
        name: 'Esquerda',
        data: [@foreach($data as $d) {{$d['left_elbow_flexion']}} @endforeach,
                @foreach($data as $d) {{$d['left_elbow_extension']}} @endforeach,   
                @foreach($data as $d) {{$d['left_fist_flexion']}} @endforeach,
                @foreach($data as $d) {{$d['left_fist_extension']}} @endforeach,
                @foreach($data as $d) {{$d['left_supination']}} @endforeach,
                @foreach($data as $d) {{$d['left_pronation']}} @endforeach,
                   
            
    ]

    }, {
                
        name: 'Diferença',
        data: [{{$elbow_flexion}} ,{{$elbow_extension}},{{$fist_flexion}},{{$fist_extension}},{{$supination}},{{$pronation}}
                      
        ],
              
        color:'red'
    }]
});
 </script>       

@endsection