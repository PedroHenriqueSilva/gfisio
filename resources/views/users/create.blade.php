@extends('layouts.main')

@section('title', 'Information Users')

@section('content')
<div class="pagetitle">
    <h1>Criar Usuário</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users">Usuários</a></li>
            <li class="breadcrumb-item active" aria-current="page">Criar Usuário</li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <form action="/users/store" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="title">Nome:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" >
                            @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror  
                        </div>
                    </div>
                    
                    <div class="col-md-3">    
                        <div class="form-group">
                            <label for="title">Data Nasc:</label>
                            <input type="date" class="form-control @error('date_nasc') is-invalid @enderror" id="date_nasc" name="date_nasc" value="{{old('date_nasc')}}">
                            @error('date_nasc')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror  
                        </div>
                    </div>
                    <div class="col-md-2">    
                        <div class="form-group">
                            <label for="title">Sexo:</label>
                            <select name="sex" id="sex" class="form-control @error('sex') is-invalid @enderror" >
                                <option value="">-- Select --</option>
                                <option value="Masculino" {{old('sex') == "Masculino" ? 'selected' : '' }} >Masculino</option>
                                <option value="Feminino" {{old('sex') == "Feminino" ? 'selected' : '' }} >Feminino</option>
                                <option value="Indefinido" {{old('sex') == "Indefinido" ? 'selected' : '' }} >Indefinido</option>
                            </select>
                            @error('sex')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror  
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">        
                        <div class="form-group">
                            <label for="title">Endereço:</label>
                            <input type="text" class="form-control @error('end') is-invalid @enderror" id="end" name="end" value="{{old('end')}}">
                            @error('end')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror  
                        </div>
                    </div>    
                    <div class="col-md-3">    
                        <div class="form-group">
                            <label for="title">Estado:</label>
                            <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" name="state" value="{{old('state')}}">
                            @error('state')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror  
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="title">Cidade:</label>
                            <input type="city" class="form-control @error('city') is-invalid @enderror" name="city" id="city" value="{{old('city')}}">
                            @error('city')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror  
                        </div>
                    </div> 
                
                </div>  
                <br>
                <div class="row">
                    <div class="col-md-6">        
                        <div class="form-group">
                            <label for="title">Profissão:</label>
                            <input type="text" class="form-control @error('profission') is-invalid @enderror" id="profission" name="profission" value="{{old('profission')}}">
                            @error('profission')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror  
                        </div>
                    </div>    
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="title">Estado Civil:</label>
                            <select name="civil_status" id="civil_status" class="form-control @error('civil_status') is-invalid @enderror">
                                <option value="">-- Select --</option>
                                <option value="solteiro" {{old('civil_status') == "solteiro" ? 'selected' : '' }}>solteiro</option>
                                <option value="casado" {{old('civil_status') == "casado" ? 'selected' : '' }}>casado</option>
                                <option value="divorciado "{{old('civil_status') == "divorciado" ? 'selected' : '' }}>divorciado</option>
                                <option value="outros" {{old('civil_status') == "outros" ? 'selected' : '' }}>outros</option>
                            </select>  
                            @error('civil_status')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror  
                        </div>
                    </div>    
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="title">Filhos:</label>
                            <input type="text" class="form-control @error('son') is-invalid @enderror" id="son" name="son" value="{{old('son')}}">
                            @error('son')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                            @enderror  
                        </div>
                    </div> 

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="title">Lado Dominante:</label>
                            <select name="dominant_side" id="dominant_side" class="form-control @error('dominant_side') is-invalid @enderror" value="{{old('dominant_side')}}">
                                <option value="">-- Select--</option>
                                <option value="esquerdo" {{old('dominant_side') == "esquerdo" ? 'selected' : '' }}>esquerdo</option>
                                <option value="direito" {{old('dominant_side') == "esquerdo" ? 'selected' : '' }}>direito</option>
                            </select>
                            @error('dominant_side')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror  
                        </div>
                    </div> 
                </div>   
                <br>
                <div class="row">
                    <div class="col-md-4">        
                        <div class="form-group">
                            <label for="title">Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror  
                        </div>
                    </div> 
                    <div class="col-md-2">        
                        <div class="form-group">
                            <label for="title">Telefone:</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror"  name="phone" value="{{old('phone')}}">
                            @error('phone') 
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                            @enderror  
                        </div>
                    </div> 
                    
                </div>
                <br>
            
                <div class="row" >
                    <div class="col-md-8 offset-md-2 text-center">   
                        <input type="submit" class="btn btn-dark" value="Cadastrar">
                    </div>
                </div>        
            </form>

        </div>
    </div>   
</section>
<br><br><br> 
 
      

@endsection
