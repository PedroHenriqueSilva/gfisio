@extends('layouts.main')

@section('title', 'Visualizar Usuários')

@section('content')
<div class="pagetitle">
    <h1>Usuários</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Usuários</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-10" style="margin-bottom:3px;">
            <form action="{{ route('users.search') }}" method="post" class="bg-white">
            @csrf
                <input type="text" name="search" placeholder="Filtrar:" class="flex-1 appearance-none rounded p-1 text-grey-dark mr-2 focus:outline-none">
                <button type="submit" class="uppercase p-1 rounded bg-blue-500 text-blue-50 max-w-max shadow-sm hover:shadow-lg">Filtrar</button>
            </form>
        </div>
        <div class="col-lg-2">
            <a href="/users/create" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Editar">Cadastrar Usuário</a>
        </div>  
    </div>
    <br>
    <div class="row">
    @foreach($users as $key=> $user) 
        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            Nome:&nbsp {{$user->name}}&nbsp&nbsp&nbsp
                        </div>
                        <div class="col-lg-3">
                            Data Nasc: {{$user->date_nasc}}&nbsp&nbsp&nbsp  
                        </div> 
                        <div class="col-lg-2">
                            Tipo: {{$user->role}}&nbsp&nbsp&nbsp
                        </div>
                        <div class="col-lg-2">
                            <a href="/users/show/{{ $user->id }}" class="btn" data-toggle="tooltip" data-placement="top" title="Visualizar Usuário"> <i class="bi-pencil-fill" style="color:#47748b;"></i></a>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#excluir_user_modal" data-id="{{$user->id}}"><i class="bi-x-square" style="color:red;"></i></button>
                        </div>
                    </div>
                </div>
            </div><!-- End Default Card -->
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


<!-- Modal -->
<form id = "deleteForm" action=" {{ route('users.destroy', $user->id)}}" method="get" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="DELETE">
    @csrf
    <div class="modal fade" id="excluir_user_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir?</p>
                </div>
                <input type="hidden" name="user_id" id="user_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </div>
        </div>
    </div>
</form>    

<script type="text/javascript">
$('#excluir_user_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#user_id').val(recipientId)
    })  
</script> 

@endsection

