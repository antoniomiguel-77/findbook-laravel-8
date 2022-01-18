<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>@yield('title')</title>
</head>
<body>
<header>
            <nav>
            <div class="logo"><img src="/img/logo-white.svg" alt=""><p>findBook</p></div>
                <ul class="menu">
                    @auth
                @if(auth()->user()->nivel == 1)
                <li>Bem-vindo: Administrador</li> 
                <li><a href="/books/dashboard" class="home">Perfil</a></li> 

                <li>

                    <form action="/logout" method="post">
                        @csrf
                    <a href="/logout" class="home" onclick="event.preventDefault();this.closest('form').submit();">Sair</a>
                    </form>
                </li>
                @else
                <li>Bem-vindo: {{auth()->user()->name}}</li>
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <a href="/logout" class="home" onclick="event.preventDefault();this.closest('form').submit();">Sair</a>
                    </form>
                </li>

                @endif
                   @endauth

                 @guest
                       
                        <li><a href="/login" class="home">Entrar</a></li>
                        <li><a href="/register" class="btn-cad">Cadastra-se</a></li> 
                    
                    @endguest
                </ul>
            </nav>
            <form action="/" method="get" class="fild_search">
                <input type="search" name="search" placeholder="Procurar...">
            </form>
        </header>

    @yield('content')


    <footer>
        <h4>Redes sociais</h4>
        <div class="social">
            <a target="_blank" href="https://m.facebook.com/albino.santos.5648"><img src="/img/fb.svg" alt="facebook-logo"></a>
            <a target="_blank" href="https://github.com/antoniomiguel-77"><img src="/img/github.svg" alt="github-logo"></a>
            
        </div>
        <p>&copy Todos os direito reservados</p>
    </footer>
    
</body>
</html>