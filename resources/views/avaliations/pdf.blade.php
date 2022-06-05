<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Boogaloo:300,400,500,600,700" rel="stylesheet"> 

   <link href="{{public_path('css/pdf.css')}}" rel="stylesheet" type="text/css">
   
</head>
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
<body>
<div class="container">
    <img src="/home/pedro/Área de Trabalho/gfisio/public/img/logopdf.png" style= "width:120px; padding-bottom:15px; margin-left:200px; margin-top:-20px;" > 
</div>
<div class="container" >
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
        
</div> 

<div class="container" >
    <p class="text-center" id="title">Informações do Paciente</p>
    
    <table class="table" >
                <tbody >
                    <tr class="col-md-12">
                        <td class="col-md-8">Data Nascimento:&#160</p>
                        <?php
                                $data = new DateTime($avaliationOwtner['date_nasc']);
                                
                                echo $data->format('d-m-Y');
                            ?>

                        </td>
                        <td class="col-md-4">Sexo:&#160{{$avaliationOwtner['sex']}}</td>
                        <td class="col-md-2"></td>
                    </tr> 
                    <tr class="col-md-12">
                            <td class="col-md-6">Endereço:&#160{{$avaliationOwtner['end']}}</td>
                            <td class="col-md-2">Estado:&#160{{$avaliationOwtner['state']}}</td>
                            <td class="col-md-4">Cidade:&#160{{$avaliationOwtner['city']}}</td>    
                        </tr>
                        <tr class="col-md-12">
                            <td class="col-md-4">Profissão:&#160{{$avaliationOwtner['profission']}}</td>
                            <td class="col-md-4">Estado Civil:&#160{{$avaliationOwtner['civil_status']}}</td>
                            <td class="col-md-4">Filhos:&#160 {{$avaliationOwtner['son']}}</td> 
                            
                        </tr>
                        <tr class="col-md-10">
                            <td class="col-md-4">Lado Dominante:&#160{{$avaliationOwtner['dominant_side']}}</td>   
                            <td class="col-md-4">Email:&#160{{$avaliationOwtner['email']}}</td>
                            <td class="col-md-4"></td>
                        </tr>
                </tbody>  
        </table>
       
</div> 
<div style='page-break-after: always;'></div>

@if($general!='')
<div class="container" >
    <p class="text-center" id="title">Avaliação Geral</p>
        
    <table class="table">
        <tbody>

            <tr>
                <td class="col-md-2">Idade:{{ $general->age }}</td>
                <td class="col-md-2">Peso:{{ $general->weight }}</td>
                <td class="col-md-2">Altura:{{ $general->height }}</td>
                <td class="col-md-2">IMC:{{ $general->imc }}</td> 
            </tr>
            <tr class="col-md-10"> 
                        <td colspan="4">Descrição do trabalho:&#160{{ $general->job_description }}</td>
                    
                    </tr>  
                    <tr class="col-md-10">   
                        <td colspan="4">Movimentos Mais Repetidos:&#160{{ $general->repeated_movements }}</td>    
                    </tr>
                    <tr class="col-md-10">
                        <td colspan="4">Demanda Física/Psicológica:&#160{{ $general->demand_physical_psycho }}</td>
                    </tr> 
                    <tr class="col-md-10">   
                        <td colspan="4">Correlaciona Piora Clínica com Trabalho:&#160{{ $general->worse_clinical_work}}</td>    
                    </tr>
                    <tr class="col-md-10">
                        <td colspan="4">Hobby/Lazer:&#160{{ $general->leisure}}</td>
                    </tr>  
                    <tr class="col-md-10">  
                        <td colspan="4">Atividade Física:&#160{{ $general->physical_activity}}</td>    
                    </tr>    
                    <tr class="col-md-10">  
                        <td colspan="4">Tempo/XSemana:&#160{{ $general->physical_activity_time}}</td>
                    </tr>
                    <tr class="col-md-10">  
                        <td colspan="4">Sente desconforto na realização da atividade física:&#160{{ $general->discomfort_physical_activity}}</td>
                    </tr>
        </tbody>
    </table>
</div>  
<div style='page-break-after: always;'></div>
@endif

