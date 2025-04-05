<div class="col-lg-8 col-md-7">
    <div class="row">

        @foreach ($blogs as $blog)
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="{{ asset($blog['image']) }}" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i>{{ $blog['date'] }}</li>
                            <li><i class="fa fa-comment-o"></i>{{ $blog['comments'] }}</li>
                        </ul>
                        <h5><a href="#">{{ $blog['title'] }}</a></h5>
                        <p>{{ $blog['description'] }}</p>
                        <a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- pagination --}}
        <div class="col-lg-12">
            <div class="product__pagination blog__pagination">
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
            </div>
        </div>

    </div>
</div>