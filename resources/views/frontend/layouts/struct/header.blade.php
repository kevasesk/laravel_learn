<header>
    <div class="topbar-mobile hidden-lg hidden-md">
        <div class="active-mobile">
            <div class="language-popup dropdown">
                <a id="label" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="icon"><i class="ion-ios-world-outline" aria-hidden="true"></i></span>
                    <span>English</span>
                    <span class="ion-chevron-down"></span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="label">
                    <li><a href="#">English</a></li>
                    <li><a href="#">Vietnamese</a></li>
                </ul>
            </div>
        </div>
        <div class="right-nav">
            <div class="active-mobile">
                <div class="header_user_info popup-over e-scale hidden-lg hidden-md dropdown">
                    <div data-toggle="dropdown" class="popup-title dropdown-toggle" title="Account">
                        <i class="ion-android-person"></i><span> Account</span>
                    </div>
                    <ul class="links dropdown-menu list-unstyled">
                        <li>
                            <a id="customer_login_link" href="#" title="Sign in"><i class="ion-log-in"></i> Login</a>
                        </li>
                        <li>
                            <a id="customer_register_link" href="#" title="Register"><i class="ion-ios-personadd"></i> Register</a>
                        </li>
                        <li>
                            <a class="account" rel="nofollow" href="#" title="My account"><i class="ion-ios-person"></i> My account</a>
                        </li>
                        <li>
                            <a id="wishlist-total" title="Wishlist" href="#"><i class="ion-ios-heart"></i> Wishlist</a>
                        </li>
                        <li>
                            <a href="#" title="Check out"><i class="ion-ios-cart"></i> Check out</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="active-mobile search-popup pull-right">
                <div class="search-popup dropdown" data-toggle="modal" data-target="#myModal">
                    <i class="ion-search fa-3a"></i>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="top-nav hidden-xs hidden-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="right-nav">
                        <ul>
                            <li><a href="{{route('customer.register')}}"><i class="ion-ios-personadd fa-1a" aria-hidden="true"></i>create account</a></li>
                            <li>
                                @if(isset($customer))
                                    <a href="{{route('customer.logout')}}">
                                        <i class="ion-log-in fa-1a" aria-hidden="true"></i>
                                        Logout ( {{ $customer->email }})
                                    </a>
                                @else
                                    <a href="{{route('customer.login')}}">
                                        <i class="ion-log-in fa-1a" aria-hidden="true"></i>
                                        Login
                                    </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-8 col-xs-7 logo">
                    <a href="/" title="{{env('APP_NAME')}}"><img src="{{ Resizer::get($settings['logo'], 260, 87) }}" alt="images" class="img-reponsive"></a>
                </div>
                <div class="col-md-9 col-sm-4 col-xs-5 nextlogo">
                    <div class="block block-2">
                        @include('frontend.layouts.struct.cart')
                    </div>
                    <div class="block block-1">
                        <div class="protect">
                            <div class="photo">
                                <svg width="28" height="33" id="Capa_1" data-name="Capa 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 180.05 214.27">
                                    <title>security</title>
                                    <path d="M196.93,55.17c-.11-5.78-.21-11.25-.21-16.54a7.5,7.5,0,0,0-7.5-7.5c-32.07,0-56.5-9.22-76.85-29a7.5,7.5,0,0,0-10.46,0c-20.35,19.79-44.77,29-76.84,29a7.5,7.5,0,0,0-7.5,7.5c0,5.29-.1,10.76-.22,16.54-1,53.84-2.44,127.57,87.33,158.68a7.49,7.49,0,0,0,4.91,0C199.36,182.74,198,109,196.93,55.17ZM107.13,198.81c-77-28-75.82-89.23-74.79-143.35.06-3.25.12-6.4.16-9.48,30-1.27,54.06-10.37,74.63-28.28,20.57,17.91,44.59,27,74.63,28.28,0,3.08.1,6.23.16,9.48C183,109.58,184.12,170.84,107.13,198.81Z" transform="translate(-17.11 0)" />
                                    <path d="M133,81.08l-36.2,36.2L81.31,101.83a7.5,7.5,0,0,0-10.61,10.61l20.75,20.75a7.5,7.5,0,0,0,10.61,0l41.5-41.5A7.5,7.5,0,1,0,133,81.08Z" transform="translate(-17.11 0)" />
                                </svg>
                            </div>
                            <p class="inform">
                                <span class="strong">Infomation<br></span> Protected
                            </p>
                        </div>
                        <div class="return">
                            <div class="photo">
                                <svg width="30" height="30" id="Capa_2" data-name="Capa 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 612 612.85">
                                    <title>update-arrows</title>
                                    <path d="M600.48,221.79c-14.43-50.5-40.14-94.33-77.94-132.13a300.48,300.48,0,0,0-100-66.57C385,7.84,346.58,0,306.78,0V37.47c69.91,0,138.93,27,190,78.28A264.15,264.15,0,0,1,564.7,231.16c12.55,43.87,14.38,88,4.68,132.47A261.77,261.77,0,0,1,509.83,482l-52.18-51.18V558.33l130.13,2-52.18-52.18Q587.78,448.93,604.84,373A301.45,301.45,0,0,0,600.48,221.79Z" transform="translate(-0.43)" />
                                    <path d="M47.85,382A267.44,267.44,0,0,1,43.5,249.56,263.58,263.58,0,0,1,103.38,130.8l52.18,51.85V54.53L25.44,53.19l51.85,51.52Q25.11,163.92,8,239.85a301.82,301.82,0,0,0,4.35,151.54c14.34,50.2,40.14,94,77.95,131.81a300.35,300.35,0,0,0,100,66.57,306.59,306.59,0,0,0,116.42,23.08v-36.8a267,267,0,0,1-190.35-78.94C83.54,464.09,60.41,425.9,47.85,382Z" transform="translate(-0.43)" />
                                </svg>
                            </div>
                            <p class="inform">
                                <span class="strong">Free<br></span> Return
                            </p>
                        </div>
                    </div>
                    <div class="search hidden-xs hidden-sm">
                        <form action="{{route('search')}}" class="search-form" method="GET">
                            @csrf
                            <input type="text" name="query" class="form-control" placeholder="Search entrie store here">
                            <button type="submit" class="search-icon"></button>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.layouts.struct.menu')
</header>
