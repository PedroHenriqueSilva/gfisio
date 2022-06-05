@extends('layouts.main')

@section('title', 'Information Users')

@section('content')

        <div id="user-create-container" class="col-md-10 offset-md-2">
            
        <form action="/patients/edit/{{$patient->id}}" method="POST" enctype="multipart/form-data" disabled>
            @csrf
            @method('GET')
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="title">Nome:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $patient->name }}" disabled>
                    </div>
                </div>
                
                <div class="col-md-3">    
                    <div class="form-group">
                        <label for="title">Data Nasc:</label>
                        <input type="date" class="form-control" id="date_nasc" name="date_nasc" value="{{ $patient->date_nasc }}" disabled>
                    </div>
                </div>
                <div class="col-md-2">    
                    <div class="form-group">
                        <label for="title">Sexo:</label>
                        <select name="sex" id="sex" class="form-control" disabled>
                            <option value=""></option>
                            <option value="masc" {{ $patient->sex == "masc" ? 'selected' : '' }}>M</option>
                            <option value="fem"{{ $patient->sex == "fem" ? 'selected' : '' }}>F</option>
                        </select>
                    </div>
                </div>
            </div>
            </br>
            <div class="row">
                <div class="col-md-4">        
                    <div class="form-group">
                        <label for="title">Endereço:</label>
                        <input type="text" class="form-control" id="end" name="end" value="{{ $patient->end }}" disabled>
                    </div>
                </div>    
                <div class="col-md-2">    
                    <div class="form-group">
                        <label for="title">Estado:</label>
                        <input type="text" class="form-control" id="state" name="state" value="{{ $patient->state }}" disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="title">Cidade:</label>
                        <input type="city" class="form-control" name="city" id="city" value="{{ $patient->city }}" disabled>
                    </div>
                </div> 
               
            </div>  
            </br>
            <div class="row">
                <div class="col-md-4">        
                    <div class="form-group">
                        <label for="title">Profissão:</label>
                        <input type="text" class="form-control" id="profission" name="profission" value="{{ $patient->profission }}" disabled>
                    </div>
                </div>    
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="title">Estado Civil:</label>
                        <input type="text" class="form-control" id="civil_status" name="civil_status" value="{{ $patient->civil_status }}" disabled>
                    </div>
                </div>    
                <div class="col-md-1">
                    <div class="form-group">
                        <label for="title">Filhos:</label>
                        <input type="text" class="form-control" id="sons" name="sons" value="{{ $patient->sons }}" disabled>
                    </div>
                </div> 
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="title">Lado Dominante:</label>
                        <select name="dominant_side" id="dominant_side" class="form-control" disabled>
                            <option value=""></option>
                            <option value="esquerdo"{{ $patient->dominant_side == "esquerdo" ? 'selected' : '' }}>esquerdo</option>
                            <option value="direito" {{ $patient->dominant_side == "direito" ? 'selected' : '' }}>direito</option>
                        </select>
                    </div>
                </div> 
            </div>   
            </br>
            <div class="row">
                <div class="col-md-4">        
                    <div class="form-group">
                        <label for="title">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $patient->email }}" disabled>
                    </div>
                </div>    
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="title">Telefone:</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $patient->phone }}" disabled>
                    </div>
                </div>  
            </div>
            </br>
            </br>
            <div class="row">
                <div class="col-md-6 offset-md-4">   
                    <input type="submit" class="btn btn-primary" id="btn-edit" value="editar">
                </div>
            </div>        
        </form>
        </div>
@endsection