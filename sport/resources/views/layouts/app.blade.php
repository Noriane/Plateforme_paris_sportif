<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Styles -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app" class="main-content {{Request::is('match')? 'match' : ''}}">
            <div class="container-fluid">
                @if (in_array(Request::route()->getName(), ["match","match_stats"]))
                <div class="row large">
                @else
                <div class="row">
                @endif
                    <nav class="col-sm-2 col-md-1 d-none d-sm-block bg-dark sidebar">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="/admin">Admin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/players">Players <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/teams">Teams</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/match">Match</a>
                            </li>
                        </ul>
                    </nav>
                    <main role="main-list" class="col-md-4 pt-3">
                        @yield('content')
                    </main>
                    @if (in_array(Request::route()->getName(), ["players","teams","team_stats"]))
                    <div class="infos-list">
                        @yield('profile')
                    </div>
                    @endif
                </div>
            </div>
            {{--@include('includes/header')
            --}}
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>