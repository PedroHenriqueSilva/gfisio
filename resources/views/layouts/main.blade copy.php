<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       

        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        

        <!-- links Config-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
    

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
       
        <!-- CSS Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
       


        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>



<script src="/js/agend.js"></script>
        
        <link rel="stylesheet" href="/css/fullcalendar.css">
        <link rel="stylesheet" href="/css/cards.css">


        <script type= "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" > </script> 
        <script nomodule  src = "https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js" > </script>
        
    </head>
   
    <body> 
     
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
            <h3 id="font_menu">Gabriel Goulart</h3>
                <strong>GG</strong>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <ion-icon name="person"></ion-icon>
                        Usuários
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="/users/create">Cadastrar</a>
                        </li>
                        <li>
                            <a href="/users">Visualizar</a>
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <ion-icon name="people"></ion-icon>
                        Pacientes
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu2">
                        <li>
                            <a href="#">Cadastrar</a>
                        </li>
                        <li>
                            <a href="/users/patients">Visualizar</a>
                        </li>
                       
                    </ul>
                </li>
                
                
                <li>
                    
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <ion-icon name="barbell"></ion-icon>
                        Exercícios
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="/exercises/create">Cadastrar</a>
                        </li>
                        <li>
                            <a href="/exercises">Visualizar</a>
                        </li>
                       
                    </ul>

                 
                </li>

                <li>
                    <a href="/agend">
                        <i class="fas fa-calendar"></i>
                        Agenda
                    </a>
                </li>

                <li>
                    <a href="/contacts">
                        <i class="fas fa-paper-plane"></i>
                        Contatos
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-image"></i>
                        Documentação
                    </a>
                </li>
                
                <li>
                    <a href="#">
                        <i class="fas fa-question"></i>
                        Dúvidas
                    </a>
                </li>
                <li>
                   
                </li>
               
            </ul>
           
            
        </nav>
       
        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar" style="position:fixed; top:0;" >
</nav>

             <div class="main">
                <div class="row">
                    @if(session('msg'))
                    <p class="msg">{{ session('msg') }}</p>
                    @endif
                </div>   
                @yield('content')
            
                <footer>
                    <p>Fisioterapeuta Gabriel Goulart &copy; 2022</p>
                </footer>
            </div>
        </div>
        
    </div>

     
  

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
   
   
@auth
<!-- Modal Editar Avaliação -->
<form id = "deleteForm" action=" {{ route('users.change_password', $user->id)}}" method="put" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="UPDATE">
    @csrf
    <div class="modal fade bd-example-modal-sm" id="editar_change_password_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Editar Senha Usuário</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <input type="password" name="password" id="password_user" value="{{$user->password}}">
            </div>
            <input type="hidden" name="user_id" id="user_id">
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-dark">Editar</button>
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