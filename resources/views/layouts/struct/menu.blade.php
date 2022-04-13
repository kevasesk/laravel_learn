<div class="menu">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-6 column-left">
                <aside id="column-left">
                    <nav class="navbar-default">
                        <div class="menu-heading js-nav-menu ">All Categories</div>
                        <div class="vertical-wrapper v3 js-dropdown-menu">
                            <ul class="level0">
                                @foreach($categoriesMenu as $category)
                                    <li>
                                        <a href="{{ url($category['url']) }}">{{$category['title']}}</a>
                                        @isset($category['icon'])
                                            <span class="icon {{ $category['icon'] }}"></span>
                                        @endisset
                                        @isset($category['children'])
                                            <div class="dropdown-content">
                                                <ul class="level1">
                                                    @foreach($category['children'] as $subChild)
                                                        <li class="sub-menu col-3">
                                                            <a href="#">ACCESSORIES</a>
                                                            <ul class="level2">
                                                                <li class="col-inner"><a href="#">Maybellin Face Power</a></li>
                                                                <li class="col-inner"><a href="#">Chanel Mascara</a></li>
                                                                <li class="col-inner"><a href="#">Mascara For Full Lashes Mascara</a></li>
                                                                <li class="col-inner"><a href="#">Offical Cosme-Decom Maybellin Face</a></li>
                                                                <li class="col-inner"><a href="#">Offical Cosme-Decom</a></li>
                                                                <li class="col-inner"><a href="#">Lady Dior Mascara</a></li>
                                                                <li class="col-inner"><a href="#">Mirinda</a></li>
                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endisset
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                </aside>
            </div>
            <div class="col-md-9 col-sm-8 col-xs-6 column-right">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="menu-title">MENU</span>
                </button>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="menubar js-menubar">
                        @foreach($menu as $child)
                            @if(!isset($child['role']))
                                <li class=" menu-homepage menu-item-has-child dropdown">
                                    <a href="{{ url($child['url']) }}" title="{{ $child['title'] }}">{{ $child['title'] }}</a>
{{--                                    <span class="plus js-plus-icon"></span>--}}
{{--                                    <ul class="dropdown-menu menu-level">--}}
{{--                                        <li><a href="index.html" title="home 1">Home 1</a></li>--}}
{{--                                        <li><a href="home-2.html" title="home 2">Home 2</a></li>--}}
{{--                                        <li><a href="home-3.html" title="home 3">Home 3</a></li>--}}
{{--                                    </ul>--}}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
