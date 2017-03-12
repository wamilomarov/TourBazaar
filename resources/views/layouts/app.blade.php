<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <script>
        $(document).ready(function() {
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".countries"); //Fields wrapper
            var add_button      = $(".add_countries_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div><input type="text" class="cnt" name="countries[]" list="countries"/><a href="#" class="remove_country">Remove</a></div>'); //add input box
                }
            });

            $(wrapper).on("click",".remove_country", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });
    </script>

    <script>
        $(document).ready(function() {
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".cities"); //Fields wrapper
            var add_button      = $(".add_cities_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div><input class="ct" type="text" name="cities[]" list="cities"/><a href="#" class="remove_city">Remove</a></div>'); //add input box
                }
            });

            $(wrapper).on("click",".remove_city", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });

    </script>

    <script>
        $('.ct').focus(function () {
            var url = 'localhost:8000/getCities?countries=' + $('.cnt').val();
            alert(url);
        });

//        $('.ct').focus(function () {
//            $.ajax({
//                type: 'GET',
//                url: url,
//
//                // work with the response
//                success: function (response, status, xhr) {
//                    $("#search_list").empty();
//                    var json = $.parseJSON($.parseHTML(response)[0].textContent);
//                    if (json.length != 0) {
//                        if (type == 'track') {
//                            for (var i = 0; i <= 10; i++) {
//
//                                $("#search_list").append("<li>" +
//                                    "<div class='row'>" +
//                                    "<div class='col-md-9'>" +
//                                    "<a target='_blank'" +
//                                    "href='http://www.deezer.com/track/'" + json[i]['id'] + ">" + json[i]['artist'] + "<br> " + json[i]['title'] + "</a>" +
//                                    "</div>" +
//                                    "<div class='col-md-3'>" +
//                                    "<a href='http://jabda.net/manage/php/actions/addSongToDefaultPlaylist.php?music_id=" + json[i]['id'] + "'><input type='submit' value='Add' class='btn btn-success pull-right'></a>" +
//                                    "</div>" +
//                                    "</div>" +
//                                    "<hr>" +
//                                    "</li> ");
//
//                            }
//                        }
//
//                        else if (type == 'playlist') {
//
//                            for (var i = 0; i <= 10; i++) {
//
//                                $("#search_list").append("<li>" +
//                                    "<div class='row'>" +
//                                    "<div class='col-md-8'>" +
//                                    "<a target='_blank'" +
//                                    "href='http://www.deezer.com/playlist/" + json[i]['id'] + "'>" + json[i]['title'] + "</a>" +
//                                    "</div>" +
//                                    "<div class='col-md-2'>" +
//                                    "<input type='submit' value='Open' class='btn btn-warning pull-right' onclick=openPlaylist(" + json[i]['id'] + ")></a>" +
//                                    "</div>" +
//                                    "<div class='col-md-2'>" +
//                                    "<a href='http://jabda.net/manage/php/actions/addPlaylistToDefaultPlaylist.php?playlist_id=" + json[i]['id'] + "'><input type='submit' value='Add' class='btn btn-success pull-right'></a>" +
//                                    "</div>" +
//                                    "</div>" +
//                                    "<hr>" +
//                                    "</li> ");
//
//                            }
//
//                        }
//                    }
//                }
//
//            });
//        });
    </script>
</head>
<body>
    <div id="app">
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
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
