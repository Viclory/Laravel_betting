@section('banner-slider')

<div class="banners d-flex carousel slide home-banner" id="banners-carousel" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#banners-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#banners-carousel" data-slide-to="1"></li>
        <!--<li data-target="#banners-carousel" data-slide-to="2"></li>-->
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block img-fluid" src="{{ asset('/img/layout2.0/banners/banner300-playspin.jpg') }}" alt="">
        </div>
        <!--<div class="carousel-item">
            <img class="d-block img-fluid" src="{{ asset('/img/layout2.0/banners/habanero-banner.jpg') }}" alt="">
        </div>-->
        <div class="carousel-item">
            <img class="d-block img-fluid" src="{{ asset('/img/layout2.0/banners/netent.jpg') }}" alt="">
        </div>
    </div>

    <a class="carousel-control-prev" href="#banners-carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#banners-carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
    @endsection

