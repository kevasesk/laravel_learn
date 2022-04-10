<div class="cart">
    <a href="{{route('cart')}}" title="" id="label2" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <div class="photo photo-cart">
            <img src="/img/cart.png" alt="images" class="img-reponsive">
            <span class="lbl">05</span>
        </div>
        <p class="inform inform-cart">
            <span class="strong">CART<br></span>
            <span class="price-cart">$1150.69</span>
        </p>
    </a>
    <div class="dropdown-menu dropdown-cart" aria-labelledby="label2">
        <ul>
            <li>
                <div class="item-order">
                    <div class="item-photo">
                        <a href="#"><img src="/img/cart1.png" alt="images" class="img-responsive"></a>
                    </div>
                    <div class="item-content">
                        <h3><a href="#" title="">iPad Pro MLMX2CL/A</a></h3>
                        <p class="price black">$199.69</p>
                        <p class="quantity">x1</p>
                    </div>
                </div>
                <div class="btn-delete"><a href="#" title="" class="btndel">x</a></div>
            </li>
            <li>
                <div class="item-order">
                    <div class="item-photo">
                        <a href="#"><img src="/img/cart1.png" alt="images" class="img-responsive"></a>
                    </div>
                    <div class="item-content">
                        <h3><a href="#" title="">iPad Pro MLMX2CL/A</a></h3>
                        <p class="price black">$199.69</p>
                        <p class="quantity">x1</p>
                    </div>
                </div>
                <div class="btn-delete"><a href="#" title="" class="btndel">x</a></div>
            </li>
        </ul>
        <div class="content-1">
            <span class="total">Total: <strong class="price black">$399.00</strong></span>
            <span class="quantity"><strong class="number">02</strong> products</span>
        </div>
        <div class="content-2">
            <a href="{{route('cart')}}" class="addcart">View Cart</a>
        </div>
    </div>
</div>
