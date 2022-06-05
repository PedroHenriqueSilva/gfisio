@extends('layouts.main')

@section('title', 'Relatório Ankle')

@section('content')
<div class="pagetitle">
    <h1>Relatório Tornozelo</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/@foreach($data as $d) {{$d['user_id']}} @endforeach">Paciente</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/@foreach($data as $d) {{$d['user_id']}} @endforeach">Avaliação </a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/@foreach($data as $d) {{$d['avaliation_id']}} @endforeach">Avaliação Info</a></li>
            <li class="breadcrumb-item"><a href="/dynamop/info/@foreach($data as $d) {{$d['avaliation_id']}} @endforeach">Dynamop </a></li>
            <li class="breadcrumb-item active" aria-current="page">Relatório Tornozelo </li>
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
        $plantar_flexion = abs($d['right_plantar_flexion'] - $d['left_plantar_flexion']);
        $dorsiflexion = abs($d['right_dorsiflexion'] - $d['left_dorsiflexion']);
        $inversion = abs($d['right_inversion'] - $d['left_inversion']);
        $eversion = abs($d['right_eversion'] - $d['left_eversion']);
        
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
        text: 'Ankle'
    },
    legend: {
      enabled: true,
    },
    xAxis: {
        categories: [
            'Flexão Plantar',
            'Dorsiflexão',
            'Inversão',
            'Eversão',
                        
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
        data:[  @foreach($data as $d) {{$d['right_plantar_flexion']}} @endforeach,
                @foreach($data as $d) {{$d['right_dorsiflexion']}} @endforeach,
                @foreach($data as $d) {{$d['right_inversion']}} @endforeach,
                @foreach($data as $d) {{$d['right_eversion']}} @endforeach,
                          
            ]
    }, {
             
        name: 'Esquerda',
        data: [@foreach($data as $d) {{$d['left_plantar_flexion']}} @endforeach,
                @foreach($data as $d) {{$d['left_dorsiflexion']}} @endforeach,   
                @foreach($data as $d) {{$d['left_inversion']}} @endforeach,
                @foreach($data as $d) {{$d['left_eversion']}} @endforeach,
            
    ]

    }, {
                
        name: 'Diferença',
        data: [{{$plantar_flexion}} ,{{$dorsiflexion}},{{$inversion}},{{$eversion}}
                      
        ],
              
        color:'red'
    }]
});
 </script>       

@endsection