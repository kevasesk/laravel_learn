<div class="menu">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-6 column-left">
                <aside id="column-left">
                    <nav class="navbar-default">
                        <div class="menu-heading js-nav-menu ">{{ $menu[0]['title'] }}</div>
                        <div class="vertical-wrapper v3 js-dropdown-menu">
                            <ul class="level0">
                                @foreach($menu[0]['children'] as $category)
                                    <li><a href="{{ $category['url'] }}">{{$category['title']}}</a><span class="icon icon-camera"></span></li>
                                @endforeach
                                <li><a href="#">camera</a><span class="icon icon-camera"></span></li>
                                <li><a href="#">laptop</a><span class="icon"></span></li>
                                <li><a href="#">mobile phone</a><span class="icon"></span></li>
                                <li class="game">
                                    <a href="#">game control</a>
                                    <div class="dropdown-content">
                                        <ul class="level1">
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
                                            <li class="sub-menu col-3">
                                                <a href="#">Electronic</a>
                                                <ul class="level2">
                                                    <li class="col-inner"><a href="#">Maybellin Face Power</a></li>
                                                    <li class="col-inner"><a href="#">Chanel Mascara</a></li>
                                                    <li class="col-inner"><a href="#">Mascara For Full Lashes Mascara</a></li>
                                                    <li class="col-inner"><a href="#">Offical Cosme-Decom Maybellin Face</a></li>
                                                    <li class="col-inner"><a href="#">Offical Cosme-Decom</a></li>
                                                    <li class="col-inner"><a href="#">Lady Dior Mascara</a></li>
                                                    <li class="col-inner"><a href="#">Casopia</a></li>
                                                </ul>
                                            </li>
                                            <li class="sub-menu col-3">
                                                <a href="#">COMPUTER & OTHERS</a>
                                                <ul class="level2">
                                                    <li class="col-inner"><a href="#">Maybellin Face Power</a></li>
                                                    <li class="col-inner"><a href="#">Chanel Mascara</a></li>
                                                    <li class="col-inner"><a href="#">Mascara For Full Lashes Mascara</a></li>
                                                    <li class="col-inner"><a href="#">Offical Cosme-Decom Maybellin Face</a></li>
                                                    <li class="col-inner"><a href="#">Offical Cosme-Decom</a></li>
                                                    <li class="col-inner"><a href="#">Lady Dior Mascara</a></li>
                                                    <li class="col-inner"><a href="#">Draven</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                        <div class="banner">
                                            <a href="#"><img src="img/megamenubanner.png" alt="images" class="img-responsive"></a>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="#">headphone</a></li>
                                <li><a href="#">mouse</a></li>
                                <li><a href="#">washing machine</a></li>
                                <li><a href="#">air conditional</a></li>
                                <li><a href="#">accessories</a></li>
                                <li><a href="#">others</a></li>
                                <li class="sub-form-li">
                                    <div>
                                        Subscribe
                                    </div>
                                    <form action="#" class="sub-form">
                                        <input type="text" name="e" class="form-control" placeholder="Your email here...">
                                        <button type="submit" class="btn btn-sub">Send Now</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </aside>
            </div>
            <div class="col-md-9 col-sm-8 col-xs-6 column-right">
                <div class="deal">
                    <a href="#" class="btn-deal">Hot Deal</a>
                </div>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="menu-title">MENU</span>
                </button>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="menubar js-menubar">
                        <li class=" menu-homepage menu-item-has-child dropdown">
                            <a href="#" title="Home"><i class="fa fa-home"></i>home</a>
                            <span class="plus js-plus-icon"></span>
                            <ul class="dropdown-menu menu-level">
                                <li><a href="index.html" title="home 1">Home 1</a></li>
                                <li><a href="home-2.html" title="home 2">Home 2</a></li>
                                <li><a href="home-3.html" title="home 3">Home 3</a></li>
                                <li><a href="home-4.html" title="home 4">Home 4</a></li>
                                <li><a href="home-5.html" title="home 5">Home 5</a></li>
                                <li><a href="home-6.html" title="home 6">Home 6</a></li>
                            </ul>
                        </li>
                        <li class="menu-collection-page menu-item-has-child dropdown">
                            <a href="#" title="Marketplace">marketplace</a>
                            <span class="plus js-plus-icon"></span>
                            <ul class="dropdown-menu menu-level">
                                <li><a href="product-collection.html" title="shop collection">Shop Collection</a></li>
                                <li><a href="shop-list-v2.html" title="shop list v1">Shop List V1</a></li>
                                <li><a href="shop-list-v3.html" title="shop list v2">Shop List V2</a></li>
                                <li><a href="#" title="shoplist v3">Shop List V3</a></li>
                            </ul>
                        </li>
                        <li class=" menu-demo-page menu-item-has-child dropdown">
                            <a href="#" title="Sellerdemo">SELLER DEMO</a>
                            <span class="plus js-plus-icon"></span>
                            <div class="dropdown-menu dropdown-menu-bg">
                                <ul class="level1">
                                    <li class="sub-menu col-3">
                                        <a href="#">Cart pages</a>
                                        <ul class="level2">
                                            <li class="col-inner"><a href="checkout-1.html" title="">Shopping Cart</a></li>
                                            <li class="col-inner"><a href="checkout-2.html" title="">Check Out</a></li>
                                            <li class="col-inner"><a href="checkout-3.html" title="">Order</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-menu col-3">
                                        <a href="#">Product Pages</a>
                                        <ul class="level2">
                                            <li class="col-inner"><a href="shop-single.html" title="">Shop Single V1</a></li>
                                            <li class="col-inner"><a href="shop-single-v2.html" title="">Shop Single V2</a></li>
                                            <li class="col-inner"><a href="#" title="">Shop Single V3</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-menu col-3">
                                        <a href="#">NEW Arrival</a>
                                        <ul class="level2">
                                            <li class="text-center"><a href="comming-soon.html"><img src="img/megaimg.png" alt="images" class="img-responsive"></a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </li>
                        <li class="dropdown menu-contact-page menu-item-has-child">
                            <a href="#" title="ContactUs">CONTACT US</a>
                            <span class="plus js-plus-icon"></span>
                            <ul class="dropdown-menu menu-level">
                                <li><a href="contact_us.html" title="contact us">Contact Us </a></li>
                                <li><a href="about-us.html" title="about us">About Us</a></li>
                            </ul>
                        </li>
                        <li class="dropdown menu-blog-page menu-item-has-child">
                            <a href="#" title="Blog">blog</a>
                            <span class="plus js-plus-icon"></span>
                            <ul class="dropdown-menu menu-level menu-level-last">
                                <li><a href="blog-v1.html" title="blog">Blog</a></li>
                                <li><a href="blog-single-v1.html" title="blog-single">Blog Single</a></li>
                            </ul>
                        </li>
                        <li class="dropdown menu-others-page menu-item-has-child"><a href="#" title="Others">others</a>
                            <span class="plus js-plus-icon"></span>
                            <ul class="dropdown-menu menu-level menu-level-last">
                                <li><a href="404.html" title="error page">404</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
