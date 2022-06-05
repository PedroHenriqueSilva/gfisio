@extends('layouts.main')

@section('title', 'Visualizar Pacientes')

@section('content')
<div class="pagetitle">
    <h1>Pacientes</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users/patients">Pacientes</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
    @foreach($users as  $user) 
        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                Nome:&nbsp {{$user->name}}&nbsp&nbsp&nbsp
                            </div>
                            <div class="col-lg-3">
                                Data Nasc: {{$user->date_nasc}}&nbsp&nbsp&nbsp  
                            </div> 
                            <div class="col-lg-3">
                                Cidade: {{$user->city}}&nbsp&nbsp&nbsp
                            </div>
                            <div class="col-lg-2">
                                 
                                <a href="/avaliations/{{$user->id}}" class="btn" data-toggle="tooltip" data-placement="top" title="Avaliações"><i class="bi bi-file-earmark-text" style="color:#47748b;"></i></a>
                            </div>
                            
                        </div>
                    </div>
                </div><!-- End Default Card -->
            </div>
        </div><!-- End Left side columns -->
    @endforeach
    </div>
    <div class="d-flex justify-content-center">
        @if (isset($filters))
            {{ $users->appends($filters)->links() }}
        @else
            {{ $users->links() }}
        @endif
        <br>
    </div>
    <br>
    <br>
</section>


@endsection