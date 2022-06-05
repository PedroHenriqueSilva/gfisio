@extends('layouts.main')

@section('title', 'Information Users')

@section('content')
<div class="pagetitle">
    <h1>Usuário</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users">Usuários</a></li>
            <li class="breadcrumb-item active" aria-current="page">Visualizar Usuário</li>
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
                            Nome:&nbsp<span id="title_card">{{$user->name}}&nbsp&nbsp&nbsp</span>
                        </div>   
                        <div class="col-lg-3"> 
                            <span class="text-right"> Data Nasc:&nbsp</span><span id="title_card">{{$user->date_nasc}}&nbsp&nbsp&nbsp</span>
                        </div>
                        <div class="col-lg-3">    
                            <span class="text-right"> Gênero:&nbsp</span><span id="title_card">{{$user->sex}}</span>
                        </div>
                    </div>
                    <br>  
                    <div class="row">
                        <div class="col-lg-4">
                            Endereço:&nbsp<span id="title_card">{{$user->end}}&nbsp&nbsp&nbsp</span>
                        </div>
                        <div class="col-lg-3">
                            <span class="text-right"> Estado:&nbsp</span><span id="title_card">{{$user->state}}&nbsp&nbsp&nbsp</span>
                        </div>
                        <div class="col-lg-3">
                        <span class="text-right"> Cidade:&nbsp</span><span id="title_card">{{$user->city}}&nbsp&nbsp&nbsp</span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3">
                            Profissão:&nbsp<span id="title_card">{{$user->profission}}&nbsp&nbsp&nbsp</span>
                        </div>
                        <div class="col-lg-3">
                            <span class="text-right"> Estado Civil:&nbsp</span><span id="title_card">{{$user->civil_status}}&nbsp&nbsp&nbsp</span>
                        </div>
                        <div class="col-lg-3">
                            <span class="text-right"> Filhos:&nbsp</span><span id="title_card">{{$user->son}}&nbsp&nbsp&nbsp</span>
                        </div>
                        <div class="col-lg-3">
                            <span class="text-right"> Lado Dominante:&nbsp</span><span id="title_card">{{$user->dominant_side}}&nbsp&nbsp&nbsp</span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-5">
                             <span class="text-right"> Email:&nbsp</span><span id="title_card">{{$user->email}}&nbsp&nbsp&nbsp</span> 
                        </div>
                        <div class="col-lg-3">
                             <span class="text-right"> Tipo:&nbsp</span><span id="title_card">{{$user->role}}&nbsp&nbsp&nbsp</span>                             
                        </div>
                    <br>
                    @if ((Auth::user()->role)=="admin")
                    <h6 class="m-b-20" >   
                        <span class="f-right"> 
                         <a href="/users/edit/{{$user->id}}" class="btn btn-dark" > Editar</a>
                        </span>     
                     </h6>  
                    @endif                    
                </div>
            </div>
            
        </div>
        
    </div>
   
</section>

@endsection