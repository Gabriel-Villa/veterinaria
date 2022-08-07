<div class="container-fluid row col-12 bg-secondary p-2 m-0">
    <ul class="navbar-nav mx-auto">
        <li class="nav-item active">
            @can('categoria.index')
                <a class="btn btn-primary" href="{{ route('categoria.index') }}">
                    CATEGORIAS <i class="fa fa-th-large ml-2" aria-hidden="true"></i>
                </a>
            @endcan
            <a class="btn btn-primary" href="{{ route('producto.index') }}">
                PRODUCTOS <i class="fa fa-archive ml-2" aria-hidden="true"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('orden.index') }}">
                BANDEJA <i class="fa fa-envelope-o ml-2" aria-hidden="true"></i>
            </a>
            <a class="btn btn-primary" href="#">
                RECLAMOS <i class="fa fa-exclamation ml-2" aria-hidden="true"></i>
            </a>
        </li>
    </ul>
</div>
