@extends('layouts.main')

@section('title', 'Relatório Shoulder')

@section('content')

<div class="row align-items-end">
    <div class="col-md-12" id="breadcrumbs">
        <nav aria-label="breadcrumb" >
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/users/patients">Paciente</a></li>
                    <li class="breadcrumb-item"><a href="">Avaliação </a></li>
                    <li class="breadcrumb-item"><a href="">Dynamop </a></li>
                    <li class="breadcrumb-item active" aria-current="page">Relatório Ombro</li>
                </ol>
        </nav>
    </div>  
</div>
<hr>
    
<div class="col-md-12">
        <table class="table table-light">
                <tbody>
                    <tr class="col-md-10">
                        <td class="col-md-3"><b>Nome do Paciente:</b>&nbsp 
                            @foreach($data as $d) {{$d['name']}} @endforeach

                        </td>
                        <td class="col-md-2"><b>Data Avaliação:</b>&nbsp
                        @foreach($data as $d){{ date( 'd/m/Y' , strtotime($d['date_nasc']))}} @endforeach
            
                        </td>
                    </tr> 
                </tbody>  
        </table>
</div> 

<div class="col-md-12">
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
                <td><b>Empurrar Braço Vert. Direita: </b>{{$shoulder['push_right_vertical_arm']}}</td>
                <td><b>Empurrar Braço Vert. Esquerda:</b>{{$shoulder['push_left_vertical_arm']}}</td>
                <td><b>Puxada Direita: </b>{{$shoulder['right_pull']}}</td>
                <td><b>Puxada Esquerda:  </b>{{$shoulder['left_pull']}}</td>
            <tr>          
        </tbody>
    </table>
</div>  
<br>
<div class="col-md-11">
    <div id="container">
    </div>
</div>
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
        text: 'Shoulder'
    },
    legend: {
      enabled: true,
    },
    xAxis: {
        categories: [
            'Flexão',
            'Extensão',
            'Rotação Externa',
            'Rotação Interna',
            'Abdução',
            'Empurrar Braço Horiz.',
            'Empurrar Braço Vert.',
            'Puxada'
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
            colorByPoint: true,
           
           }
    },
    series: [{
        colors: ['#051d93'],
        
        name: 'Direita',
        data:[  @foreach($data as $d) {{$d['right_flexion']}} @endforeach,
                @foreach($data as $d) {{$d['right_extension']}} @endforeach,
                @foreach($data as $d) {{$d['right_external_rotation']}} @endforeach,
                @foreach($data as $d) {{$d['right_internal_rotation']}} @endforeach,
                @foreach($data as $d) {{$d['right_abduction']}} @endforeach,
                @foreach($data as $d) {{$d['push_right_horizontal_arm']}} @endforeach,
                @foreach($data as $d) {{$d['push_right_vertical_arm']}} @endforeach,
                @foreach($data as $d) {{$d['right_pull']}} @endforeach

            ]
       

    }, {
        colors: [ '#353D41'],
       
        name: 'Esquerda',
        data: [@foreach($data as $d) {{$d['left_flexion']}} @endforeach,
                @foreach($data as $d) {{$d['left_extension']}} @endforeach,   
                @foreach($data as $d) {{$d['left_external_rotation']}} @endforeach,
                @foreach($data as $d) {{$d['left_internal_rotation']}} @endforeach,
                @foreach($data as $d) {{$d['left_abduction']}} @endforeach,
                @foreach($data as $d) {{$d['push_left_horizontal_arm']}} @endforeach,
                @foreach($data as $d) {{$d['push_left_vertical_arm']}} @endforeach,
                @foreach($data as $d) {{$d['left_pull']}} @endforeach,   
            
    ]

    }, {
        colors: ['#bb3434'],
        
        name: 'Diferença',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, ]

    }]
});
 </script>       

@endsection