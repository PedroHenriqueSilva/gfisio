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
    <h3 class="text-center" id="title_press">Histórico Pregresso</h3>
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
                        <tr class="col-md-10">
                            <td class="col-md-2">  Bebe:       {{ $past->drink }}</td>
                            @if(!empty($past->drink_descr))
                                <td class="col-md-8">  Descrição:       {{ $past->drink_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4">  Fuma:       {{ $past->smoke }}</td>
                            @if(!empty($past->smoke_descr))
                            <td class="col-md-4">  Descrição:       {{ $past->smoke_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif  
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4">  Diabetes:       {{ $past->diabetes }}</td>
                            @if(!empty($past->diabetes_descr))
                            <td class="col-md-4">  Descrição:       {{ $past->diabetes_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4">  HAS:       {{ $past->has }}</td>
                            @if(!empty($past->has_descr))
                            <td class="col-md-4">  Descrição:       {{ $past->has_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4">  Colesterol:       {{ $past->cholesterol }}</td>
                            @if(!empty($past->cholesterol_descr))
                            <td class="col-md-4">  Descrição:       {{ $past->cholesterol_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4">  Cardíaca:       {{ $past->heart }}</td>
                            @if(!empty($past->heart_descr))
                            <td class="col-md-4">  Descrição:       {{ $past->heart_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4">  Pulmonar:       {{ $past->pulmonary }}</td>
                            @if(!empty($past->pulmonary_descr))
                            <td class="col-md-4">  Descrição:       {{ $past->pulmonary_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif  
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4">  Renal:       {{ $past->renal }}</td>
                            @if(!empty($past->renal_descr))
                            <td class="col-md-4">  Descrição:       {{ $past->renal_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif  
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4">  Gastrointestinal:       {{ $past->gastrointestinal }}</td>
                            @if(!empty($past->gastrointestinal_descr))
                            <td class="col-md-4">  Descrição:       {{ $past->gastrointestinal_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4">  Neurológica:       {{ $past->neurological }}</td>
                            @if(!empty($past->neurological_descr))
                            <td class="col-md-4">  Descrição:       {{ $past->neurological_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4">  Psicológica:       {{ $past->psychological }}</td>
                            @if(!empty($past->psychological_descr))
                            <td class="col-md-4">  Descrição:       {{ $past->psychological_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4">  Reumatológica:       {{ $past->rheumatological}}</td>
                            @if(!empty($past->rheumatological_descr))
                            <td class="col-md-4">  Descrição:       {{ $past->rheumatological_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4">  Vascular:       {{ $past->vascular }}</td>
                            @if(!empty($past->vascular_descr))
                            <td class="col-md-4">  Descrição:       {{ $past->vascular_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4">  Mamária:       {{ $past->mammary }}</td>
                            @if(!empty($past->mammary_descr))
                            <td class="col-md-4">  Descrição:       {{ $past->mammary_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4">  Útero:       {{ $past->uterus }}</td>
                            @if(!empty($past->uterus_descr))
                            <td class="col-md-4">  Descrição:       {{ $past->uterus_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4">  Escroto:       {{ $past->scrotum }}</td>
                            @if(!empty($past->scrotum_descr))
                            <td class="col-md-4">  Descrição:       {{ $past->scrotum_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4">  Tireóide:       {{ $past->thyroid }}</td>
                            @if(!empty($past->thyroid_descr))
                            <td class="col-md-4">  Descrição:       {{ $past->thyroid_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4">  Covid-19:       {{ $past->covid19 }}</td>
                            @if(!empty($past->covid19_descr))
                            <td class="col-md-4">  Descrição:       {{ $past->covid19_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4">  Fratura:       {{ $past->fracture }}</td>
                            @if(!empty($past->fracture_descr))
                            <td class="col-md-4">  Descrição:       {{ $past->fracture_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4">  Histórico de CA:       {{ $past->historical_ca }}</td>
                            @if(!empty($past->hist_ca_descr))
                            <td class="col-md-4">  Descrição:       {{ $past->hist_ca_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4">  Histórico de familiares com CA:       {{ $past->hist_family_ca }}</td>
                            @if(!empty($past->hist_family_ca_descr))
                            <td class="col-md-4">  Descrição:       {{ $past->hist_family_ca_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4">  Histórico de cirurgias:       {{ $past->historical_surgeries }}</td>
                            @if(!empty($past->hist_surgeries_descr))
                            <td class="col-md-4">  Descrição:    {{ $past->hist_surgeries_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                    </tbody> 
        </table> 
</div>

</body>

</html>