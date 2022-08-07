@extends('layouts.layout')

@section('title', 'Login')

@section('content')
    <section class="page-section-ptb">
        <div class="container">
            <div class="row ">
                <div class="col-lg-5 sm-mb-15 mx-auto">
                    <div class="main-block">
                        <div class="col-lg-12 text-center title-line mb-50">
                            <h2 class="slick-title">LOGIN</h2>
                            <p>Ingresa a tu cuenta</p>
                        </div>
                        <x-alerta  />
                        <div class="login-form">
                            <form method="post" action="{{ route('post-login') }}" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" maxlength="30" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" minlength="4" maxlength="8" placeholder="Contraseña">
                                </div>
                                <button type="submit" class="btn theme-button animated slideInRight">INGRESAR</button>
                            </form>
                            <div class="row">
                                <div class="col text-center">
                                    <a href="#" class="float-right">Olvide mi clave</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
