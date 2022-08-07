<!--item-->
@forelse ($productos as $producto)
    <div class="col-lg-2 col-md-2 col-sm-4 col-4">
        <div class="productblock product-list-wrap product-list">
            <div class="Content">
                <a href="javascript:void(0)">
                    <img class="img-fluid" src="images/shop/01.jpg" alt="">
                </a>
                <div class="product-title"><a href="product-detail-fullwidth.html">{{ $producto['nombre'] }}</a></div>
                <div class="product-price"> <ins>{{ $producto['precio'] }}</ins> </div>
                <a class="btn btn-success" href="{{ route('producto.show', $producto['nombre']) }}">Detalle</a>
            </div>
        </div>
    </div>
@empty
    <p>Aun no hay productos disponibles !</p>
@endforelse
{{ $productos->links() }}
