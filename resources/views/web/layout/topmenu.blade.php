<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="{{ asset('web/img/logo.png') }}" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        @include('web.layout.cart')
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">

            <img src="{{ asset('web/img/language.png') }}" alt="">
            
            <div>
                @if(app()->getLocale() == 'en')
                    {{ __('file.English') }}
                @else
                    {{ __('file.Myanmar') }}
                @endif
            </div>

            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="{{ url('switchlang/en') }}">{{ __('file.English') }}</a></li>
                <li><a href="{{ url('switchlang/mm') }}">{{ __('file.Myanmar') }}</a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            <a href="#"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="{{ url('/') }}">{{ __('file.Home') }}</a></li>
            <li><a href="{{ url('/shop') }}">Shop</a></li>
            <li><a href="{{ url('/blog') }}">Blog</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>

            @if (auth()->check())
                <li><a href="#">Account</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="{{ route('account.manage') }}">Manage Account</a></li>
                        <li><a href="{{ route('account.orders') }}">My Order</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
            <li>Free Shipping for all Order of $99</li>
        </ul>
    </div>
</div>