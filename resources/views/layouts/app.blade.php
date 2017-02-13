<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> PhpSeries </title>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <script>
        $(function(){
            $("#q").focus(); //Focus on search field
            $("#q").autocomplete({
                minLength: 0,
                delay:5,
                source: 'suggest.php',
                focus: function( event, ui ) {
                    $(this).val( ui.item.value );
                    return false;
                },
                select: function( event, ui ) {
                    $(this).val( ui.item.value );
                    return false;
                }
            }).data("uiAutocomplete")._renderItem = function( ul, item ) {
                return $("<li></li>")
                    .data( "item.autocomplete", item )
                    .append( "<a>" + (item.img?"<img class='imdbImage' src='imdbImage.php?url=" + item.img + "' />":"") + "<span class='imdbTitle'>" + item.label + "</span>" + (item.cast?"<br /><span class='imdbCast'>" + item.cast + "</span>":"") + "<div class='clear'></div></a>" )
                    .appendTo( ul );
            };

            $('#list').click(function(event){event.preventDefault();
                $('#products .item').addClass('list-group-item');
                $('#grid').removeClass('active');
            });
            $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});

        });
    </script>
    <style type="text/css">
        .ui-menu-item .imdbTitle{
            font-size: 0.9em;
            font-weight: bold;
        }
        .ui-menu-item .imdbCast{
            font-size: 0.7em;
            font-style: italic;
            line-height: 100%;
            color: #666;
        }
        .ui-menu-item .imdbImage{
            float: left;
            margin-right: 5px;
        }
        .ui-menu-item .clear{
            clear: both;
        }

        .item.list-group-item
        {
            float: none;
            width: 100%;
            height: 430px !important;
            background-color: #fff;

        }
        .item.list-group-item .list-group-image
        {
            margin-right: 10px;
        }
        .item.list-group-item .thumbnail
        {
            margin-bottom: 0px;
            padding: 0px;
            padding-bottom: 100px;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            border-radius: 0px;
            border: hidden;
        }
        .item.list-group-item .caption
        {
            padding: 9px 9px 0px 9px;
        }

        .item.list-group-item:before, .item.list-group-item:after
        {
            display: table;
            content: " ";
        }

        .item.list-group-item img
        {
            float: left;
            height: 400px;
        }
        .item.list-group-item:after
        {
            clear: both;
        }
        .list-group-item-text
        {
            margin: 0 0 11px;
        }

    </style>

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
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        PhpSeries
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;@if (!Auth::guest())
                            <li><a href="#">My movies</a></li>
                         @endif
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
                                        <a href="{{ url('/user/'.Auth::id()) }}">My Profile</a>
                                    </li>
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

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; PhpSeries 2017</p>
                </div>
            </div>
        </div>
    </footer>



    <!-- Scripts
    <script src="/js/app.js"></script> -->
</body>
</html>
