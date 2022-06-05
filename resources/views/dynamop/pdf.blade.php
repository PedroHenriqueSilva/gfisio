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
    <h3 class="text-center" id="title_press">Dynamop</h3>
     
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
        @if($shoulder!='')
        <p style="margin-left:230px;">Ombro</p>
        <table class="table table-white">
            
                    <tbody>
                    
                        <tr>
                            <td> Flexão Direita:  {{$shoulder['right_flexion']}}</td>
                            <td> Flexão Esquerda:  {{$shoulder['left_flexion']}}</td>
                            <td> Extensão Direita:  {{$shoulder['right_extension']}}</td>
                            <td> Extensão Esquerda:  {{$shoulder['left_extension']}}</td>
                        <tr>   
                        <tr>
                            <td> Rotação Externa Direita:  {{$shoulder['right_external_rotation']}}</td>
                            <td> Rotação Externa Esquerda:  {{$shoulder['left_external_rotation']}}</td>
                            <td> Rotação Interna Direita:  {{$shoulder['right_internal_rotation']}}</td>
                            <td> Rotação Interna Esquerda:  {{$shoulder['left_internal_rotation']}}</td>
                        <tr>  
                        <tr>
                            <td> Abdução Direita:  {{$shoulder['right_abduction']}}</td>
                            <td> Abdução Esquerda:  {{$shoulder['left_abduction']}}</td>
                            <td> Empurrar Braço Horiz. Direita:  {{$shoulder['push_right_horizontal_arm']}}</td>
                            <td> Empurrar Braço Horiz. Esquerda:  {{$shoulder['push_left_horizontal_arm']}}</td>
                        <tr>   
                        <tr>
                            <td> Empurrar Braço Horiz. Direita:  {{$shoulder['push_right_vertical_arm']}}</td>
                            <td> Empurrar Braço Horiz. Esquerda: {{$shoulder['push_left_vertical_arm']}}</td>
                            <td> Puxada Direita:  {{$shoulder['right_pull']}}</td>
                            <td> Puxada Esquerda:   {{$shoulder['left_pull']}}</td>
                        <tr> 
                              
                    </tbody>
        </table>
        <hr>
        @endif
        <br>
        @if($hip_Knee!='')
        <p style="margin-left:230px;">Quadril/Joelho</p>
        <table class="table table-white">
            
                    <tbody>
                    
                        <tr>
                            <td> Extensão Quadril Direita:  {{$hip_Knee['right_hip_extension']}}</td>
                            <td> Extensão Quadril Esquerda:  {{$hip_Knee['left_hip_extension']}}</td>
                            <td> Flexão Quadril Direita:  {{$hip_Knee['right_hip_flexion']}}</td>
                            <td> Flexão Quadril Esquerda:  {{$hip_Knee['left_hip_flexion']}}</td>
                        <tr>   
                        <tr>
                            <td> Abdução Quadril Direita:  {{$hip_Knee['right_hip_abduction']}}</td>
                            <td> Abdução Quadril Esquerda:  {{$hip_Knee['left_hip_abduction']}}</td>
                            <td> Adução Quadril Direita:  {{$hip_Knee['right_hip_adduction']}}</td>
                            <td> Adução Quadril Esquerda:  {{$hip_Knee['left_hip_adduction']}}</td>
                        <tr>  
                        <tr>
                            <td> Flexão Joelho Direita:  {{$hip_Knee['right_knee_flexion']}}</td>
                            <td> Flexão Joelho Esquerda:  {{$hip_Knee['left_knee_flexion']}}</td>
                            <td> Extensão Joelho Direita:  {{$hip_Knee['right_knee_extension']}}</td>
                            <td> Extensão Joelho Esquerda:  {{$hip_Knee['left_knee_extension']}}</td>
                        <tr>   
                        
                              
                    </tbody>
        </table>
        <hr>
        @endif
        <br>
        @if($elbow_fist!='')
        <p style="margin-left:230px;">Cotovelo/Punho</p>
        <table class="table table-white">
            
                    <tbody>
                    
                        <tr>
                            <td> Flexão Cotovelo Direita:  {{$elbow_fist['right_elbow_flexion']}}</td>
                            <td> Flexão Cotovelo Esquerda:  {{$elbow_fist['left_elbow_flexion']}}</td>
                            <td> Extensão Cotovelo Direita:  {{$elbow_fist['right_elbow_extension']}}</td>
                            <td> Extensão Cotovelo Esquerda:  {{$elbow_fist['left_elbow_extension']}}</td>
                        <tr>   
                        <tr>
                            <td> Flexão Punho Direita:  {{$elbow_fist['right_fist_flexion']}}</td>
                            <td> Flexão Punho Esquerda:  {{$elbow_fist['left_fist_flexion']}}</td>
                            <td> Extensão Punho Direita:  {{$elbow_fist['right_fist_extension']}}</td>
                            <td> Extensão Punho Esquerda:  {{$elbow_fist['left_fist_extension']}}</td>
                        <tr>  
                        <tr>
                            <td> Supinação Direita:  {{$elbow_fist['right_supination']}}</td>
                            <td> Supinação Esquerda:  {{$elbow_fist['left_supination']}}</td>
                            <td> Pronação Direita: {{$elbow_fist['right_pronation']}}</td>
                            <td> Pronação Esquerda:  {{$elbow_fist['left_pronation']}}</td>
                        <tr>   
                        
                              
                    </tbody>
        </table>

        <hr>
        @endif
        <br>
        @if($ankle!='')
        <p style="margin-left:230px;">Tornozelo</p>
        <table class="table table-white">
            
                    <tbody>
                    
                        <tr>
                            <td> Flexão Plantar Direita:  {{$ankle['right_plantar_flexion']}}</td>
                            <td> Flexão Plantar Esquerda:  {{$ankle['left_plantar_flexion']}}</td>
                            <td> Dorsiflexão Direita: {{$ankle['right_dorsiflexion']}}</td>
                            <td> Dorsiflexão Esquerda:  {{$ankle['left_dorsiflexion']}}</td>
                        <tr>   
                        <tr>
                            <td> Inversão Direita:  {{$ankle['right_inversion']}}</td>
                            <td> Inversão Esquerda:  {{$ankle['left_inversion']}}</td>
                            <td> Eversão Direita:  {{$ankle['right_eversion']}}</td>
                            <td> Eversão Esquerda:  {{$ankle['left_eversion']}}</td>
                        <tr>  
                       
                    </tbody>
        </table>
        @endif
</div>
</body>

</html>