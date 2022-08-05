<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gabriel Goulart</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  
  <!-- Calendar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/pt-br.min.js"></script>      
  
    <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link type="text/css" href="{{url('/assets/css/style.css')}}" rel="stylesheet">
  <script src="/js/scripts.js"></script>
 
  <link rel="stylesheet" href="/css/fullcalendar.css">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    
    <div class="d-flex align-items-center justify-content-between">
      <a href="/dashboard" class="logo d-flex align-items-center">
        <img src="/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Gabriel Goulart</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
     
        @guest
        <li class="nav-item dropdown">
          <a class="nav-link nav-icon" href="https://www.instagram.com/gabrielgoulart88/" target="_blank">
            <i class="bi bi-instagram"></i>
          </a><!-- End Notification Icon -->        
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link nav-icon" href="https://api.whatsapp.com/send/?phone=5535997525022&text&app_absent=0" target="_blank">
            <i class="bi bi-whatsapp"></i>
          </a>    
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link nav-icon" href="https://www.facebook.com/" target="_blank">
            <i class="bi bi-facebook"></i>
          </a>    
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link nav-profile d-flex align-items-center pe-3" href="/login">Entrar</a>                  
        </li>
        @endguest
        @auth
        <li class="nav-item dropdown pe-3">
          
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"> 
              @php
                $user = auth()->user();
                echo strstr($user->name, ' ', true);
                
             @endphp
            </span>
                                  
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            
              <li class="dropdown-header">
            
              <h6></h6>
              <span></span>
            </li>
          
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/users/show/{{$user->id}}">
                <i class="bi bi-person"></i>
                <span>Meu Perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <button class="dropdown-item d-flex align-items-center"  data-bs-toggle="modal" data-bs-target="#editar_change_password_modal" data-id="{{$user->id}}">
                <i class="bi bi-gear"></i>
                <span>Alterar Senha</span>
              </button>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/logout" >
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
        @endauth
        
      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
 
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
    @auth
      @if ((Auth::user()->role)=="admin")
        <li class="nav-item">
          <a class="nav-link " href="/dashboard">
            <i class="bi bi-grid-fill" style="color:#353D41"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person-fill"  style="color:#353D41"></i><span>Usuários</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
            <li>
              <a href="/users/create">
                <i class="bi bi-plus"></i><span>Cadastrar</span>
              </a>
            </li>
            <li>
              <a href="/users">
                <i class="bi bi-eye-fill"></i><span>Visualizar</span>
              </a>
            </li>
          </ul>

        </li><!-- End Components Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-people-fill"  style="color:#353D41"></i><span>Pacientes</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="/users/create">
                <i class="bi bi-circle"></i><span>Cadastrar</span>
              </a>
            </li>
            <li>
              <a href="/users/patients">
                <i class="bi bi-circle"></i><span>Visualizar</span>
              </a>
            </li>
            
          </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#exercises-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-bicycle" style="color:#353D41"></i><span>Exercícios</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="exercises-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="/exercises/create">
                <i class="bi bi-circle"></i><span>Cadastrar Exercícios</span>
              </a>
            </li>
            <li>
              <a href="/exercises">
                <i class="bi bi-circle"></i><span>Visualizar Exercícios</span>
              </a>
            </li>
          </ul>
        </li><!-- End Exercícios Nav -->

        
      @else
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#exercises-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-bicycle" style="color:#353D41"></i><span>Exercícios</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="exercises-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="">
                <i class="bi bi-circle"></i><span>Meus Exercícios</span>
              </a>
            </li>
            
          </ul>
        </li><!-- End Exercícios Nav -->
      @endif
    @endauth
    <li class="nav-item">
      <a class="nav-link collapsed" href="">
        <i class="bi bi-house" style="color:#353D41"></i>
        <span>Home</span>
      </a>
    </li><!-- End Profile Page Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-faq.html">
        <i class="bi bi-activity"  style="color:#353D41"></i>
        <span>Fisioterapia</span>
      </a>
    </li><!-- End F.A.Q Page Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-faq.html">
        <i class="bi bi-person"  style="color:#353D41"></i>
        <span>Sobre</span>
      </a>
    </li><!-- End F.A.Q Page Nav -->

    <li class="nav-item"> 
      <a class="nav-link collapsed" href="pages-contact.html">
        <i class="bi bi-envelope"  style="color:#353D41"></i>
        <span>Contatos</span>
      </a>
    </li><!-- End Contact Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-blank.html">
        <i class="bi bi-geo-alt-fill"  style="color:#353D41"></i>
        <span>Atendimentos</span>
      </a>
    </li><!-- End Blank Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-blank.html">
        <i class="bi bi-newspaper"  style="color:#353D41"></i>
        <span>Notícias</span>
      </a>
    </li><!-- End Blank Page Nav -->
     
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
         <div class="row" style="margin-botton:2px;">
            @if(session('msg'))
            <p class="msg">{{ session('msg') }}</p>
            @endif
            
         </div>   
    @yield('content')
    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer fixed-bottom">
    <div class="copyright">
      &copy; Copyright <span>Fisioterapeuta Gabriel Goulart 2022</span>. All Rights Reserved
    </div>
    
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/chart.js/chart.min.js"></script>
  <script src="/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/assets/vendor/quill/quill.min.js"></script>
  <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

@auth
<!-- Modal Editar Senha Usuário -->
<form id = "deleteForm" action=" {{ route('users.change_password', $user->id)}}" method="put" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="UPDATE">
    @csrf
    <div class="modal fade" id="editar_change_password_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Senha Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input type="password" name="password" id="password_user" value="{{$user->password}}">
                </div>
                <input type="hidden" name="user_id" id="user_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Editar</button>
                </div>
            </div>
        </div>
    </div>
</form>  

<script type="text/javascript">
$('#editar_change_password_modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientId = button.data('id')
      
      console.log(recipientId)
      var modal = $(this)
    
      modal.find('#user_id').val(recipientId)
    })  
</script>    

@endauth


</body>

</html>