@if($redflag!='')
<div class="container" >        
    <p class="text-center" id="title">Redflags</p>
   
    <table class="table">
        <tbody>
        <tr class="col-md-10">
                <td class="col-md-2">Febre Ultimamente: {{ $redflag->fever }}</td>
                @if(!empty($redflag->fever_descr))
                    <td class="col-md-8">Descrição: {{ $redflag->fever_descr }}</td>
                @else
                <td class="col-md-8"></td>
                @endif
            </tr>
            
            <tr class="col-md-10">
                <td class="col-md-4">Caído sem Motivos: {{ $redflag->fallen }}</td>
                @if(!empty($redflag->fallen_descr))
                <td class="col-md-4">Descrição: {{ $redflag->fallen_descr }}</td>
                @else
                <td class="col-md-8"></td>
                @endif  
            </tr>
            
            <tr class="col-md-10">
                <td class="col-md-4">Tonturas: {{ $redflag->dizziness }}</td>
                @if(!empty($redflag->dizziness_descr))
                <td class="col-md-4">Descrição:{{ $redflag->dizziness_descr }}</td> 
                @else
                <td class="col-md-8"></td>
                @endif
            </tr>
            
            <tr class="col-md-10">
                <td class="col-md-4">Dificuldade ao andar: {{ $redflag->dif_walking }}</td>
                @if(!empty($redflag->dif_walking_descr))
                <td class="col-md-4">Descrição: {{ $redflag->dif_walking_descr }}</td>
                @else
                <td class="col-md-8"></td>
                @endif 
            </tr>
            
            <tr class="col-md-10">
                <td class="col-md-4">Dor Notura: {{ $redflag->notura_pain }}</td>
                @if(!empty($redflag->notura_pain_descr))
                <td class="col-md-4">Descrição: {{ $redflag->notura_pain_descr }}</td> 
                @else
                <td class="col-md-8"></td>
                @endif 
            </tr>
            
            <tr class="col-md-10">
                <td class="col-md-4">Rigidez ao levantar: {{ $redflag->stiffness }}</td>
                @if(!empty($redflag->stiffness_descr))
                <td class="col-md-4">Descrição: {{ $redflag->stiffness_descr }}</td>
                @else
                <td class="col-md-8"></td>
                @endif  
            </tr>
            
            <tr class="col-md-10">
                <td class="col-md-4">Perda de peso sem motivos: {{ $redflag->weight_loss }}</td>
                @if(!empty($redflag->weight_loss_descr))
                <td class="col-md-4">Descrição: {{ $redflag->weight_loss_descr }}</td>
                @else
                <td class="col-md-8"></td>
                @endif  
            </tr>
            
            <tr class="col-md-10">
                <td class="col-md-4">Desmaios sem motivos: {{ $redflag->faint }}</td>
                @if(!empty($redflag->faint_descr))
                <td class="col-md-4">Descrição:{{ $redflag->faint_descr }}</td> 
                @else
                <td class="col-md-8"></td>
                @endif
            </tr>
            
            <tr class="col-md-10">
                <td class="col-md-4">Formigamento Corporal: {{ $redflag->formication }}</td>
                @if(!empty($redflag->formication_descr))
                <td class="col-md-4">Descrição: {{ $redflag->formication_descr }}</td> 
                @else
                <td class="col-md-8"></td>
                @endif
            </tr>
            
            <tr class="col-md-10">
                <td class="col-md-4">Cansaço/Fadiga anormal: {{ $redflag->tiredness }}</td>
                @if(!empty($redflag->tiredness_descr))
                <td class="col-md-4">Descrição: {{ $redflag->tiredness_descr }}</td>
                @else
                <td class="col-md-8"></td>
                @endif 
            </tr>
            
            <tr class="col-md-10">
                <td class="col-md-4">Dor que não passa: {{ $redflag->endless_pain}}</td>
                @if(!empty($redflag->endless_pain_descr))
                <td class="col-md-4">Descrição: {{ $redflag->endless_pain_descr }}</td> 
                @else
                <td class="col-md-8"></td>
                @endif 
            </tr>
            
            <tr class="col-md-10">
                <td class="col-md-4">Disfunções urinárias: {{ $redflag->urinary_dysfunction }}</td>
                @if(!empty($redflag->urinary_dysfunction_descr))
                <td class="col-md-4">Descrição:{{ $redflag->urinary_dysfunction_descr }}</td>
                @else
                <td class="col-md-8"></td>
                @endif 
            </tr>
            
            <tr class="col-md-10">
                <td class="col-md-4">Disfunções intestinais: {{ $redflag->intestinal_dysfunction }}</td>
                @if(!empty($redflag->intestinal_dysfunction_descr))
                <td class="col-md-4">Descrição: {{ $redflag->intestinal_dysfunction_descr }}</td> 
                @else
                <td class="col-md-8"></td>
                @endif 
            </tr>
            
            <tr class="col-md-10">
                <td class="col-md-4">Disfunções sexuais: {{ $redflag->sexual_dysfunction }}</td>
                @if(!empty($redflag->sexual_dysfunction_descr))
                <td class="col-md-4">Descrição: {{ $redflag->sexual_dysfunction_descr }}</td> 
                @else
                <td class="col-md-8"></td>
                @endif 
            </tr>
        </tbody>        
</table>

</div> 
<div style='page-break-after: always;'></div>
@endif
@if($historic!='')
<div class="container">        
    <p class="text-center" id="title">Histórico</p>
      
        <table class="table">
            <tbody>
                <tr class="col-md-10">
                    <td class="col-md-4">Diagnóstico Médico:&#160 {{ $historic->medical_diagnostic }}</td>  
                </tr>
                <tr class="col-md-10">
                    <td class="col-md-4">Medicação:&#160 {{ $historic->medication }}</td>     
                </tr>
                <tr class="col-md-10">
                    <td class="col-md-4">Queixa Principal:&#160 {{ $historic->complaint }}</td>   
                </tr>
                <tr class="col-md-10">
                    <td class="col-md-4">História:&#160 {{ $historic->story }}</td> 
                </tr>
            </tbody>        
    </table>
</div>  
<div style='page-break-after: always;'></div>
@endif   


@if($subjective!='')
<div class="container" >
    <p class="text-center" id="title">Avaliação Subjetiva</p>
        
    <table class="table">
        <tbody>

            <tr>
                <td class="col-md-4">Escala Visual e Analógica de Dor:{{$subjective->subjective_scale}}</td>
            </tr>
            <tr>    
                <td class="col-md-4">Característica da Dor:&#160{{$subjective->subjective_characteristic}}</td>
            </tr>  
                <td class="col-md-4">  Localização Espacial:&#160{{$subjective->subjective_spatial_location}}</td>
                 
            </tr>
            <tr class="col-md-12"> 
                <td colspan="4">Anotações:&#160{{$subjective->subjective_description}}</td>
            </tr>  
         
        </tbody>
    </table>
</div>  
<div style='page-break-after: always;'></div>
@endif
</body>
</html>