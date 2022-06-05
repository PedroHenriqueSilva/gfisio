@extends('layouts.main')

@section('title', 'Show Exercises')

@section('content')
<div class="pagetitle">
    <h1>Visualizar Exercícios</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="">Exercícios</a></li>
            <li class="breadcrumb-item active" aria-current="page">Visualizar Exercícios</li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            @if((count($exercise) == '0'))
                <p>Não existem exercícios cadastrados!!!</p>
            @else    
            <table class="table ">
                    <thead>   
                        <th>#</th>
                        <th>Nome do Exercício:</th>
                        <th>Vídeo:</th>
                        <th>Ações:</th>
                    </thead>
                    <tbody>
                        @php
                            $num = 1;
                        @endphp

                        @foreach($exercise as $exer)
                        <tr class="col-md-10">
                            <td>
                                @php
                                    print($num);
                                    $num +=1;
                                @endphp
                            </td>
                            <td>
                                {{$exer->exercise_name}}
                            </td>
                            <td>
                                <a href="/videos/exercise_video/{{ $exer->exercise_video}}">
                                    <video src="/videos/exercise_video/{{ $exer->exercise_video}}" alt="{{ $exer->exercise_video}}" class="video-preview">
                                </a>
                        
                            </td>   
                            <td>
                                <a href="/exercises/edit/{{$exer->id}}" class="btn" data-toggle="tooltip" data-placement="top" title="Editar Exercício"> <i class="bi-pencil-fill"></i></a>
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#excluir_exer_modal" data-id="{{$exer->id}}"><i class="bi-x-square" style="color:red;"></i></button>
                              
                           </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
            <div class="d-flex justify-content-center">
                @if (isset($filters))
                    {{ $exercise->appends($filters)->links() }}
                @else
                    {{ $exercise->links() }}
                @endif
            </div>
            @endif
        </div>
    </div>
</section>


<!-- Modal Excluir Exercício -->
<form id = "deleteForm" action=" {{ route('exercises.destroy', $exer->id)}}" method="get" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="DELETE">
    @csrf
    <div class="modal fade" id="excluir_exer_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Exercício</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir?</p>
                </div>
                <input type="hidden" name="exer_id" id="exer_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </div>
        </div>
    </div>
</form> 


<script type="text/javascript">
$('#excluir_exer_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#exer_id').val(recipientId)
    })  
</script>    

@endsection