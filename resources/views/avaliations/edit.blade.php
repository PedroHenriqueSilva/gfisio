@extends('layouts.main')

@section('title', 'Avaliações')

@section('content')
<div id="avaliation-create-container" class="col-md-10 offset-md-1">
    <form action="/avaliations/update/{{$avaliation->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="title">Data Avaliação:</label>
                        <input type="date" class="form-control" id="date_aval" name="date_aval" value="{{ $avaliation->date_aval }}">
                    </div>
                </div>
            </div>    
</br>
            <div class="row">
                <div class="col-md-12">
                    <label for="title">Dor:</label>
                    <input type="text"  class="form-control" id="pain" name="pain" value="{{ $avaliation->pain }}"> 
                </div> 
            </div>
</br>
            <div class="row">
                <div class="col-md-12">
                    <label for="title">Descrição:</label>
                    <textarea class="form-control" id="description" name="description">{{ $avaliation->description }}</textarea>
                </div> 
            </div>
</br>
</br>
            <div class="row">
                <div class="col-md-2 offset-md-10">   
                    <input type="submit" class="btn btn-dark" id="btn-edit-avaliation" value="Editar">
                </div>  
            </div>   
        </form>    
</div>    
@endsection