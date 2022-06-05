@extends('layouts.main')

@section('title', 'Agenda')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="pagetitle">
    <h1>Agenda</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Agenda</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
      <div class="col-lg-12" id="calendar">

      </div>
    </div>
</section>
<br><br><br>
 
<!-- Calendar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/pt-br.min.js"></script>
@endsection