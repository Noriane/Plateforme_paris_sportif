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
        <div id="app" class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Overview <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Reports</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Analytics</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Export</a>
                            </li>
                        </ul>
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Nav item</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Nav item again</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">One more nav</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Another nav item</a>
                            </li>
                        </ul>
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Nav item again</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">One more nav</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Another nav item</a>
                            </li>
                        </ul>
                    </nav>
                    <main role="main-list" class="col-md-4 pt-3">
                        @yield('content')
                    </main>
                    <div class="infos-list">
                        @yield('profile')
                    </div>
                </div>
            </div>
            {{--@include('includes/header')
            --}}
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>