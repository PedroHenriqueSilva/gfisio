@extends('layouts.main')

@section('title', 'Create Patients')

@section('content')

        <div id="user-create-container" class="col-md-10 offset-md-2">
            
        <form action="/patients" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="title">Nome:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                
                <div class="col-md-3">    
                    <div class="form-group" >
                        <label for="date">Data Nasc:</label>
                        <input type="date"  class="form-control" id="date_nasc" name="date_nasc" >
                        
                    </div>
                </div>
                <div class="col-md-2">    
                    <div class="form-group">
                        <label for="title">Sexo:</label>
                        <select name="sex" id="sex" class="form-control">
                            <option value=""></option>
                            <option value="masc">M</option>
                            <option value="fem">F</option>
                        </select>
                    </div>
                </div>
            </div>
            </br>
            <div class="row">
                <div class="col-md-4">        
                    <div class="form-group">
                        <label for="title">Endereço:</label>
                        <input type="text" class="form-control" id="end" name="end">
                    </div>
                </div>    
                <div class="col-md-2">    
                    <div class="form-group">
                        <label for="title">Estado:</label>
                        <input type="text" class="form-control" id="state" name="state">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="title">Cidade:</label>
                        <input type="city" class="form-control" name="city" id="city" >
                    </div>
                </div> 
                
            </div>  
            </br>
            <div class="row">
                <div class="col-md-4">        
                    <div class="form-group">
                        <label for="title">Profissão:</label>
                        <input type="text" class="form-control" id="profission" name="profission">
                    </div>
                </div>    
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="title">Estado Civil:</label>
                        <input type="text" class="form-control" id="civil_status" name="civil_status">
                    </div>
                </div>    
                <div class="col-md-1">
                    <div class="form-group">
                        <label for="title">Filhos:</label>
                        <input type="text" class="form-control" id="sons" name="sons">
                    </div>
                </div> 
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="title">Lado Dominante:</label>
                        <select name="dominant_side" id="dominant_side" class="form-control">
                            <option value=""></option>
                            <option value="esquerdo">esquerdo</option>
                            <option value="direito">direito</option>
                        </select>
                    </div>
                </div> 
            </div>   
            </br>
            <div class="row">
                <div class="col-md-4">        
                    <div class="form-group">
                        <label for="title">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="title">Telefone:</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                </div>       
            
            </div>
            </br>
            </br>
            <div class="row">
                <div class="col-md-6 offset-md-4">   
                    <input type="submit" class="btn btn-dark" id="btn-register" value="Register">
                </div>
            </div>        
        </form>
        </div>
@endsection