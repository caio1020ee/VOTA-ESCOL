<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- icons -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Vota escola') }}</title>

    <!-- Scripts <script src="{{ asset('js/app.js') }}" defer></script>-->
    
    

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Yellowtail' rel='stylesheet'>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Styles -->
    <!--  -->
    
    <link href="" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/now-ui-kit.css?v=1.3.0') }}" rel="stylesheet">
    
    <style>
		  #logo {
    	  font-family: 'Yellowtail';
    	  margin-bottom: 0px;
		  }
      #logomain {
        max-width: 500px;
      }
      #logomaindehm{
        max-width: 30px;
      }
      #vencedor {
        max-width: 400px;
      }
      #backvencedor{
        background-color:blue;
      }
      #letras{
        color:white;
      }
    </style>
    @yield('style')
</head>
@yield('body')
<nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400" >
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{ url('/home') }}">
          <h1 id="logo">vota escola</h1>
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="{{ asset('img/blurred-image-1.jpg') }}">
        <ul class="navbar-nav">
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" onclick="scrollToDownload()">
                            <i class="now-ui-icons arrows-1_minimal-right"></i>
                            <p>Entrar</p>
                        </a>
                    </li>
                @endif
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}" onclick="scrollToDownload()">
                        <i class="now-ui-icons users_single-02"></i>
                        <p>Cadastrar-se</p>
                        </a>
                    </li>
                    @endif
            @else
                  <li class="nav-item" >
                    <a class="nav-link" onclick="scrollToDownload()" style="color:#62D9FF" href="{{ route('candidatos.votar') }}">
                      <i class="now-ui-icons shopping_tag-content" style="color:#62D9FF"></i>
                      <p>Votar</p>
                    </a>
                  </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
              </li>
            @endguest
          
          
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')
       
    <footer class="footer" data-background-color="black">
      <div class=" container ">
        <nav>
          <ul>
            <li>
              <a href="https://www.creative-tim.com">
                EMGE - Campus Belo Horizonte
              </a>
            </li>
            <li>
              <a href="http://presentation.creative-tim.com">
                Projeto
              </a>
            </li>
            <li>
              <a href="http://blog.creative-tim.com">
                <img src="{{ asset('img/logomaindehm.png') }}" class="invision-logo" id="logomaindehm"/>
              </a>
            </li>
          </ul>
        </nav>
        <div class="copyright" id="copyright">
          &copy;
          <script>
            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
          </script>
        </div>
      </div>
    </footer>
     <!--   Core JS Files   -->
     <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
     <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
     <script src="{{ asset('js/popper.min.js') }}" type="text/javascript"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="{{ asset('js/plugins/bootstrap-switch.js') }}"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
     <script src="{{ asset('js/plugins/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
    <script src="{{ asset('js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
    <!--  Google Maps Plugin    -->
     
    <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/now-ui-kit.js?v=1.3.0') }}" type="text/javascript"></script>
    <script>
    $(document).ready(function() {
      // the body of this function is in assets/js/now-ui-kit.js
      nowuiKit.initSliders();
    });

    function scrollToDownload() {

      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
  </script>        
</body>
</html>
