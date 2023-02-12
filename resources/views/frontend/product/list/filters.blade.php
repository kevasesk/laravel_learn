<div class="filter-block">
    <form action="{{ route('addFilter') }}">
        <button class="btnsub" type="submit" name="clear" value="true">{{__('Clear all filters')}}</button>
    </form>
    <div class="filter-block-shop filter-price">
        <div class="block-title">
            <h3>{{__('FILTER BY PRICE')}}</h3>
            <form action="{{ route('removeFilter') }}">
                <input type="hidden" name="price" value="true"/>
                <span class="filter-button">
                    <a href="#" onclick="$(this).closest('form').submit();">{{__('clear')}}</a>
                </span>
            </form>
        </div>
        <div class="block-content">
            <div class="price-range-holder">
                <form action="{{ route('addFilter') }}" method="GET">
                    <input type="text" class="price-slider" value="" name="price">
                    <span class="min-max">
                        {{__('Price:')}} {{ $currency }} {{$filters['price'][0] ?? 0}} - {{$filters['price'][1] ?? 999}}
                    </span>
                    <span class="filter-button">
                        <a href="#" onclick="$(this).closest('form').submit();">{{__('Apply')}}</a>
                    </span>
                </form>
            </div>
        </div>
        <script>
            window.addEventListener("load", function(){
                // Price Slider
                if ($('.price-slider').length > 0) {
                    $('.price-slider').slider({
                        min: 0,
                        max: 999,
                        step: 100,
                        value: [{{$filters['price'][0] ?? 0}}, {{$filters['price'][1] ?? 999/2}}],
                    });
                }
            });
        </script>
    </div>
    @if(count($categoryFilters))
        <div class="filter-block-shop filter-cate">
            <div class="block-title">
                <h3>{{__('Categories')}}</h3>
            </div>
            <div class="block-content">
                <ul>
                    @foreach($categoryFilters as $categoryData)
                        <li class="{{ $category->id == $categoryData['id'] ? 'active': '' }}">
                            <a href="{{$categoryData['url']}}">{{$categoryData['title']}}</a>
                            <span class="number">({{$categoryData['total']}})</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    @if(count($brandFilters))
        <div class="filter-block-shop">
            <div class="block-title">
                <h3>{{__('BRAND')}}</h3>
                <form action="{{ route('removeFilter') }}">
                    <input type="hidden" name="brand" value="true"/>
                    <span class="filter-button">
                        <a href="#" onclick="$(this).closest('form').submit();">{{__('clear')}}</a>
                    </span>
                </form>
            </div>
            <div class="block-content">
                <form action="{{ route('addFilter') }}" method="GET">
                    @foreach($brandFilters as $brand)
                        <div class="checkbox">
                            <input
                                type="radio"
                                value="{{$brand}}"
                                name="brand"
                                onclick="$(this).closest('form').submit();"
                                {{isset($filters['brand']) ? 'checked' : ''}}
                            >
                            {{$brand}}
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    @endif

    @if(count($colorFilters))
        <div class="filter-block-shop filter-color">
            <div class="block-title">
                <h3>{{__('Color')}}</h3>
                <form action="{{ route('removeFilter') }}">
                    <input type="hidden" name="color" value="true"/>
                    <span class="filter-button">
                        <a href="#" onclick="$(this).closest('form').submit();">{{__('clear')}}</a>
                    </span>
                </form>
            </div>
            <div class="block-content">
                <form action="{{ route('addFilter') }}" method="GET">
                    <ul>
                        @foreach($colorFilters as $color)
                            <li>
                                <input
                                    type="radio"
                                    value="{{$color['value']}}"
                                    name="color"
                                    onclick="$(this).closest('form').submit();"
                                    {{isset($filters['color']) && $color['value'] == $filters['color'] ? 'checked' : ''}}
                                >
                                 {{$color['title']}} {!! $color['color'] !!}
                            </li>
                        @endforeach
                    </ul>
                </form>
            </div>
        </div>
    @endif
</div>
