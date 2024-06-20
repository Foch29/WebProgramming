

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href="{{ url('css/common.css') }}">
    <title>@yield('title')</title>

    
    <link rel="icon" type="image/x-icon" href= "{{ url('/img/Logo.png')}}">  {{-- public non é necessario nell'url --}}
    @yield('css')
    @yield("js")

</head>


<body>

    <nav>
        <a class="link" href="{{ url('/') }}">
            <div id="logo">
                <img id="logo_immagine" src= "{{ url('/img/Logo.png') }}">
                <img id="logo_testo"src="{{ url('/img/Testo_logo.png') }}">
            </div>
        </a>
        
        
            <ul class="navbar_sito">
                <li class="element_nav"><a class="link" href="{{ url('/') }}">Home</a></li>
                <li class="element_nav"><a class="link" href="{{ url('recipes') }}">Recipes</a></li>
                <li class="element_nav"><a class="link" href="{{ url('weather') }}">WeatherHub</a></li>
                <li class="element_nav"><a class="link" href="{{ url('login') }}">Login</a></li>
            </ul>  
    </nav>
        @yield("header")
        @yield("main")
        <footer>
            
        </footer>


</body>
</html>
