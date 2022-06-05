<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
   



    <style>
        .table{
            width:750px;
            margin-left:-110px;
           
        }
        body{
            font-size:14px;
        }

        .highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

    </style>
</head>
<body>
<div class="container">
    <img src="/home/pedro/Área de Trabalho/gfisio/public/img/logopdf.png" style= "width:120px; padding-bottom:15px; margin-left:200px; margin-top:-20px;" > 
</div>
<div class="container">
        <table class="table table-dark">
                <tbody>
                    <tr class="col-md-12">
                        <td class="col-md-8"><b>Nome do Paciente:&#160</b> @foreach($data as $d) {{$d['name']}} @endforeach</td>
                        <td class="col-md-2"><b>Data Avaliação: &#160</b> @foreach($data as $d){{ date( 'd/m/Y' , strtotime($d['date_nasc']))}} @endforeach</td>
                     
                    </tr> 
                </tbody>  
        </table>
        <br>
</div>  
<div class="container">
    <h5 class="text-center">Dynamop: Ombro</h5>
            <br> 
</div>
<div class="container">        
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="info-container" class="col-md-12">
                <table class="table table-white">
                    <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td><b>Flexão Direita: </b>{{$d['right_flexion']}}</td>
                            <td><b>Flexão Esquerda: </b>{{$d['left_flexion']}}</td>
                            <td><b>Extensão Direita: </b>{{$d['right_extension']}}</td>
                            <td><b>Extensão Esquerda: </b>{{$d['left_extension']}}</td>
                        <tr>   
                        <tr>
                            <td><b>Rotação Externa Direita: </b>{{$d['right_external_rotation']}}</td>
                            <td><b>Rotação Externa Esquerda: </b>{{$d['left_external_rotation']}}</td>
                            <td><b>Rotação Interna Direita: </b>{{$d['right_internal_rotation']}}</td>
                            <td><b>Rotação Interna Esquerda: </b>{{$d['left_internal_rotation']}}</td>
                        <tr>  
                        <tr>
                            <td><b>Abdução Direita: </b>{{$d['right_abduction']}}</td>
                            <td><b>Abdução Esquerda: </b>{{$d['left_abduction']}}</td>
                            <td><b>Empurrar Braço Horiz. Direita: </b>{{$d['push_right_horizontal_arm']}}</td>
                            <td><b>Empurrar Braço Horiz. Esquerda: </b>{{$d['push_left_horizontal_arm']}}</td>
                        <tr>   
                        <tr>
                            <td><b>Empurrar Braço Horiz. Direita: </b>{{$d['push_right_vertical_arm']}}</td>
                            <td><b>Empurrar Braço Horiz. Esquerda:</b>{{$d['push_left_vertical_arm']}}</td>
                            <td><b>Puxada Direita: </b>{{$d['right_pull']}}</td>
                            <td><b>Puxada Esquerda:  </b>{{$d['left_pull']}}</td>
                        <tr> 
                     @endforeach                
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
</div>    

<div class="container mt-5">
    <div id="container">
</div>
</div>    
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
            text: 'Monthly Average Rainfall'
        },
        subtitle: {
            text: 'Source: WorldClimate.com'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall (mm)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Tokyo',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

        }, {
            name: 'New York',
            data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

        }, {
            name: 'London',
            data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

        }, {
            name: 'Berlin',
            data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

        }]
    });
 </script>       
   
</body>
</html>