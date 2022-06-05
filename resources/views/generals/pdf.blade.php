<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{public_path('css/pdf.css')}}" rel="stylesheet" type="text/css">
    <style>
        @font-face {
        font-family: 'Boogaloo';
        font-style: normal;
        font-weight: 400;
        src: local('Boogaloo-Regular'), url(https://fonts.googleapis.com/css?family=Boogaloo:300,400,500,600,700) format('truetype');
    }

    body {
        font-family: 'Boogaloo';
       
    }
   
    </style>
</head>
<body>
<div class="container">
<img src="/home/pedro/Área de Trabalho/gfisio/public/img/logopdf.png" style= "width:120px; padding-bottom:15px; margin-left:200px; margin-top:-20px;" > 
</div>  
<div class="container">
    <h3 class="text-center" id="title_press">Avaliação Geral</h3>
       

        <table class="table table-dark" >
                <tbody>
                    <tr class="col-md-12" >
                        <td class="col-md-8">Nome do Paciente:&#160{{$avaliationOwtner['name']}}</td>
                        <td class="col-md-2">Data Avaliação: &#160
                            <?php
                                $data = new DateTime($avaliation['date_aval']);
                                
                                echo $data->format('d-m-Y');
                            ?>
                            </td>
                    </tr> 
                </tbody>  
        </table>

    <table class="table">
        <tbody>

            <tr>
                <td class="col-md-2"> Idade:&#160  {{ $general->age }}</td>
                <td class="col-md-2"> Peso:&#160  {{ $general->weight }}</td>
                <td class="col-md-2"> Altura:&#160  {{ $general->height }}</td>
                <td class="col-md-2"> IMC:&#160  {{ $general->imc }}</td> 
            </tr>
            <tr class="col-md-10"> 
                        <td colspan="4"> Descrição do trabalho:&#160  {{ $general->job_description }}</td>
                    
                    </tr>  
                    <tr class="col-md-10">   
                        <td colspan="4"> Movimentos Mais Repetidos:&#160  {{ $general->repeated_movements }}</td>    
                    </tr>
                    <tr class="col-md-10">
                        <td colspan="4"> Demanda Física/Psicológica:&#160  {{ $general->demand_physical_psycho }}</td>
                    </tr> 
                    <tr class="col-md-10">   
                        <td colspan="4"> Correlaciona Piora Clínica com Trabalho:&#160  {{ $general->worse_clinical_work}}</td>    
                    </tr>
                    <tr class="col-md-10">
                        <td colspan="4"> Hobby/Lazer:&#160  {{ $general->leisure}}</td>
                    </tr>  
                    <tr class="col-md-10">  
                        <td colspan="4"> Atividade Física:&#160  {{ $general->physical_activity}}</td>    
                    </tr>    
                    <tr class="col-md-10">  
                        <td colspan="4"> Tempo/XSemana:&#160  {{ $general->physical_activity_time}}</td>
                    </tr>
                    <tr class="col-md-10">  
                        <td colspan="4"> Sente desconforto na realização da atividade física:&#160  {{ $general->discomfort_physical_activity}}</td>
                    </tr>
        </tbody>
    </table>
</div>  
</body>

</html>