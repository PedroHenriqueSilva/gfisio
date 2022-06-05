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
    <h3 class="text-center" id="title_press">Histórico</h3>
        <table class="table table-dark">
                <tbody>
                    <tr class="col-md-12">
                        <td class="col-md-8"> Nome do Paciente:&#160 {{$avaliationOwtner['name']}}</td>
                        <td class="col-md-2"> Data Avaliação: &#160 
                            <?php
                                $data = new DateTime($avaliation['date_aval']);
                                
                                echo $data->format('d-m-Y');
                            ?>
                            </td>
                    </tr> 
                </tbody>  
        </table>

        <table class="table">
                <thead>    
                </thead>
                <tbody>
                    <tr class="col-md-10">
                        <td class="col-md-4"> Diagnóstico Médico:&#160  {{ $historic->medical_diagnostic }}</td>  
                    </tr>
                    <tr class="col-md-10">
                        <td class="col-md-4"> Medicação: &#160 {{ $historic->medication }}</td>     
                    </tr>
                    <tr class="col-md-10">
                        <td class="col-md-4"> Queixa Principal: &#160 {{ $historic->complaint }}</td>   
                    </tr>
                    <tr class="col-md-10">
                        <td class="col-md-4"> História: &#160 {{ $historic->story }}</td> 
                    </tr>
                </tbody>        
        </table>
         
</div>       
</body>
</html>