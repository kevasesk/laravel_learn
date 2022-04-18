<div class="filter-block">
    <div class="filter-block-shop filter-price">
        <div class="block-title">
            <h3>FILTER BY PRICE</h3>
        </div>
        <div class="block-content">
            <div class="price-range-holder">
                <input type="text" class="price-slider" value="">
                <span class="min-max">
                    Price: {{$products[0]->getPriceFilter()['min']}} - {{$products[0]->getPriceFilter()['max']}}
                </span>
                <span class="filter-button">
                    <a href="#">Filter</a>
                </span>
            </div>
        </div>
        <script>
            window.addEventListener("load", function(){
                // Price Slider
                if ($('.price-slider').length > 0) {
                    $('.price-slider').slider({
                        min: {{$products[0]->getPriceFilter()['min']}},
                        max: {{$products[0]->getPriceFilter()['max']}},
                        step: 100,
                        value: [0, {{(int)($products[0]->getPriceFilter()['max']/2)}}],
                    });
                }
            });
        </script>
    </div>
    @if(count($products[0]->getCategoriesFilter()))
        <div class="filter-block-shop filter-cate">
            <div class="block-title">
                <h3>Categories</h3>
            </div>
            <div class="block-content">
                <ul>
                    @foreach($products[0]->getCategoriesFilter() as $categoryData)
                        <li class="{{ $category->id == $categoryData['id'] ? 'active': '' }}">
                            <a href="{{$categoryData['url']}}">{{$categoryData['title']}}</a>
                            <span class="number">({{$categoryData['total']}})</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    @if(count($products[0]->getBrandOptions()))
        <div class="filter-block-shop">
            <div class="block-title">
                <h3>BRAND</h3>
            </div>
            <div class="block-content">
                <form>
                    @foreach($products[0]->getBrandOptions() as $product)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="{{$product['brand']}}">
                                {{$product['brand']}}
                            </label>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    @endif

    <div class="filter-block-shop filter-color">
        <div class="block-title">
            <h3>Color</h3>
        </div>
        <div class="block-content">
            <ul>
                @foreach($products[0]->getColorOptions() as $color)
                    <li><a href="#">{!! $color['color'] !!} {{$color['title']}} </a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
