@extends('website.layout.app')
@section('content')
<section class="services_details_breadcrumb">
  <div class="container">
    <nav aria-label="breadcrumb" class="breadcrumb__nav">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{asset('')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('category_wise_list', $category->slug)}}">{{$category->name}}</a></li>
        <li class="breadcrumb-item">
          <a href="{{route('single_product', [$category->slug, $products->slug])}}">{{$products->slug}}</a>
        </li>
      </ol>
    </nav>
  </div>
</section>
<!-- services_details_breadcrumb -->

<section class="services_details_body">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="services_details_left">
          <div class="services_details_main_slider">
            <div class="services_details_slider_big">
              <div>
                <div class="services_details_big_img">
                  <img src="{{asset('products/'.$products->image)}}" />
                </div>
              </div>
              {{-- <div>
                <div class="services_details_big_img">
                  <img src="images/single-pro2.jpg" />
                </div>
              </div>
              <div>
                <div class="services_details_big_img">
                  <img src="images/single-pro3.jpg" />
                </div>
              </div> --}}
            </div>
            <div class="services_details_slider_thumb">
              <div>
                <div class="services_details_thumb_img">
                  <img class="img-fluid" src="{{asset('products/'.$products->image)}}" />
                </div>
              </div>
              {{-- <div>
                <div class="services_details_thumb_img">
                  <img class="img-fluid" src="images/single-pro2.jpg" />
                </div>
              </div>
              <div>
                <div class="services_details_thumb_img">
                  <img class="img-fluid" src="images/single-pro3.jpg" />
                </div>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="services_details_left">
          <div class="live_band_team pb-1 relative mb-4">
            <h3 class="details_section_heading">{{$products->name}}
            </h3>
            @php
                $discountPercentage = DiscountPercentage($products->price, $products->offer_price);
            @endphp 
            <p>Designed and sold by <a href="">MK788</a></p>
            <div class="pro-price">
              <p>₹{{number_format($products->offer_price, 2, '.', '')}} <span>₹{{number_format($products->price, 2, '.', '')}} ({{number_format($discountPercentage)}}%off)</span></p>
            </div>
            <div class="pro-model">
              <h4>Model</h4>

              <div class="select">
                <select name="" id="">
                  <option value="" selected disabled>Choose a model</option>
                  <option value=""></option>
                </select>
                <iconify-icon icon="uil:angle-down"></iconify-icon>
              </div>

              <small
                >To find your Samsung Galaxy model, open the Settings app,
                and then tap About Phone or About Device.</small
              >
            </div>

            <div class="pro-model case-style">
              <h4>Case Style</h4>
              <div class="select">
                <select name="" id="">
                  <option value="" selected disabled>
                    Choose a case style
                  </option>
                  <option value=""></option>
                </select>
                <iconify-icon icon="uil:angle-down"></iconify-icon>
              </div>
            </div>


            <div class="pro-model case-style">
              <h4>Available Colours</h4>

              <ul class="select_color">
                <li><label><input type="radio" name="color"><span style="background: #f00;"></span></label></li>
                <li><label><input type="radio" name="color"><span style="background: #0f0;"></span></label></li>
                <li><label><input type="radio" name="color"><span style="background: #00f;"></span></label></li>
                <li><label><input type="radio" name="color"><span style="background: #ff0;"></span></label></li>
                <li><label><input type="radio" name="color"><span style="background: #f0f;"></span></label></li>
                <li><label><input type="radio" name="color"><span style="background: #0ff;"></span></label></li>
              </ul>
            </div>

            <div class="pro-model case-style">
              <h4>Available Sizes</h4>

              <ul class="select_size">
                <li><label><input type="radio" name="size"><span>XS</span></label></li>
                <li><label><input type="radio" name="size"><span>S</span></label></li>
                <li><label><input type="radio" name="size"><span>M</span></label></li>
                <li><label><input type="radio" name="size"><span>L</span></label></li>
                <li><label><input type="radio" name="size"><span>XL</span></label></li>
                <li><label><input type="radio" name="size"><span>XXL</span></label></li>
              </ul>
            </div>


            <button class="btn-share mb-4">
              <span class="btn-text">Share</span
              ><span class="btn-icon">
                <svg
                  t="1580465783605"
                  class="icon"
                  viewBox="0 0 1024 1024"
                  version="1.1"
                  xmlns="http://www.w3.org/2000/svg"
                  p-id="9773"
                  width="18"
                  height="18"
                >
                  <path
                    d="M767.99994 585.142857q75.995429 0 129.462857 53.394286t53.394286 129.462857-53.394286 129.462857-129.462857 53.394286-129.462857-53.394286-53.394286-129.462857q0-6.875429 1.170286-19.456l-205.677714-102.838857q-52.589714 49.152-124.562286 49.152-75.995429 0-129.462857-53.394286t-53.394286-129.462857 53.394286-129.462857 129.462857-53.394286q71.972571 0 124.562286 49.152l205.677714-102.838857q-1.170286-12.580571-1.170286-19.456 0-75.995429 53.394286-129.462857t129.462857-53.394286 129.462857 53.394286 53.394286 129.462857-53.394286 129.462857-129.462857 53.394286q-71.972571 0-124.562286-49.152l-205.677714 102.838857q1.170286 12.580571 1.170286 19.456t-1.170286 19.456l205.677714 102.838857q52.589714-49.152 124.562286-49.152z"
                    p-id="9774"
                    fill="#ffffff"
                  ></path>
                </svg>
              </span>
              <ul class="social-icons">
                <li>
                  <a href="https://twitter.com/alphardex007" target="_blank"
                    ><svg
                      t="1580195676506"
                      class="icon"
                      viewBox="0 0 1024 1024"
                      version="1.1"
                      xmlns="http://www.w3.org/2000/svg"
                      p-id="2099"
                      width="18"
                      height="18"
                    >
                      <path
                        d="M962.267429 233.179429q-38.253714 56.027429-92.598857 95.451429 0.585143 7.972571 0.585143 23.990857 0 74.313143-21.723429 148.260571t-65.974857 141.970286-105.398857 120.32-147.456 83.456-184.539429 31.158857q-154.843429 0-283.428571-82.870857 19.968 2.267429 44.544 2.267429 128.585143 0 229.156571-78.848-59.977143-1.170286-107.446857-36.864t-65.170286-91.136q18.870857 2.852571 34.889143 2.852571 24.576 0 48.566857-6.290286-64-13.165714-105.984-63.707429t-41.984-117.394286l0-2.267429q38.838857 21.723429 83.456 23.405714-37.741714-25.161143-59.977143-65.682286t-22.308571-87.990857q0-50.322286 25.161143-93.110857 69.12 85.138286 168.301714 136.265143t212.260571 56.832q-4.534857-21.723429-4.534857-42.276571 0-76.580571 53.979429-130.56t130.56-53.979429q80.018286 0 134.875429 58.294857 62.317714-11.995429 117.174857-44.544-21.138286 65.682286-81.115429 101.741714 53.174857-5.705143 106.276571-28.598857z"
                        p-id="2100"
                        fill="white"
                      ></path></svg></a>
                </li>
                <li>
                  <a href="https://codepen.io/alphardex" target="_blank"
                    ><svg
                      t="1580195734305"
                      class="icon"
                      viewBox="0 0 1024 1024"
                      version="1.1"
                      xmlns="http://www.w3.org/2000/svg"
                      p-id="2429"
                      width="18"
                      height="18"
                    >
                      <path
                        d="M123.52064 667.99143l344.526782 229.708899 0-205.136409-190.802457-127.396658zM88.051421 585.717469l110.283674-73.717469-110.283674-73.717469 0 147.434938zM556.025711 897.627196l344.526782-229.708899-153.724325-102.824168-190.802457 127.396658 0 205.136409zM512 615.994287l155.406371-103.994287-155.406371-103.994287-155.406371 103.994287zM277.171833 458.832738l190.802457-127.396658 0-205.136409-344.526782 229.708899zM825.664905 512l110.283674 73.717469 0-147.434938zM746.828167 458.832738l153.724325-102.824168-344.526782-229.708899 0 205.136409zM1023.926868 356.00857l0 311.98286q0 23.402371-19.453221 36.566205l-467.901157 311.98286q-11.993715 7.459506-24.57249 7.459506t-24.57249-7.459506l-467.901157-311.98286q-19.453221-13.163834-19.453221-36.566205l0-311.98286q0-23.402371 19.453221-36.566205l467.901157-311.98286q11.993715-7.459506 24.57249-7.459506t24.57249 7.459506l467.901157 311.98286q19.453221 13.163834 19.453221 36.566205z"
                        p-id="2430"
                        fill="white"
                      ></path></svg></a>
                </li>
                <li>
                  <a href="https://github.com/alphardex" target="_blank"
                    ><svg
                      t="1580195767061"
                      class="icon"
                      viewBox="0 0 1024 1024"
                      version="1.1"
                      xmlns="http://www.w3.org/2000/svg"
                      p-id="2759"
                      width="18"
                      height="18"
                    >
                      <path
                        d="M950.930286 512q0 143.433143-83.748571 257.974857t-216.283429 158.573714q-15.433143 2.852571-22.601143-4.022857t-7.168-17.115429l0-120.539429q0-55.442286-29.696-81.115429 32.548571-3.437714 58.587429-10.313143t53.686857-22.308571 46.299429-38.034286 30.281143-59.977143 11.702857-86.016q0-69.12-45.129143-117.686857 21.138286-52.004571-4.534857-116.589714-16.018286-5.12-46.299429 6.290286t-52.589714 25.161143l-21.723429 13.677714q-53.174857-14.848-109.714286-14.848t-109.714286 14.848q-9.142857-6.290286-24.283429-15.433143t-47.689143-22.016-49.152-7.68q-25.161143 64.585143-4.022857 116.589714-45.129143 48.566857-45.129143 117.686857 0 48.566857 11.702857 85.723429t29.988571 59.977143 46.006857 38.253714 53.686857 22.308571 58.587429 10.313143q-22.820571 20.553143-28.013714 58.88-11.995429 5.705143-25.746286 8.557714t-32.548571 2.852571-37.449143-12.288-31.744-35.693714q-10.825143-18.285714-27.721143-29.696t-28.306286-13.677714l-11.410286-1.682286q-11.995429 0-16.603429 2.56t-2.852571 6.582857 5.12 7.972571 7.460571 6.875429l4.022857 2.852571q12.580571 5.705143 24.868571 21.723429t17.993143 29.110857l5.705143 13.165714q7.460571 21.723429 25.161143 35.108571t38.253714 17.115429 39.716571 4.022857 31.744-1.974857l13.165714-2.267429q0 21.723429 0.292571 50.834286t0.292571 30.866286q0 10.313143-7.460571 17.115429t-22.820571 4.022857q-132.534857-44.032-216.283429-158.573714t-83.748571-257.974857q0-119.442286 58.88-220.306286t159.744-159.744 220.306286-58.88 220.306286 58.88 159.744 159.744 58.88 220.306286z"
                        p-id="2760"
                        fill="white"
                      ></path></svg></a>
                </li>
              </ul>
            </button>
          </div>

          <div class="services_details_term pb-4 mb-4">
            <div class="quanity">
              <h4>Quantity</h4>
              <div class="qty-container">
                <button class="qty-btn-minus btn-light" type="button">
                  <i class="fa fa-minus"></i>
                </button>
                <input type="text" name="qty" value="0" class="input-qty" />
                <button class="qty-btn-plus btn-light" type="button">
                  <i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
            <h4>Payment Terms</h4>
            <p class="mb-4">
              <a href="#"
                >Lorem Ipsum has been the industry's standard dummy text
                ever since the 1500s, when an unknown printer took a galley
                of type.</a
              >
            </p>
            <a href="#" class="all_btn"
              ><iconify-icon icon="mdi:cart-outline"></iconify-icon> Add to
              cart</a
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- services_details_body -->

<section class="single-pro-details">
  <div class="container">
    <div class="row">
      <div class="col-12 m-auto">
        <div class="overveiw__content mb-4">
          <h3 class="details_section_heading">
            Abstract art samsung galaxy s22 case #1 Samsung Galaxy Phone
            Case
          </h3>
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy
            text ever since the 1500s, when an unknown printer took a galley
            of type It was popularised in sheets containing Lorem Ipsum
            passages, and more recently with desktop publishing software
            like Aldus PageMaker including versions of Lorem Ipsum.,
          </p>
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy
            text ever since the 1500s, when an unknown printer took a galley
            of type and scrambled it to make a type specimen book.
          </p>
        </div>

        <div class="featues-content">
          <h3 class="details_section_heading">Features</h3>
          <ul class="list-unstyled p-0 m-0">
            <li>
              Durable flexible case that grips around the edges of your
              phone
            </li>
            <li>Shock absorbent TPU case with anti-fingerprint finish</li>
            <li>Colors are ink printed on the frosted shell surface</li>
            <li>
              The design is featured on the back while the edges of the case
              are semi transparent and provide full access to ports
            </li>
            <li>
              Compatible with Qi-standard wireless charging and PowerShare
            </li>
            <li>Weight 26g</li>
            <li>Thickness 1/16 inch (1.6mm)</li>
            <li>Does not fit Fan Edition (FE) devices</li>
          </ul>
        </div>
        <div class="review_list_wrap">
          <h3 class="details_section_heading">Overview</h3>
          <ul>
            <li class="review_list">
              <div class="review_top relative">
                <div class="review_img">
                  <img src="images/testimonial-1.png" alt="" />
                </div>
                <div class="review_name_rating">
                  <h4>Kirsten Swartz</h4>
                  <ul>
                    <li class="review_date">
                      <h6>January 17, 2018 at 12.50 pm</h6>
                    </li>
                    <li class="review_rating">
                      <p class="mb-0">
                        <img src="images/rating-star.svg" alt="" />4.5
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="review_bottom">
                <p>
                  Lorem Ipsum is simply dummy text of the printing and
                  industry. Lorem Ipsum has been the industry's standard
                  dummy text ever since the 1500s, when an…
                </p>
              </div>
            </li>
            <li class="review_list">
              <div class="review_top relative">
                <div class="review_img">
                  <img src="images/testimonial-1.png" alt="" />
                </div>
                <div class="review_name_rating">
                  <h4>john Doe</h4>
                  <ul>
                    <li class="review_date">
                      <h6>February 21, 2019 at 11.25 am</h6>
                    </li>
                    <li class="review_rating">
                      <p class="mb-0">
                        <img src="images/rating-star.svg" alt="" />4.9
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="review_bottom">
                <p>
                  Lorem Ipsum is simply dummy text of the printing and
                  industry. Lorem Ipsum has been the industry's standard
                  dummy text ever since the 1500s, when an…
                </p>
              </div>
            </li>
            <li class="review_list">
              <div class="review_top relative">
                <div class="review_img">
                  <img src="images/testimonial-1.png" alt="" />
                </div>
                <div class="review_name_rating">
                  <h4>Jiney Reinstein</h4>
                  <ul>
                    <li class="review_date">
                      <h6>April 19, 2018 at 09.28 am</h6>
                    </li>
                    <li class="review_rating">
                      <p class="mb-0">
                        <img src="images/rating-star.svg" alt="" />3.7
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="review_bottom">
                <p>
                  Lorem Ipsum is simply dummy text of the printing and
                  industry. Lorem Ipsum has been the industry's standard
                  dummy text ever since the 1500s, when an…
                </p>
              </div>
            </li>
            <li class="review_list">
              <div class="review_top relative">
                <div class="review_img">
                  <img src="images/testimonial-1.png" alt="" />
                </div>
                <div class="review_name_rating">
                  <h4>Stephen Reinstein</h4>
                  <ul>
                    <li class="review_date">
                      <h6>March 28, 2019 at 12.27 pm</h6>
                    </li>
                    <li class="review_rating">
                      <p class="mb-0">
                        <img src="images/rating-star.svg" alt="" />4.7
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="review_bottom">
                <p>
                  Lorem Ipsum is simply dummy text of the printing and
                  industry. Lorem Ipsum has been the industry's standard
                  dummy text ever since the 1500s, when Lorem Ipsum is
                  simply dummy text. Lorem Ipsum is simply dummy text of the
                  printing and industry. Lorem Ipsum has been the industry's
                  standard dummy text.
                </p>
              </div>
            </li>
          </ul>
          <a href="#" class="all_btn more_review_btn">View More Review</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="related_services">
  <div class="container">
    <div class="mb-2 site_heading text-center">
      <h2 class="text-center related_heading">Related products</h2>
    </div>
    <div class="related_slider">
      <div>
        <div class="related_service_item">
          <div class="related__img">
            <img class="img-fluid" src="images/phone-case1.jpg" />
          </div>
          <div class="related__content text-center">
            <h3>
              Watercolor rainbow pattern glitter, abstract geometric octagon
              Abstract art Samsung Galaxy Soft Case
            </h3>
            <div class="price">
              <p class="mb-0">
                $16.88 <span class="discounted">$21.11(20%off)</span>
              </p>
            </div>
            <a href="#" class="all_btn">View Details</a>
          </div>
        </div>
      </div>
      <div>
        <div class="related_service_item">
          <div class="related__img">
            <img class="img-fluid" src="images/phone-case2.jpg" />
          </div>
          <div class="related__content text-center">
            <h3>Abstract Art Colorful Samsung Galaxy Soft Case</h3>
            <div class="price">
              <p class="mb-0">
                $17.03 <span class="discounted">$21.28(20%off)</span>
              </p>
            </div>
            <a href="#" class="all_btn">View Details</a>
          </div>
        </div>
      </div>
      <div>
        <div class="related_service_item">
          <div class="related__img">
            <img class="img-fluid" src="images/phone-case3.jpg" />
          </div>
          <div class="related__content text-center">
            <h3>
              A Abstract Art Colorful Japan Design Samsung Galaxy Soft Case
            </h3>
            <div class="price">
              <p class="mb-0">
                $16.88 <span class="discounted">$21.11(20%off)</span>
              </p>
            </div>
            <a href="#" class="all_btn">View Details</a>
          </div>
        </div>
      </div>
      <div>
        <div class="related_service_item">
          <div class="related__img">
            <img class="img-fluid" src="images/phone-case4.jpg" />
          </div>
          <div class="related__content text-center">
            <h3>
              Abstract art samsung galaxy s22 case #1 Samsung Galaxy iPhone
              Tough Case
            </h3>
            <div class="price">
              <p class="mb-0">
                $16.88 <span class="discounted">$21.11(20%off)</span>
              </p>
            </div>
            <a href="#" class="all_btn">View Details</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- related_services -->

@endsection
@push('scripts')
<script>
  var buttonPlus = $(".qty-btn-plus");
  var buttonMinus = $(".qty-btn-minus");

  var incrementPlus = buttonPlus.click(function () {
    var $n = $(this).parent(".qty-container").find(".input-qty");
    $n.val(Number($n.val()) + 1);
  });

  var incrementMinus = buttonMinus.click(function () {
    var $n = $(this).parent(".qty-container").find(".input-qty");
    var amount = Number($n.val());
    if (amount > 0) {
      $n.val(amount - 1);
    }
  });
</script>

<script type="text/javascript">
  jQuery(window).on("scroll", function () {
    if (jQuery(window).scrollTop() > 66) {
      jQuery(".main__header").addClass("sticky");
    } else {
      jQuery(".main__header").removeClass("sticky");
    }
  });

  // Related Slider

  $(".related_slider").slick({
    slidesToShow: 3,
    dots: false,
    infinite: true,
    arrows: true,
    nextArrow:
      '<button class="slider_arrow_right"><img class="img-fluid" src="images/slider-right-arrow.svg"></button>',
    prevArrow:
      '<button class="slider_arrow_left"><img class="img-fluid" src="images/slider-left-arrow.svg"></button>',
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });

  $(".services_details_slider_big").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: ".services_details_slider_thumb",
  });

  $(".services_details_slider_thumb").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: ".services_details_slider_big",
    dots: false,
    arrows: true,
    nextArrow:
      '<button class="slider_arrow_right"><img class="img-fluid" src="images/slider-right-arrow.svg"></button>',
    prevArrow:
      '<button class="slider_arrow_left"><img class="img-fluid" src="images/slider-left-arrow.svg"></button>',
    centerMode: false,
    focusOnSelect: true,
  });
</script>
@endpush