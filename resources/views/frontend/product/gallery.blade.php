<div class="shop-single-item-img">
    <div class="main-img">
        @foreach($product->galleryImages as $image)
            <div class="main-img-item">
                <a href="#"><img src="{{ Resizer::get($image['thumbnail'], 600, 600) }}" alt="images" class="img-responsive"></a>
            </div>
        @endforeach
    </div>
    <ul class="multiple-img-list">
        @foreach($product->galleryImages as $image)
            <li>
                <div class="product-col">
                    <div class="img">
                        <a href="#"><img src="{{ Resizer::get($image['thumbnail'], 600, 600) }}" alt="images" class="img-responsive"></a>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
