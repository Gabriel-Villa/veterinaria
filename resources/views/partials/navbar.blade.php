<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="navbar-brand" href="{{ route('index') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            @guest
                <a href="{{ route('register') }}" class="btn btn-primary m-2 ml-0"
                    style="margin-left: 0px !important;">Crear cuenta</a>
                <a href="{{ route('login') }}" class="btn btn-primary">Entrar <i class="fa fa-sign-in" aria-hidden="true"></i></a>
            @else
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('logout') }}">Salir</a>
                        <a class="dropdown-item" href="{{ route('mis_pedidos') }}">Mis pedidos</a>
                        @can('dashboard')
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dash</a>
                        @endcan
                    </div>
                </div>
            @endguest
        </form>
    </div>
</nav>
