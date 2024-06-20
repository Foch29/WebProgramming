<html>
    <head>
        <link rel='stylesheet' href="{{ url('css/login.css') }}">
        <link rel='stylesheet' href="{{ url('css/common.css') }}">
        
    </head>
    <body>
        
        <main>
            <div id="div_form">
                <form id="form" method='post'>
                    @csrf
                    <label id="top_label">Email <input class="input" name='email' id='email' value='{{ old("email") }}'></label>
                    <label>Password <input class="input" type='password' name='password' id='password'></label>
                    <div id="div_nel_form">
                        <label id="bottom_label"> <input id="submit" type='submit' value='Submit'></label>
                        <div class='error_div'>
                            @if($error == 'empty_fields')
                            <p class="error">Enter the required field</p>
                            @elseif($error == 'wrong')
                            <p class="error">Wrong credentials</p>
                            @endif 
                        </div>
                    </div>
                </form>
                <p id="link_reg">Haven't registered yet? Click <a id="Here" href="{{ url('register') }}">Here</a> </p>
            </div>
            <div id="bottom">
                <div class="item_bottom">Help</div>
                <div class="item_bottom">Privacy</div>
                <div class="item_bottom">Terms</div>
            </div>      
        </main>

        
    </body>
</html>
