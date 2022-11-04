<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/ROC-MINILOGO.png') }}"/>
</head>
<body>

<!--BEGINNING NAV-->
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <a class="navbar-brand" href="{{ url('/home') }}">
        <img src="https://www.rocvanflevoland.nl/assets/img/og-logo-rocvf.png" alt="roc logo" width="130px" height="auto">
    </a>

    <!-- Left Side Of Navbar -->
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            @if (Auth::user()->hasRole('student'))
                <li class="nav-item">
                    <a class="nav-link" href="/hour">Uren overzicht</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/studentcoretaskoverview">Kwalificatiedossier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/companiesoverview">Bedrijven overzicht</a>
                </li><li class="nav-item">

            @endif
            @if (Auth::user()->hasRole('teacher'))
                <li class="nav-item">
                    <a class="nav-link" href="/studentenoverzicht">Studentoverzicht</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/docentregister">Studentregistratie</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="/companiesoverview">Bedrijvenoverzicht</a>
                </li><li class="nav-item">
                        <a class="nav-link" href="/companyregister">Bedrijfregistratie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/coach">Stagecoördinator</a>
                    </li>
            @endif
            @if (Auth::user()->hasRole('company'))
                <li class="nav-item">
                    <a class="nav-link" href="/studentenoverzicht">Studenten overzicht</a>
                </li>
            @endif
            @if (Auth::user()->hasRole('admin'))
                <li class="nav-item">
                    <a class="nav-link" href="/studentenoverzicht">Studenten overzicht</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/companiesoverview">Bedrijven overzicht</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Registratie</a>
                    </li>
            @endif
                @if (Auth::user()->hasRole('teacher|admin'))
                    <div class="dropdown">
                        <button class="dropbtn">Kerntaken</button>
                        <div class="dropdown-content">
                            <a href="/coretask">Aanmaken</a>
                            <a href="/usercoretask">Koppelen aan student</a>
                            <a href="/coretaskoverview">Kerntaak overview</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn">Werkprocessen</button>
                        <div class="dropdown-content">
                            <a href="/workproces">Aanmaken</a>
                            <a href="/coreworkprocess">Werkproces toevoegen aan kerntaak</a>
                            <a href="/userworkproces">Koppelen aan student</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn">Competenies</button>
                        <div class="dropdown-content">
                            <a href="/competence">Aanmaken</a>
                            <a href="/workcompetence">Competentie toevoegen aan werkproces</a>
                            <a href="/usercompetence">Koppelen aan student</a>
                        </div>
                    </div>
                @endif
        </ul>
    </div>

    <!-- Right Side Of Navbar -->
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            @if (Auth::user()->hasRole('student'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </li>
            @endif
            @if (Auth::user()->hasRole('teacher'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                       {{ __('Logout') }}
                    </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </li>
            @endif
            @if (Auth::user()->hasRole('company'))
                    <li class="nav-item">
                        <a class="nav-link" href="/companyprofile">Profiel</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                       {{ __('Logout') }}
                    </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
            @endif
            @if (Auth::user()->hasRole('admin'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                       {{ __('Logout') }}
                    </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </li>
            @endif
        </ul>
    </div>
</nav>

    <main>
        @yield('content')
    </main>

</body>
<footer class="font-small teal pt-4">

    <div class="row bg-color-footer">

        <div class="padding col-md mx-auto">
            <h5 class="title-anthracite padding mt-3 mb-4">Informatie centrum </h5>

            <p class="plat-dark padding">Heeft u vragen? Aarzel niet en neem dan gelijk contact met ons op. Dit kan door te bellen, mailen of whatsappen.</p>
        </div>

        <div class="col-md mx-auto">
            <h5 class="title-anthracite mt-3 mb-4 padding">Contact</h5>

            <p class="plat center padding">
                Almere en Lelystad: 0900 - 0918
                <br>
                Email: informatiecentrum@rocvf.nl
                <br>
                WhatsApp: 06 250 385 66
            </p>
        </div>

        <div class="col-md mx-auto">
            <h5 class="title-anthracite center mt-3 mb-4 padding">Calamiteiten </h5>
            <p class="plat center padding">
                Bij een calamiteit kun je tijdens schooluren bellen met de betreffende locatie. Buiten schooluren bel je (026)-372 44 00
            </p>
        </div>
    </div>
</footer>
</html>
