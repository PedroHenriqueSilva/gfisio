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
   <h3 class="text-center" id="title_press">Inspeção de Redflags</h3>
        <table class="table table-dark">
                <tbody>
                    <tr class="col-md-12">
                        <td class="col-md-8">    Nome do Paciente:&#160     {{$avaliationOwtner['name']}}</td>
                        <td class="col-md-2">    Data Avaliação: &#160     
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
                            <td class="col-md-2">    Febre Ultimamente:      {{ $redflag->fever }}</td>
                            @if(!empty($redflag->fever_descr))
                                <td class="col-md-8">    Descrição:      {{ $redflag->fever_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif
                        </tr>
                        
                        <tr class="col-md-10">
                            <td class="col-md-4">    Caído sem Motivos:      {{ $redflag->fallen }}</td>
                            @if(!empty($redflag->fallen_descr))
                            <td class="col-md-4">    Descrição:      {{ $redflag->fallen_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif  
                        </tr>
                        
                        <tr class="col-md-10">
                            <td class="col-md-4">    Tonturas:      {{ $redflag->dizziness }}</td>
                            @if(!empty($redflag->dizziness_descr))
                            <td class="col-md-4">    Descrição:     {{ $redflag->dizziness_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif
                        </tr>
                        
                        <tr class="col-md-10">
                            <td class="col-md-4">    Dificuldade ao andar:      {{ $redflag->dif_walking }}</td>
                            @if(!empty($redflag->dif_walking_descr))
                            <td class="col-md-4">    Descrição:      {{ $redflag->dif_walking_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                       
                        <tr class="col-md-10">
                            <td class="col-md-4">    Dor Notura:      {{ $redflag->notura_pain }}</td>
                            @if(!empty($redflag->notura_pain_descr))
                            <td class="col-md-4">    Descrição:      {{ $redflag->notura_pain_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                       
                        <tr class="col-md-10">
                            <td class="col-md-4">    Rigidez ao levantar:      {{ $redflag->stiffness }}</td>
                            @if(!empty($redflag->stiffness_descr))
                            <td class="col-md-4">    Descrição:      {{ $redflag->stiffness_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif  
                        </tr>
                        
                        <tr class="col-md-10">
                            <td class="col-md-4">    Perda de peso sem motivos:      {{ $redflag->weight_loss }}</td>
                            @if(!empty($redflag->weight_loss_descr))
                            <td class="col-md-4">    Descrição:      {{ $redflag->weight_loss_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif  
                        </tr>
                      
                        <tr class="col-md-10">
                            <td class="col-md-4">    Desmaios sem motivos:      {{ $redflag->faint }}</td>
                            @if(!empty($redflag->faint_descr))
                            <td class="col-md-4">    Descrição:      {{ $redflag->faint_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif
                        </tr>
                        
                        <tr class="col-md-10">
                            <td class="col-md-4">    Formigamento Corporal:      {{ $redflag->formication }}</td>
                            @if(!empty($redflag->formication_descr))
                            <td class="col-md-4">    Descrição:      {{ $redflag->formication_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif
                        </tr>
                      
                        <tr class="col-md-10">
                            <td class="col-md-4">    Cansaço/Fadiga anormal:      {{ $redflag->tiredness }}</td>
                            @if(!empty($redflag->tiredness_descr))
                            <td class="col-md-4">    Descrição:      {{ $redflag->tiredness_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                       
                        <tr class="col-md-10">
                            <td class="col-md-4">    Dor que não passa:      {{ $redflag->endless_pain}}</td>
                            @if(!empty($redflag->endless_pain_descr))
                            <td class="col-md-4">    Descrição:      {{ $redflag->endless_pain_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        
                        <tr class="col-md-10">
                            <td class="col-md-4">    Disfunções urinárias:      {{ $redflag->urinary_dysfunction }}</td>
                            @if(!empty($redflag->urinary_dysfunction_descr))
                            <td class="col-md-4">    Descrição:      {{ $redflag->urinary_dysfunction_descr }}</td>
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                        
                        <tr class="col-md-10">
                            <td class="col-md-4">    Disfunções intestinais:      {{ $redflag->intestinal_dysfunction }}</td>
                            @if(!empty($redflag->intestinal_dysfunction_descr))
                            <td class="col-md-4">    Descrição:      {{ $redflag->intestinal_dysfunction_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                       
                        <tr class="col-md-10">
                            <td class="col-md-4">    Disfunções sexuais:      {{ $redflag->sexual_dysfunction }}</td>
                            @if(!empty($redflag->sexual_dysfunction_descr))
                            <td class="col-md-4">    Descrição:      {{ $redflag->sexual_dysfunction_descr }}</td> 
                            @else
                            <td class="col-md-8"></td>
                            @endif 
                        </tr>
                    </tbody>        
            </table>
</div>
   
</body>
</html>