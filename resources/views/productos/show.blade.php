@extends('layouts.layout')

@section('title', $producto->nombre)

@section('content')


    <div class="wrapper">

        <input type="hidden" name="precio_producto" id="precio_producto" value="{{ $producto->precio }}">
        <!--=====Product Detail Section =====-->
        <section class="page-section-ptb">
            <div class="container">
                <x-alerta />
                <div class="row">
                    

                    <div class="col-12 col-sm-6 col-lg-4 col-lg-4">
                        <div class="w-100"></div>
                        
                        <div class="carousel-container position-relative row">
            
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active" data-slide-number="0">
                                        <img src="/images/productos/{{ $producto->imagen }}" class="d-block w-100" alt="..."
                                            data-type="image" data-toggle="lightbox"
                                            data-gallery="example-gallery" style="height: 390px !important;width: 390px !important;">
                                    </div>
                                    @forelse ($producto_detalle as $index => $detalle)
                                        <div class="carousel-item" data-slide-number="{{ $index+1 }}">
                                            <img src="/images/productos/{{ $detalle->imagen }}" class="d-block w-100" alt="..."
                                                data-type="image" data-toggle="lightbox"
                                                data-gallery="example-gallery" style="height: 390px !important;width: 390px !important;">
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        
                            <!-- Carousel Navigation -->
                            <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row mx-0">
                                            <div id="carousel-selector-0" class="thumb col-4 col-sm-2 px-1 py-2 selected btn"
                                                data-target="#myCarousel" data-slide-to="0">
                                                <img src="/images/productos/{{ $producto->imagen }}" class="img-fluid" alt="...">
                                            </div>
                                            @forelse ($producto_detalle as $index => $detalle)
                                                <div id="carousel-selector-{{ $index+1 }}" class="thumb col-4 col-sm-2 px-1 py-2 btn" data-target="#myCarousel" data-slide-to="{{ $index+1 }}">
                                                    <img src="/images/productos/{{ $detalle->imagen }}" class="img-fluid" alt="...">
                                                </div>
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- <!--Top Slider start-->
                        <div class="swiper-container gallery-top ">
                            <div class="swiper-wrapper ">
                                <div class="">
                                    <img class="img-fluid" src="/images/productos/{{ $producto->imagen }}" alt="img" style="height: 259px !important; width: 350px !important; min-width: 348px !important;">
                                </div>
                            </div>
                            <!--Controls-->
                            <div class="swiper-button-next swiper-button-white control-btn"></div>
                            <div class="swiper-button-prev swiper-button-white control-btn"></div>
                        </div>
                        <!--Top Slider end--> --}}

                    </div>

                    <!--Product detail-->
                    <div class="col-12 col-sm-6 col-lg-5 col-lg-5">
                        <div class="product-list-view xs-mb-20">
                            <h4>
                                <a href="javascript:void(0)">
                                    Proveedor - {{ $producto->proveedor->name ?? '' }} {{  $producto->proveedor->apellido_paterno ?? '' }}
                                </a>
                            </h4>
                            <h5><a href="javascript:void(0)">Producto - {{ $producto->nombre }}</a></h5>
                            <div class="product-price"> <ins>S/. {{ number_format($producto->precio, 2) }}</ins></div>
                            <ul class="tag-list mt-2">
                                <li><a href="#">{{ $producto->categoria->nombre_categoria ?? '' }}</a></li>
                            </ul>
                            <p class="d-md-none d-lg-block text-justify">
                                {{ $producto['descripcion'] }}
                            </p>
                            <div class="w-100"></div>
                            @guest
                              <p class="text-danger">Inicie session para poder comprar el producto!</p>
                            @else
                                <div class="w-100"></div>
                                <form style="width: 100% !important;" class="mx-auto" action="{{ route('orden.store') }}" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        
                                        <input type="hidden" name="id_producto" id="id_producto" value="{{ $producto->id_producto }}">
                                        <input type="hidden" name="comision" id="comision" value="">

                                        <div class="col-12 col-md-12 col-lg-12 mt-3">
                                            <label for="mensaje">Mensaje al proveedor</label>
                                            <textarea class="form-control" id="mensaje" name="mensaje" rows="3" maxlength="80"></textarea>
                                        </div>
                                        <div class="col-5 col-md-5 col-lg-5 mt-3">
                                            <label for="fecha">Horario entrega</label>
                                            <input type="date" min="{{ date("Y-m-d") }}" value="{{ date("Y-m-d") }}" max="{{ date('Y-m-d', strtotime("+3 day")) }}" name="fecha_entrega" class="form-control">
                                        </div>
                                        <div class="col-2 col-md-2 col-lg-2 mt-3">
                                            <label for="hora_entrega">Hora</label>
                                            <select name="hora_entrega" id="hora_entrega" class="form-control p-0">
                                                @for ($i = 8; $i <= 24; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-3 col-md-3 col-lg-3 mt-3">
                                            <label for="minuto_entrega" id="minuto_entrega">Minuto</label>
                                            <select class="form-control" name="minuto_entrega">
                                                <option value="15">15</option>
                                                <option value="30" selected>30</option>
                                                <option value="45">45</option>
                                            </select>
                                        </div>
                                        <div class="col-2 col-md-2 col-lg-2 mt-3">
                                            <label for="cantidad">Cantidad</label>
                                            <select class="form-control p-0" id="cantidad" name="cantidad">
                                                <option value="1" selected>1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="col-4 col-md-4 col-lg-4 mt-3">
                                            <label for="cantidad">Metodo pago</label>
                                            <select class="form-control p-0" id="id_metodo_pago" name="id_metodo_pago">
                                                @forelse ($metodos_pago as $metodo)
                                                    <option value="{{ $metodo->id_maestro_detalle }}">{{ $metodo->valor }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>

                                        <div class="col-3 col-md-3 col-lg-3 mt-3">
                                            <button type="submit" class="tn theme-button animated slideInRight mt-3" id="btn-comprar">COMPRAR</button>
                                        </div>
                                    </div>
                                </form>
                            @endguest
                        </div>
                    </div>
                    <!--product detail end-->

                    <!--checkout-->
                    <div class="col-12 col-sm-12 col-lg-3 col-lg-3">
                        <div class="main-block">
                          <div class="filter-title" style="border: none !important">
                            <h5>Costo</h5>
                          </div>
                          <table class="table table-borderless mb-0">
                            <tbody>
                              <tr class="border-top border-theme">
                                <td class="pb-0"><h5 class="mb-0">Delivery</h5></td>
                                <td class="float-right pb-0">S/. 3.00</td>
                              </tr>
                              <tr class="border-top border-theme">
                                <td class="pb-0"><h5 class="mb-0">Total</h5></td>
                                <td class="float-right pb-0">S/. <span id="total"></span></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                    </div>
                     <!--checkout-->

                </div>
            </div>
        </section>
        <!--=====End Product detail Section =====-->   
        
    <script>
        
        let precio = $('#precio_producto').val();

        $( document ).ready(function(){
            $('#btn-comprar').prop("disabled", true)
            calcular_total();
        });


        $('#cantidad').on('change', calcular_total);

        function calcular_total()
        {
            let cantidad = $('#cantidad').val();
            let delivery = 3;
            let subtotal = cantidad*precio;
            let comision = Math.round((subtotal*5)/100);
            let total = subtotal + delivery;

            $('#comision').val(comision);
            $('#total').html(total);

            $('#btn-comprar').prop("disabled", false);
        }

    </script>

@endsection
