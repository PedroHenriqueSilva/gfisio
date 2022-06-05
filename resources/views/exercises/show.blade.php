@extends('layouts.main')

@section('title', 'Show Exercises')

@section('content')
<div class="pagetitle">
    <h1>Visualizar Exercícios</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="">Exercícios</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastrar Exercícios</li>
        </ol>
    </nav>
</div>


<div class="row">
    <div class="col-md-12">
        <table class="table ">
                <thead>   
                    <th>Nome do Exercício:</th>
                    <th>Descrição:</th>
                    <th>Vídeo:</th>
                    <th>Ações:</th>
                </thead>
                <tbody>
                    <tr class="col-md-10">
                        <td class="col-md-4">{{}}</td>
                         
                    </tr>
                </tbody>
        </table>
    </div>    
                    
</div>

@endsection