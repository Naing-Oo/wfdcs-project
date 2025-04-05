<div class="product__discount">
    <div class="section-title product__discount__title">
        <h2>Sale Off</h2>
    </div>
    <div class="row">
        <div class="product__discount__slider owl-carousel">

            @foreach ($promotions as $promotion)
                <div class="col-lg-4">
                    <div class="product__discount__item">
                        <div class="product__discount__item__pic set-bg"
                            data-setbg="{{ asset($promotion['image']) }}">
                            <div class="product__discount__percent">-{{ $promotion['discount'] }}%
                            </div>
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__discount__item__text">
                            <span>{{ $promotion['category'] }}</span>
                            <h5><a href="#">{{ $promotion['name'] }}</a></h5>
                            <div class="product__item__price">
                                {{ $promotion['price'] }}<span>{{ $promotion['price'] }}</span> THB
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>