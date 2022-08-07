<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title')</title>

<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.ico" />

<!-- Fuente -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

<!-- Plugins -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/plugins-css.css') }}" />

<!-- Tipografia -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/typography.css') }}" />

<!-- Css -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />

<!-- Responsive -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}" />

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


<script src="{{ asset('js/funciones_base.js') }}"></script>

@section('head')
    @show
