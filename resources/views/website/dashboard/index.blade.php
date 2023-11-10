@extends('website.layout.app')
@section('content')
@php
    $FeaturedProduct = App\Models\Product::latest('id')->where('deleted_at', 1)->limit(12)->get();
    $ProductRangeCategory = App\Models\Category::orderBy('id', 'asc')->where('status', 1)->where('deleted_at', 1)->limit(8)->get();
@endphp
  <section class="banner__area">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-8 col-md-12 m-auto">
          <div class="banner__text">
            <h1>Brand-new designs, brand-new you</h1>
            <h4>
              Get 20% off styles so fresh they’re practically from the future
            </h4>
            <a href="#" class="all_btn">shop collection</a>
          </div>
        </div>
      </div>
    </div>

    <!-- banner_bottom_form -->
  </section>
  <!-- banner__area -->

  <section class="product-sec1">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="site_heading text-center">
            <h2>Shop Product Range</h2>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        @foreach ($ProductRangeCategory as $item)
          <div class="col-6 col-lg-3 col-md-6 mb-4">
            <div class="pro-content">
              <a href="">
                <div class="pro-img">
                  <img src="{{asset($item->image?$item->image:'website/images/default.jpg')}}" alt="" class="img-fluid" />
                </div>
                <div class="pro-info">
                  <span>shop {{$item->name}}</span>
                </div>
              </a>
            </div>
          </div>
        @endforeach
        
      </div>
    </div>
  </section>


  <section class="artist_banner_section">
    <div class="container-fluid">
      <div class="artist_banner">
        <div class="row">
          <div class="col-12 col-sm-5">
            <div class="artist_container">
              <h2>Join as an artist</h2>
              <h4>Get 20% off styles so fresh they’re<br/>practically from the future</h4>
              <p>A shirt with an evil cat. A phone case with a galloping donut. A tote bag with a star-surfing astronaut. Whatever your thing, you can get art you love on super well made products.</p>

              <a href="#" class="all_btn">Register Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="featured-product">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="site_heading text-center">
            <h2>Featured Product</h2>
          </div>
        </div>
      </div>

      <div class="row mt-3">
        @foreach ($FeaturedProduct as $item)
          <div class="col-6 col-lg-2 col-md-6 mb-4">
            <div class="featured-content">
              <a href="">
                <div class="featured-img">
                  <img src="{{asset('products/'.$item->image)}}" alt="" class="img-fluid" />
                </div>
                <div class="featured-info">
                  <div class="name">
                    <h5 class="mb-0">
                      {{$item->name}}
                    </h5>
                    <!-- <span>by John Doe</span> -->
                    <div class="price">
                      @php
                          $discountPercentage = DiscountPercentage($item->price, $item->offer_price);
                      @endphp   
                      <p class="mb-0">₹{{number_format($item->offer_price, 2, '.', '')}}</p>
                      <p class="discounted"><del>₹{{number_format($item->price, 2, '.', '')}}</del> ({{number_format($discountPercentage)}}%off)</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="design-picked">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="site_heading">
            <h2>Explore designs picked for you</h2>
          </div>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-6 col-lg-3 col-md-6 mb-4">
          <div class="dsign-content">
            <a href="">
              <div class="design-img">
                <img src="{{asset('website/images/shop-image2.jpg')}}" alt="" class="img-fluid" />
                <div class="design-heart">
                  <iconify-icon icon="fluent:heart-28-regular"></iconify-icon>
                </div>
                <div class="design-info">
                  <div class="name">
                    <h5 class="mb-0">frida kahlo</h5>
                    <span>by aanase</span>
                    <div class="total-products">
                      <span class="mb-0">81 Products</span>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-lg-3 col-md-6 mb-4">
          <div class="dsign-content">
            <a href="">
              <div class="design-img">
                <img src="{{asset('website/images/shop-image5.jpg')}}" alt="" class="img-fluid" />
                <div class="design-heart">
                  <iconify-icon icon="fluent:heart-28-regular"></iconify-icon>
                </div>
                <div class="design-info">
                  <div class="name">
                    <h5 class="mb-0">Panda and Brownie rainbow Gift</h5>
                    <span>by HAJJ010</span>
                    <div class="total-products">
                      <span class="mb-0">64 Products</span>
                    </div>
                  </div>
                </div>
              </div>
              
            </a>
          </div>
        </div>

        <div class="col-6 col-lg-3 col-md-6 mb-4">
          <div class="dsign-content">
            <a href="">
              <div class="design-img">
                <img src="{{asset('website/images/shop-image9.jpg')}}" alt="" class="img-fluid" />
                <div class="design-heart">
                  <iconify-icon icon="fluent:heart-28-regular"></iconify-icon>
                </div>
                <div class="design-info">
                  <div class="name">
                    <h5 class="mb-0">Stylish geometric marble look</h5>
                    <span>by NaughtyCat</span>
                    <div class="total-products">
                      <span class="mb-0">81 Products</span>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-lg-3 col-md-6 mb-4">
          <div class="dsign-content">
            <a href="">
              <div class="design-img">
                <img src="{{asset('website/images/shop-image10.jpg')}}" alt="" class="img-fluid" />
                <div class="design-heart">
                  <iconify-icon icon="fluent:heart-28-regular"></iconify-icon>
                </div>
                <div class="design-info">
                  <div class="name">
                    <h5 class="mb-0">Sunset Watercolour Daisies</h5>
                    <span>by JRoseDesign</span>
                    <div class="total-products">
                      <span class="mb-0">74 Products</span>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="featured-artists">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="site_heading text-center">
            <h2>Featured artists</h2>
          </div>
        </div>
      </div>

      <div class="row mt-4 featured-row">
        <div class="col-6 col-lg-3 col-md-6 mb-4">
          <div class="featured-artist-content">
            <div class="avatar">
              <img src="{{asset('website/images/avatar.png')}}" alt="" />
            </div>
            <a href="">
              <div class="featured-artists-img">
                <img
                  src="{{asset('website/images/featured-artist1.jpg')}}"
                  alt=""
                  class="img-fluid"
                />
              </div>
              <div class="featured-artists-info">
                <h4>Nina Cubes</h4>
                <span class="artist-btn">View shop</span>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-lg-3 col-md-6 mb-4">
          <div class="featured-artist-content">
            <div class="avatar">
              <img src="{{asset('website/images/avatar2.jpg')}}" alt="" />
            </div>
            <a href="">
              <div class="featured-artists-img">
                <img
                  src="{{asset('website/images/featured-artist2.jpg')}}"
                  alt=""
                  class="img-fluid"
                />
              </div>
              <div class="featured-artists-info">
                <h4>snazzyseagull</h4>
                <span class="artist-btn">View shop</span>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-lg-3 col-md-6 mb-4">
          <div class="featured-artist-content">
            <div class="avatar">
              <img src="{{asset('website/images/avatar3.jpg')}}" alt="" />
            </div>
            <a href="">
              <div class="featured-artists-img">
                <img
                  src="{{asset('website/images/featured-artist3.jpg')}}"
                  alt=""
                  class="img-fluid"
                />
              </div>
              <div class="featured-artists-info">
                <h4>Alja Horvat</h4>
                <span class="artist-btn">View shop</span>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-lg-3 col-md-6 mb-4">
          <div class="featured-artist-content">
            <div class="avatar">
              <img src="{{asset('website/images/avatar4.jpg')}}" alt="" />
            </div>
            <a href="">
              <div class="featured-artists-img">
                <img
                  src="{{asset('website/images/featured-artist4.jpg')}}"
                  alt=""
                  class="img-fluid"
                />
              </div>
              <div class="featured-artists-info">
                <h4>Jaclyn Caris</h4>
                <span class="artist-btn">View shop</span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="fan-art">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-lg-10 col-md-10 m-auto">
          <div class="site_heading text-center">
            <h2>Shop fan art made by artists who love it too</h2>
          </div>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-6 col-lg-3 col-md-6 mb-0">
          <div class="dsign-content">
            <a href="">
              <div class="design-img">
                <img src="{{asset('website/images/1.4-600x600.jpg')}}" alt="" class="img-fluid" />
                <div class="design-heart">
                  <iconify-icon icon="fluent:heart-28-regular"></iconify-icon>
                </div>
              </div>
              <div class="design-info">
                <div class="name">
                  <h5 class="mb-0">
                    Lady Amalthea - The Last Unicorn Fitted T-Shirt
                  </h5>
                  <span>by Medusa Dollmaker</span>

                  <div class="price">
                    <p class="mb-0">$28.00</p>
                    <p class="discounted"><del>$36.00</del>(20%off)</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-lg-3 col-md-6 mb-0">
          <div class="dsign-content">
            <a href="">
              <div class="design-img">
                <img src="{{asset('website/images/15.1-600x600.jpg')}}" alt="" class="img-fluid" />
                <div class="design-heart">
                  <iconify-icon icon="fluent:heart-28-regular"></iconify-icon>
                </div>
              </div>
              <div class="design-info">
                <div class="name">
                  <h5 class="mb-0">
                    Am I Truly the Last Graphic T-Shirt Dress
                  </h5>
                  <span>by MeganLara</span>

                  <div class="price">
                    <p class="mb-0">$36.25</p>
                    <p class="discounted"><del>$45.00</del>(20%off)</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-lg-3 col-md-6 mb-0">
          <div class="dsign-content">
            <a href="">
              <div class="design-img">
                <img src="{{asset('website/images/3.4-600x600.jpg')}}" alt="" class="img-fluid" />
                <div class="design-heart">
                  <iconify-icon icon="fluent:heart-28-regular"></iconify-icon>
                </div>
              </div>
              <div class="design-info">
                <div class="name">
                  <h5 class="mb-0">The Last Unicorn Poster</h5>
                  <span>by Jeff Powers Illustration</span>

                  <div class="price">
                    <p class="mb-0">$33.25</p>
                    <p class="discounted"><del>$41.00</del>(20%off)</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-6 col-lg-3 col-md-6 mb-0">
          <div class="dsign-content">
            <a href="">
              <div class="design-img">
                <img src="{{asset('website/images/44.1-600x600.jpg')}}" alt="" class="img-fluid" />
                <div class="design-heart">
                  <iconify-icon icon="fluent:heart-28-regular"></iconify-icon>
                </div>
              </div>
              <div class="design-info">
                <div class="name">
                  <h5 class="mb-0">The last Unicorn iPhone Tough Case</h5>
                  <span>by Clarice82r</span>

                  <div class="price">
                    <p class="mb-0">$31.11</p>
                    <p class="discounted"><del>$41.00</del>(20%off)</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="promise">
    <div class="container-fluid">
      <div class="row">
        <div class="col-6 col-lg-3 col-md-6 mb-4 mb-md-0 promise-br">
          <div class="promise-content">
            <div class="promise-img">
              <img
                src="{{asset('website/images/global-distribution.png')}}"
                alt=""
                class="img-fluid"
              />
            </div>
            <div class="promise-info">
              <h5>Worldwide Shipping</h5>
              <p>Available as Standard or Express delivery</p>
              <a href="" class="learn-more">learn more</a>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6 mb-4 mb-md-0 promise-br">
          <div class="promise-content">
            <div class="promise-img">
              <img src="{{asset('website/images/shield.png')}}" alt="" class="img-fluid" />
            </div>
            <div class="promise-info">
              <h5>Secure Payments</h5>
              <p>100% Secure payment with 256-bit SSL Encryption</p>
              <a href="" class="learn-more">learn more</a>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6 mb-4 mb-md-0 promise-br">
          <div class="promise-content">
            <div class="promise-img">
              <img
                src="{{asset('website/images/delivery-status.png')}}"
                alt=""
                class="img-fluid"
              />
            </div>
            <div class="promise-info">
              <h5>Free Return</h5>
              <p>Exchange or money back guarantee for all orders</p>
              <a href="" class="learn-more">learn more</a>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6 mb-4 mb-md-0">
          <div class="promise-content">
            <div class="promise-img">
              <img src="{{asset('website/images/like.png')}}" alt="" class="img-fluid" />
            </div>
            <div class="promise-info">
              <h5>Local Support</h5>
              <p>24/7 Dedicated support</p>
              <a href="" class="learn-more">submit a request</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

@push('scripts')

@endpush