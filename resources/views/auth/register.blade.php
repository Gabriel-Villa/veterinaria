@extends('layouts.layout')

@section('title', 'Login')

@section('content')
    <section class="page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="main-block">
                        <div class="col-lg-12 text-center title-line mb-50">
                            <h2 class="slick-title">Registro</h2>
                            <p>Completa tus datos para poder registrarte.</p>
                        </div>
                        <x-alerta  />
                        <div class="login-form">
                            <form method="post" action="{{ route('post-register') }}" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" placeholder="Nombres">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="apellido_paterno" placeholder="Apellido Paterno">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="documento" placeholder="Documento" minlength="0" maxlength="12">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="celular" placeholder="Celular" minlength="0" maxlength="9">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" maxlength="30" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" minlength="4" maxlength="8" placeholder="Contraseña">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="direccion">Direccion</label>
                                            <textarea class="form-control" id="direccion" name="direccion" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-center">
                                        <a href="{{ route('login') }}" class="float-right">Tienes cuenta? Ingresa</a>
                                    </div>
                                </div>
                                <button type="submit" class="btn theme-button animated slideInRight">Registrarme</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
