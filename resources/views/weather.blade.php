@extends('layout')


@section("title","WeatherHub")

@section('css')
<link rel="stylesheet" href="{{ url('/css/base_layout.css') }}" >
<link rel="stylesheet" href="{{ url('/css/weather.css') }}" >
@endsection

@section("js")
<script src = "{{ url('/js/weather_hub_AQ.js') }}" defer></script>{{-- --}}
<script src = "{{ url('/js/weather_hub.js') }}" defer></script>
<script>
        const videoUrl = "{{ asset('video/mushrooms_wizard.mp4') }}";
    </script>
@endsection


@if(isset($json))
<script>
    let json_da_php = @json($json); ///da testare, passo la variabile dal controller alla view a javascript
</script>
@endif

@if(isset($air_quality_API))
<script>
    let url_AV = "{!! $air_quality_API !!}"; // !!per passarlo come url
</script>
@endif


@section("header")
<header>
    <div id="div_header">
        <h1 class="left_side">WeatherHub</h1>
        <p class="left_side" id="paragraph">
            <br>The growth of Mushrooms from the mycelium requires a lot of variables to be just right, but by far the 
            most important one is the humidity of the soil. <br><br>
            This online tool will let you know the chanche of finding mushrooms in the woods today. <br><br>
            
        </p>
    </div>
    <img class="right_side" id="photo_header" src="{{ url('img/US_Map.png') }}">
</header>
@endsection

@section("main")
<div id="seconda_sezione">
    <p class="left_side" id="par_form" >Insert one of the US capital in the box to see if, in <br>the last week,
     the weather has been favorable for <br>mushrooms growth. 
    </p>
    <form class="right_side" id="form" method='post' name ="form_weather">
    @csrf
    <div id="div_form">
    <label >CAPITAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="input" name='capital' id='capital' ></label>
    <label > <input id="submit" type='submit' value='Submit'></label>
    </div>
    </form>
</div>
<div id="div_list">
    <p id="par_list">List of states capital for which data is currently available</p>
<ul id="list">
    @foreach ($list_capital as $capital)
            <li>{{ $capital }}</li>
    @endforeach
</ul>
</div>

<div class ="hidden" id="container_results"> {{-- metti hidden a lui e ai singoli div --}}
    <p id="result">Results</p>
    <p id="par_weather">Weather data of the last few days in <strong>{{ Session::get('capital') }}</strong>, capital of <strong>{{ Session::get('state_capital') }}</strong>.</p>
    <div id="container_days">
        @for($i = 6; $i > 0; $i--)
        <div  class="border hidden" id="div_sun{{ $i }}">
          <p class="text">{{ $i }} giorni fa </p>
         <img class="icon" src="{{ url('/img/sun.png')}}">
        </div>
        @endfor
        @for($i = 6; $i > 0; $i--)
        <div class="border hidden" id="div_rain{{ $i }}">
            <p class="text">{{ $i }} giorni fa </p>
            <img class="icon" src="{{ url('/img/cloud.png')}}">
        </div>
        @endfor
    </div>
    <div class="hidden" id="yes_div">
        <div id="yes" >
            <p class="final_result">The condition are right. Search for a hardwood forest nearby, put your trusted hiking 
                boots on and embark on this magic journey.<br></p>
            <p>Go out and pick'em all!</p>
            <div id="da_riempire"></div>
        </div>
    </div>
    <div id="no_div" class="hidden">
    <p id="no" class="final_result">That's too bad! It didn't rain enough in the last few days. You will probably not find any mushrooms outside.<br>
            Come again tommorow to check the weather!<br></p>
    <p class="final_result">In the meantime you can go for a walk and do birdwatching!</p>
    </div>
    
</div>


@endsection