    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="{{ url('/shopping') }}" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{ url('/home') }}" class=" nav-link {{ Request::path() ==  'home' ? 'active' : ''  }}">Home</a>
                            <a href="{{ url('/shop') }}" class="nav-link {{ Request::path() ==  'shop' ? 'active' : ''  }}">Shop</a>
                                    <a href="{{ url('/shop-checkout') }}" class="nav-link {{ Request::path() ==  'shop-checkout' ? 'active' : ''  }}">Checkout</a>
                            <a href="{{ url('/contact') }}" class="nav-link {{ Request::path() ==  'contact' ? 'active' : ''  }}">Contact</a>
                        </div>

                    </div>
                </nav>

                @if (Request::path() == 'home')
                    <div id="header-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @if (!empty($bannerData))
                                @foreach ($bannerData as $key => $item)
                                    @if ($key == 0)
                                        <div class="carousel-item active" style="height: 410px;">
                                            <img class="img-fluid"
                                                src="{{ asset('uploads/banner/' . $item['banner_image']) }}"
                                                alt="Image">
                                            <div
                                                class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                                <div class="p-3" style="max-width: 700px;">
                                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">
                                                        {{ $item['banner_title'] }}</h4>
                                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">
                                                        {{ $item['banner_description'] }}</h3>
                                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="carousel-item" style="height: 410px;">
                                            <img class="img-fluid"
                                                src="{{ asset('uploads/banner/' . $item['banner_image']) }}"
                                                alt="Image">
                                            <div
                                                class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                                <div class="p-3" style="max-width: 700px;">
                                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">
                                                        {{ $item['banner_title'] }}</h4>
                                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">
                                                        {{ $item['banner_description'] }}
                                                    </h3>
                                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                                <span class="carousel-control-prev-icon mb-n2"></span>
                            </div>
                        </a>
                        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                                <span class="carousel-control-next-icon mb-n2"></span>
                            </div>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Navbar End -->
