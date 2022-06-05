@extends('layouts.main')

@section('title', 'Information Users')

@section('content')
<div class="pagetitle">
    <h1>Editar Usuário</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users">Usuários</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Usuário</li>
        </ol>
    </nav>
</div>


<section class="section dashboard">
    <div class="row">
           <!-- Left side columns -->
        <div class="col-lg-12">
            <form action="/users/update/{{$user->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="title">Nome:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}">
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
                            <input type="date" class="form-control @error('date_nasc') is-invalid @enderror" id="date_nasc" name="date_nasc" value="{{ $user->date_nasc }}" >
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
                            <select name="sex" id="sex" class="form-control">
                                <option value="Masculino" {{ $user->sex == "Masculino" ? 'selected' : '' }}>Masculino</option>
                                <option value="Feminino"{{ $user->sex == "Feminino" ? 'selected' : '' }}>Feminino</option>
                                <option value="Indefinido"{{ $user->sex == "Indefinido" ? 'selected' : '' }}>Indefinido</option>
                            </select>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">        
                        <div class="form-group">
                            <label for="title">Endereço:</label>
                            <input type="text" class="form-control @error('end') is-invalid @enderror" id="end" name="end" value="{{ $user->end }}">
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
                            <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" name="state" value="{{ $user->state }}">
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
                            <input type="city" class="form-control @error('city') is-invalid @enderror" name="city" id="city" value="{{ $user->city }}">
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
                            <input type="text" class="form-control @error('profission') is-invalid @enderror" id="profission" name="profission" value="{{ $user->profission }}">
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
                            <select name="civil_status" id="civil_status" class="form-control">
                                <option value="solteiro"{{ $user->civil_status == "solteiro" ? 'selected' : '' }}>solteiro</option>
                                <option value="casado" {{ $user->civil_status == "casado" ? 'selected' : '' }}>casado</option>
                                <option value="divorciado"{{ $user->civil_status == "divorciado" ? 'selected' : '' }}>divorciado</option>
                                <option value="outros"{{ $user->civil_status == "outros" ? 'selected' : '' }}>outros</option>
                            </select>  
                        </div>
                    </div>    
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="title">Filhos:</label>
                            <input type="number" class="form-control @error('son') is-invalid @enderror" id="son" name="son" value="{{ $user->son }}" >
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
                            <select name="dominant_side" id="dominant_side" class="form-control">
                                <option value="esquerdo"{{ $user->dominant_side == "esquerdo" ? 'selected' : '' }}>esquerdo</option>
                                <option value="direito" {{ $user->dominant_side == "direito" ? 'selected' : '' }}>direito</option>
                            </select>
                        </div>
                    </div> 
                </div>   
                <br>
                <div class="row">
                    <div class="col-md-4">        
                        <div class="form-group">
                            <label for="title">Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-4">        
                        <div class="form-group">
                            <label for="title">Telefone:</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $user->phone }}">
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="title">Role:</label>
                            <select name="role" id="role" class="form-control">
                                <option value="paciente"{{ $user->role == "paciente" ? 'selected' : '' }}>paciente</option>
                                <option value="admin" {{ $user->role == "admin" ? 'selected' : '' }}>admin</option>
                            </select>
                        </div>
                    </div>    
                    
                </div>
            <br>
                <div class="row">
                    <div class="col-md-2 offset-md-4 text-center">   
                        <input type="submit" class="btn btn-dark" value="editar">
                    </div>
                </div>        
            </form>
        </div>
    </div>
</section>
@endsection