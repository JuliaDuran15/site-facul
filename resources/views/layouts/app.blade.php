<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>.msg{
        background-color: #d4edda;
        color: #155724;
        border: solid 1px #c3e6cb;
        text-align: center;
        padding: 10px;
        margin-bottom: 0;
        width: 100%;
    }
    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <img src="/img/temapng.png" class="rounded" style="height:65px;width:65px; border-radius:50%; margin-right:15px; "> 
                <a class="navbar-brand" href="{{ url('/') }}">
                    TECH
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!--Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                        @else
                            @if(Auth::user()->acesso  == 'secretaria')
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('alunos.index') }}">
                                            {{ __('Alunos') }}
                                        </a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('professors.index') }}">
                                            {{ __('Professores') }}
                                        </a>
                                        
                            </li>
                            @endif
                                @if(Auth::user()->acesso  == 'aluno')
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('alunos.show',Auth::user()->id) }}">
                                            {{ __('Meu perfil') }}
                                        </a>
                                </li>
                                @endif
                                @if(Auth::user()->acesso  == 'professor')
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('professors.show',Auth::user()->id) }}">
                                            {{ __('Meu perfil') }}
                                        </a>
                                </li>
                                @endif
                                        <li class="nav-item">
                                    <a class="nav-link" href="{{ route('cursos.index') }}">
                                            {{ __('Cursos') }}
                                        </a>
                                    </li>

                                        
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->acesso  == 'aluno')
                                    <li><a class="dropdown-item" href="{{ route('cursos.me') }}">
                                        {{ __('Meus cursos') }}
                                    </a></li>
                                @endif
                                @if(Auth::user()->acesso  == 'professor')
                                    <li><a class="dropdown-item" href="{{ route('professors.me') }}">
                                        {{ __('Meus cursos') }}
                                    </a></li>
                                @endif
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container-fluid">
                <div class="row">
                    @if(session('msg'))
                    <p class="msg">{{session('msg')}}</p>
                    @endif
                    
                </div>
            </div>
            @yield('content')
        </main>
    </div>
</body>
</html>
