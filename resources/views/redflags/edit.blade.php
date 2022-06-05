@extends('layouts.main')

@section('title', 'Edit Redflags')

@section('content')
<div class="pagetitle">
    <h1>Redflags</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/show/{{$avaliationOwtner['id']}}">Pacientes</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/{{$avaliationOwtner['id']}}">Avaliação</a></li>
            <li class="breadcrumb-item"><a href="/avaliations/info/{{$avaliation['id']}}">Avaliação Info</a></li>
            <li class="breadcrumb-item"><a href="/redflags/show/{{$redflag['id']}}">Redflag</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Redflags</li>
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
                            <b>Nome:</b>&nbsp  {{$avaliationOwtner['name']}}
                        </div>
                        <div class="col-lg-4">
                            <b>Data Nasc:</b> &nbsp {{date( 'd-m-Y' , strtotime($avaliationOwtner['date_nasc']))}} 
                        </div> 
                    </div>                             
                </div>
            </div>       
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="/redflags/update/{{$redflag['id']}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <table class="table table-white">
                        <tbody>
                            <tr class="col-md-8">
                                <td class="col-md-6"><b>Febre Ultimamente:&nbsp &nbsp</b>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fever" id="simfebre" value="sim" onclick="text(0)" {{ $redflag->fever == "sim" ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineRadio1" >Sim</label>
                                    </div>   
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fever" id="naofebre" value="nao" onclick="text(1)"  {{ $redflag->fever == "nao" ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineRadio2" >Não</label>
                                    </div>
                                    <div class="col-md-10" id="fever">
                                        <textarea class="form-control" id="description-redflags" name="fever_descr">{{$redflag->fever_descr}} </textarea>
                                    </div>
                                </td>
                                <td class="col-md-6"><b>Caído sem motivos:&nbsp &nbsp</b>
                                    <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="fallen" id="sim_caido" value="sim" onclick="text(2)" {{ $redflag->fallen == "sim" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                    </div>        
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fallen" id="nao_caido" value="nao" onclick="text(3)" {{ $redflag->fallen == "nao" ? 'checked' : '' }} >
                                        <label class="form-check-label" for="inlineRadio2">Não</label>
                                    </div>
                                    <div class="col-md-10" id="fallen">
                                        <textarea class="form-control" id="description-redflags" name="fallen_descr">{{$redflag->fallen_descr}} </textarea>
                                    </div>
                                </td>    
                            </tr> 

                            <tr class="col-md-8">
                                <td class="col-md-6"><b>Tonturas:&nbsp &nbsp &nbsp &nbsp</b>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dizziness" id="sim_tontura" value="sim" onclick="text(4)" {{ $redflag->dizziness == "sim" ? 'checked' : '' }} >
                                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dizziness" id="nao_tontura" value="nao" onclick="text(5)" {{ $redflag->dizziness == "nao" ? 'checked' : '' }} >
                                        <label class="form-check-label" for="inlineRadio2">Não</label>
                                    </div>
                                    <div class="col-md-10" id="dizziness">
                                        <textarea class="form-control" id="description-redflags" name="dizziness_descr"> {{$redflag->dizziness_descr}}</textarea>
                                    </div>
                                </td>
                                <td class="col-md-6"><b>Dificuldades ao andar:&nbsp &nbsp</b>
                                    <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="dif_walking" id="sim_dif_andar" value="sim" onclick="text(6)"{{ $redflag->dif_walking == "sim" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                    </div>       
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dif_walking" id="nao_dif_andar" value="nao" onclick="text(7)"{{ $redflag->dif_walking == "nao" ? 'checked' : '' }} >
                                        <label class="form-check-label" for="inlineRadio2">Não</label>
                                    </div>
                                    <div class="col-md-10" id="dif_walking">
                                        <textarea class="form-control" id="description-redflags" name="dif_walking_descr"> {{$redflag->dif_walking_descr}}</textarea>
                                    </div>
                            </tr> 

                            <tr class="col-md-8">
                                <td class="col-md-6"><b>Dor Notura:&nbsp &nbsp &nbsp &nbsp</b>
                                    <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="notura_pain" id="sim_dor_notura" value="sim" onclick="text(8)" {{ $redflag->notura_pain == "sim" ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="notura_pain" id="nao_dor_notura" value="nao" onclick="text(9)" {{ $redflag->notura_pain == "nao" ? 'checked' : '' }} >
                                                <label class="form-check-label" for="inlineRadio2" >Não</label>
                                            </div>
                                    </div>
                                    <div class="col-md-10" id="notura_pain">
                                        <textarea class="form-control" id="description-redflags" name="notura_pain_descr">{{$redflag->notura_pain_descr}} </textarea>
                                    </div>
                            </td>
                            <td class="col-md-6"><b>Rigidez ao levantar:&nbsp &nbsp</b>
                                    <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="stiffness" id="sim_rigidez" value="sim" onclick="text(10)"  {{ $redflag->stiffness == "sim" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="stiffness" id="nao_rigidez" value="nao" onclick="text(11)"  {{ $redflag->stiffness == "nao" ? 'checked' : '' }} >
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                    </div>
                                    <div class="col-md-10" id="stiffness">
                                        <textarea class="form-control" id="description-redflags" name="stiffness_descr">{{$redflag->stiffness_descr}}  </textarea>
                                    </div>
                            </tr> 

                            <tr class="col-md-8">
                                <td class="col-md-6"><b>Perda de peso sem motivos: &nbsp &nbsp &nbsp</b>
                                    <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="weight_loss" id="sim_perda_peso" value="sim" onclick="text(12)" {{ $redflag->weight_loss == "sim" ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="weight_loss" id="nao_perda_peso" value="nao" onclick="text(13)"  {{ $redflag->weight_loss == "nao" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                    </div>
                                    <div class="col-md-10" id="weight_loss">
                                        <textarea class="form-control" id="description-redflags" name="weight_loss_descr"> {{$redflag->weight_loss_descr}} </textarea>
                                    </div>
                            </td>
                            <td class="col-md-6"><b>Desmaios sem motivos:&nbsp &nbsp</b>
                                    <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="faint" id="sim_desmaio" value="sim" onclick="text(14)" {{ $redflag->faint == "sim" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="faint" id="nao_desmaio" value="nao" onclick="text(15)" {{ $redflag->faint == "nao" ? 'checked' : '' }} >
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                    </div>
                                    <div class="col-md-10" id="faint">
                                        <textarea class="form-control" id="description-redflags" name="faint_descr">{{$redflag->faint_descr}}  </textarea>
                                    </div>
                            </tr> 

                            <tr class="col-md-8">
                                <td class="col-md-6"><b>Formigamento corporal: &nbsp &nbsp &nbsp</b>
                                    <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="formication" id="sim_formigamento" value="sim" onclick="text(16)" {{ $redflag->formication == "sim" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="formication" id="nao_formigamento" value="nao" onclick="text(17)" {{ $redflag->formication == "nao" ? 'checked' : '' }} >
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                    </div>
                                    <div class="col-md-10" id="formication">
                                        <textarea class="form-control" id="description-redflags" name="formication_descr">{{$redflag->formication_descr}}  </textarea>
                                    </div>
                            </td>
                            <td class="col-md-6"><b>Cansaço/Fadiga anormal:&nbsp &nbsp</b>
                                    <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tiredness" id="sim_cansaco" value="sim" onclick="text(18)" {{ $redflag->tiredness == "sim" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tiredness" id="nao_cansaco" value="nao" onclick="text(19)" {{ $redflag->tiredness == "nao" ? 'checked' : '' }} >
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                    </div>
                                    <div class="col-md-10" id="tiredness">
                                        <textarea class="form-control" id="description-redflags" name="tiredness_descr">{{$redflag->tiredness_descr}}  </textarea>
                                    </div>
                            </tr> 

                            <tr class="col-md-8">
                                <td class="col-md-6"><b>Dor que não passa: &nbsp &nbsp &nbsp</b>
                                    <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="endless_pain" id="sim_dor_nao_passa" value="sim" onclick="text11(20)" {{ $redflag->endless_pain == "sim" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="endless_pain" id="nao_dor_nao_passa" value="nao" onclick="text(21)" {{ $redflag->endless_pain == "nao" ? 'checked' : '' }} >
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                    </div>
                                    <div class="col-md-10" id="endless_pain">
                                        <textarea class="form-control" id="description-redflags" name="endless_pain_descr">{{$redflag->endless_pain_descr}}  </textarea>
                                    </div>
                            </td>
                            <td class="col-md-6"><b>Disfunções Urinárias:&nbsp &nbsp</b>
                                    <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="urinary_dysfunction" id="sim_disf_urinaria" value="sim" onclick="text(22)" {{ $redflag->urinary_dysfunction == "sim" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="urinary_dysfunction" id="nao_disf_urinaria" value="nao" onclick="text(23)" {{ $redflag->urinary_dysfunction == "nao" ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                    </div>
                                    <div class="col-md-10" id="urinary_dysfunction">
                                        <textarea class="form-control" id="description-redflags" name="urinary_dysfunction_descr"> {{$redflag->urinary_dysfunction_descr}} </textarea>
                                    </div>
                            </tr> 

                            <tr class="col-md-8">
                                <td class="col-md-6"><b>Disfunções intestinais: &nbsp &nbsp &nbsp</b>
                                    <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="intestinal_dysfunction" id="sim_disf_intestinal" value="sim" onclick="text(24)" {{ $redflag->intestinal_dysfunction == "sim" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="intestinal_dysfunction" id="nao_disf_intestinal" value="nao" onclick="text(25)" {{ $redflag->intestinal_dysfunction == "nao" ? 'checked' : '' }} >
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                    </div>
                                    <div class="col-md-10" id="intestinal_dysfunction">
                                        <textarea class="form-control" id="description-redflags" name="intestinal_dysfunction_descr">{{$redflag->intestinal_dysfunction_descr}}  </textarea>
                                    </div>
                            </td>
                            <td class="col-md-6"><b>Disfunções Sexuais:&nbsp &nbsp</b>
                                    <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sexual_dysfunction" id="sim_disf_disf_sexual" value="sim" onclick="text(26)" {{ $redflag->sexual_dysfunction == "sim" ? 'checked' : '' }} >
                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sexual_dysfunction" id="nao_disf_sexual" value="nao" onclick="text(27)" {{ $redflag->sexual_dysfunction == "nao" ? 'checked' : '' }} >
                                                <label class="form-check-label" for="inlineRadio2">Não</label>
                                            </div>
                                    </div>
                                    <div class="col-md-10" id="sexual_dysfunction">
                                        <textarea class="form-control" id="description-redflags" name="sexual_dysfunction_descr">{{$redflag->sexual_dysfunction_descr}} </textarea>
                                    </div>
                            </tr> 
                        </tbody>  
                    </table>
                </div>
                <div class="row">
                        <div class="col-md-2">   
                            <input type="submit" class="btn btn-dark" value="Editar">
                        </div>  
                </div>
             </form>
        </div>
    </div>
</section>
<br><br><br>
@endsection