<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('head')<title>BRACU IT</title>
    
    

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        body { padding-bottom: 60px; }
        
        .navbar-default {
        	background-color:#70a8d3;
            color:#ffffff;
          	border-radius:0;
        }
        
        .panel .panel-heading{
            background-color:#70a8d3;
        }
        
        .navbar-default .navbar-nav > li > a {
          	color:#fff;
        }
        .navbar-default .navbar-nav > .active > a, .navbar-nav > .active > a:hover, .navbar-nav > .active > a:focus {
            color: #ffffff;
        	background-color:transparent;
        }
              
        .navbar-default .navbar-nav > li > a:hover, .nav > li > a:focus {
            text-decoration: none;
            background-color: #2C91DE;
        }
              
        .navbar-default .navbar-brand {
          	color:#eeeeee;
        }
        .navbar-default .navbar-toggle {
          	background-color:#eeeeee;
        }
        .navbar-default .icon-bar {
          	background-color:#33aa33;
        }
        .bg {
          background: url('http://coda-craven.org/wp-content/uploads/2016/10/hi_tech_planet-wide-coda-craven.jpg') no-repeat center center;
          position: fixed;
          width: 100%;
          height: 350px; /*same height as jumbotron */
          top:0;
          left:0;
          z-index: -1;
        }
        
        .jumbotron {
          height: 350px;
          color: white;
          text-shadow: #444 0 1px 1px;
          background:transparent;
        }
    </style>
    <script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
    <script>
        webshims.setOptions('forms-ext', {types: 'date'});
        webshims.polyfill('forms forms-ext');
    </script>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                @if(Auth::guest())
                    <a class="navbar-brand" href="{{ url('/') }}">
                        BRACU IT
                    </a>
                @else
                    <a class="navbar-brand" href="#">
                        BRACU IT
                    </a>
                @endif
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                @if( Auth::user())
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('user.posts.index') }}">All Data</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('getstudent') }}">Student ID</a></li>
                </ul>
                    @if( Auth::user()->isAdmin() )
                    <ul class="nav navbar-nav">
                    <li><a href="{{ route('getlab') }}">Labs</a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('admin.index') }}">Admin Area</a></li>
                    </ul>
                    @endif
                @endif
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <!--<li><a href="{{ url('/register') }}">Register</a></li>-->
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script   src="https://code.jquery.com/jquery-1.12.4.js"   integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="   crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script type="text/javascript">
        var jumboHeight = $('.jumbotron').outerHeight();
        function parallax(){
            var scrolled = $(window).scrollTop();
            $('.bg').css('height', (jumboHeight-scrolled) + 'px');
        }
        
        $(window).scroll(function(e){
            parallax();
        });
    </script>
</body>
    <div class="navbar navbar-default navbar-fixed-bottom">
		<div id="footer">
			<div class="container">
			<p class="navbar-text pull-left" style="color:#ffffff;">Copyright © 2016&nbsp; system@bracuniversity.ac.bd &nbsp;</p>
			<p class="navbar-text pull-right" style="color:#ffffff;">Developed by: <a style="color:#165A8E;" href="https://www.linkedin.com/in/wasid-hossain-976788100" target="_blank">M. M. Wasid Hossain</a></p>
			</div>
		</div>
    </div>
</html>
