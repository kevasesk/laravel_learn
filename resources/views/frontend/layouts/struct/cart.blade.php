<div class="cart">
    <a href="{{route('cart')}}" title="" id="label2" class="dropdown-toggle1" data-toggle="dropdown1" role="button" aria-haspopup="true" aria-expanded="false">
        <div class="photo photo-cart">
            <img src="{{asset('img/cart.png')}}" alt="images" class="img-reponsive">
            @if($globalCart->getTotalQty())
                <span class="lbl">{{$globalCart->getTotalQty()}}</span>
            @endif
        </div>
        <p class="inform inform-cart">
            <span class="strong">CART<br></span>
            @if($globalCart->getTotalQty())
                <span class="price-cart">{{ $currency }} {{$globalCart->getSubtotal()}}</span>
            @else
                <span class="price-cart">(empty)</span>
            @endif
        </p>
    </a>
</div>
