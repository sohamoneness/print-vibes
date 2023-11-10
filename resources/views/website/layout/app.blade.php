<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link rel="icon" href="{{asset('website/images/favicon.png')}}" type="image/png" />
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/slick-theme.css')}}" />
    <link rel="stylesheet" href="{{asset('website/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('website/css/jquery.mCustomScrollbar.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('website/css/responsive.css')}}" />
    <link rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    />
    <link
      href="http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"
      rel="stylesheet"
    />
    <title>Print Vibes</title>
  </head>

  <body>
      <section class="offer_bar">
        <div>Go beyond the rainbow. Shop Pride merch by LGBTQIA+ artists</div>
      </section>
      <header class="header">
        <nav>
          <div class="container-fluid">
            <div class="row m-0 align-items-center justify-content-between">
            <div class="logo">
              <a href="index.html">
                <img src="images/logo.png" alt="" class="img-fluid" />
              </a>
            </div>
            <div class="search">
              <form action="">
                <iconify-icon icon="ion:search"></iconify-icon>
                <input type="text" placeholder="What are you looking for?" />
                <button type="submit">
                  Search
                </button>
              </form>
            </div>
            <div class="hot_line">
              <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone-call"><path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
              </span>
              <div>
                <h4>Hotline: 1800 800 777</h4>
                <p>Pickup your order for free</p>
              </div>
            </div>
            <div class="nav-right">
              @if (Auth::guard('web')->check())
                <div class="signup">
                  <a href="{{route('logout')}}" class="signup-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g data-name="user, account, people, man"><path d="M23.737 16.181a1 1 0 1 0-1.406 1.422A8.938 8.938 0 0 1 25 24c0 1.223-3.506 3-9 3s-9-1.778-9-3.002a8.938 8.938 0 0 1 2.635-6.363 1 1 0 1 0-1.414-1.414A10.927 10.927 0 0 0 5 24c0 3.248 5.667 5 11 5s11-1.752 11-5a10.92 10.92 0 0 0-3.263-7.819z" fill="#000000" data-original="#000000" class=""></path><path d="M16 17a7 7 0 1 0-7-7 7.008 7.008 0 0 0 7 7zm0-12a5 5 0 1 1-5 5 5.006 5.006 0 0 1 5-5z" fill="#000000" data-original="#000000" class=""></path></g></g></svg>
                    <span>{{Auth::guard('web')->user()->name?Auth::guard('web')->user()->name:"User"}}</span>
                  </a>
                </div>
              @else
                <div class="signup">
                  <a href="{{route('register')}}" class="signup-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g data-name="Icon v1"><path d="M12 27H6a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h1.35a3.5 3.5 0 0 0 3.15 2h5a3.5 3.5 0 0 0 3.15-2H20a1 1 0 0 1 1 1v2a1 1 0 0 0 2 0V9a3 3 0 0 0-3-3h-1a3.5 3.5 0 0 0-3.5-3h-5a3.5 3.5 0 0 0-3.45 3H6a3 3 0 0 0-3 3v17a3 3 0 0 0 3 3h6a1 1 0 0 0 0-2zM10.5 5h5a1.5 1.5 0 0 1 0 3h-5a1.5 1.5 0 0 1 0-3z" fill="#000000" data-original="#000000" class=""></path><path d="M19 13a1 1 0 0 0-1-1H8a1 1 0 0 0 0 2h10a1 1 0 0 0 1-1zM8 16a1 1 0 0 0 0 2h8a1 1 0 0 0 0-2zM14 20H8a1 1 0 0 0 0 2h6a1 1 0 0 0 0-2zM22 21a3.5 3.5 0 1 0-3.5-3.5A3.5 3.5 0 0 0 22 21zm0-5a1.5 1.5 0 1 1-1.5 1.5A1.5 1.5 0 0 1 22 16zM24.06 22h-4.12A5 5 0 0 0 15 26.94 2.06 2.06 0 0 0 17.06 29h2.44a1 1 0 0 0 0-2l-2.5-.06A2.94 2.94 0 0 1 19.94 24h4.12a2.87 2.87 0 0 1 2.88 3H22.5a1 1 0 0 0 0 2h4.44A2.06 2.06 0 0 0 29 26.94 5 5 0 0 0 24.06 22z" fill="#000000" data-original="#000000" class=""></path></g></g></svg>
                    <span>Signup</span>
                    </a>
                </div>
                <div class="signup">
                  <a href="{{route('login')}}" class="signup-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g data-name="user, account, people, man"><path d="M23.737 16.181a1 1 0 1 0-1.406 1.422A8.938 8.938 0 0 1 25 24c0 1.223-3.506 3-9 3s-9-1.778-9-3.002a8.938 8.938 0 0 1 2.635-6.363 1 1 0 1 0-1.414-1.414A10.927 10.927 0 0 0 5 24c0 3.248 5.667 5 11 5s11-1.752 11-5a10.92 10.92 0 0 0-3.263-7.819z" fill="#000000" data-original="#000000" class=""></path><path d="M16 17a7 7 0 1 0-7-7 7.008 7.008 0 0 0 7 7zm0-12a5 5 0 1 1-5 5 5.006 5.006 0 0 1 5-5z" fill="#000000" data-original="#000000" class=""></path></g></g></svg>
                    <span>Login</span>
                  </a>
                </div>
              @endif
              
              <div class="cart">
                <a href="" class="cart">
                  <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 48 48" style="enable-background:new 0 0 512 512" xml:space="preserve" fill-rule="evenodd" class=""><g><path d="M14.519 13.5h-2.657a3.5 3.5 0 0 0-3.491 3.251l-1.714 24a3.5 3.5 0 0 0 3.491 3.749h27.704a3.502 3.502 0 0 0 3.491-3.749l-1.714-24a3.5 3.5 0 0 0-3.491-3.251H33.5V13A9.5 9.5 0 0 0 24 3.5c-5.055 0-9.727 4.026-9.5 9.5l.019.5zm18.981 3V24a1.5 1.5 0 0 1-3 0v-7.5h-13V24a1.5 1.5 0 0 1-3 0s.13-3.505.087-7.5h-2.725a.5.5 0 0 0-.498.464l-1.715 24a.5.5 0 0 0 .499.536h27.704a.502.502 0 0 0 .499-.536l-1.715-24a.5.5 0 0 0-.498-.464zm-3-3V13a6.5 6.5 0 1 0-13 0v.5z" fill="#000000" data-original="#000000" class=""></path></g></svg>
                  <span>0</span>
                  </a>
              </div>
              <div class="bars">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path fill="#000000" d="M2 5a1 1 0 0 1 1-1h13a1 1 0 1 1 0 2H3a1 1 0 0 1-1-1zm19 6H3a1 1 0 1 0 0 2h18a1 1 0 1 0 0-2zm-9 7H3a1 1 0 1 0 0 2h9a1 1 0 1 0 0-2z" data-original="#000000"></path></g></svg>
              </div>
            </div>
            </div>
          </div>
        </nav>

        <div class="sidebar">
          <div class="times">
            <iconify-icon icon="ic:round-close"></iconify-icon>
          </div>
    
          <ul class="list-unstyled p-0 m-0 sidebar-menu">
            <li class="link-sm">
              <a href="">Clothing</a>
              <div class="link-sm-btn">
                <iconify-icon icon="bx:caret-down" class="plus1"></iconify-icon>
                <iconify-icon icon="bx:caret-up" class="minus1"></iconify-icon>
              </div>
              <ul class="list-unstyled p-0 sub-menu-sm">
                <li class="link-sm2">
                  <a href="">all clothing</a>
                </li>
                <li class="link-sm2">
                  <a href="">dresses</a>
                </li>
                <li class="link-sm2">
                  <a href="">hats</a>
                </li>
                <li class="link-sm2">
                  <a href="">hoodies & sweatshirts</a>
                </li>
                <li class="link-sm2">
                  <a href="">leggins</a>
                </li>
                <li class="link-sm2">
                  <a href="">skirts</a>
                </li>
                <li class="link-sm2">
                  <a href="">socks</a>
                </li>
                <li class="link-sm2">
                  <a href="">t-shirts</a>
                </li>
                <li class="link-sm2">
                  <a href="">tank tops</a>
                </li>
              </ul>
            </li>
            <li class="link-sm">
              <a href="">stickers</a>
              <div class="link-sm-btn">
                <iconify-icon icon="bx:caret-down" class="plus1"></iconify-icon>
                <iconify-icon icon="bx:caret-up" class="minus1"></iconify-icon>
              </div>
              <ul class="list-unstyled p-0 sub-menu-sm">
                <li class="link-sm2">
                  <a href="">all stickers</a>
                </li>
                <li class="link-sm2">
                  <a href="">magnets</a>
                </li>
              </ul>
            </li>
    
            <li class="link-sm">
              <a href="">phone cases</a>
              <div class="link-sm-btn">
                <iconify-icon icon="bx:caret-down" class="plus1"></iconify-icon>
                <iconify-icon icon="bx:caret-up" class="minus1"></iconify-icon>
              </div>
              <ul class="list-unstyled p-0 sub-menu-sm">
                <li class="link-sm2">
                  <a href="">all phone cases</a>
                </li>
                <li class="link-sm2">
                  <a href="">iphone cases</a>
                </li>
                <li class="link-sm2">
                  <a href="">samsung galaxy</a>
                </li>
              </ul>
            </li>
            <li class="link-sm">
              <a href="">wall art</a>
              <div class="link-sm-btn">
                <iconify-icon icon="bx:caret-down" class="plus1"></iconify-icon>
                <iconify-icon icon="bx:caret-up" class="minus1"></iconify-icon>
              </div>
              <ul class="list-unstyled p-0 sub-menu-sm">
                <li class="link-sm2">
                  <a href="">all wall art</a>
                </li>
                <li class="link-sm2">
                  <a href="">art board prints</a>
                </li>
                <li class="link-sm2">
                  <a href="">art prints</a>
                </li>
                <li class="link-sm2">
                  <a href="">press release</a>
                </li>
    
                <li class="link-sm2">
                  <a href="">csr</a>
                </li>
                <li class="link-sm2">
                  <a href="career.html">career</a>
                </li>
                <li class="link-sm2">
                  <a href="contact.html">contact us</a>
                </li>
              </ul>
            </li>
            <li class="link-sm">
              <a href="">home & living</a>
              <div class="link-sm-btn">
                <iconify-icon icon="bx:caret-down" class="plus1"></iconify-icon>
                <iconify-icon icon="bx:caret-up" class="minus1"></iconify-icon>
              </div>
              <ul class="list-unstyled p-0 sub-menu-sm"></ul>
            </li>
            <li class="link-sm">
              <a href="">kids & babies</a>
              <div class="link-sm-btn">
                <iconify-icon icon="bx:caret-down" class="plus1"></iconify-icon>
                <iconify-icon icon="bx:caret-up" class="minus1"></iconify-icon>
              </div>
              <ul class="list-unstyled p-0 sub-menu-sm"></ul>
            </li>
            <li class="link-sm">
              <a href="">Pets</a>
              <div class="link-sm-btn">
                <iconify-icon icon="bx:caret-down" class="plus1"></iconify-icon>
                <iconify-icon icon="bx:caret-up" class="minus1"></iconify-icon>
              </div>
              <ul class="list-unstyled p-0 sub-menu-sm"></ul>
            </li>
            <li class="link-sm">
              <a href="">Accessories</a>
              <div class="link-sm-btn">
                <iconify-icon icon="bx:caret-down" class="plus1"></iconify-icon>
                <iconify-icon icon="bx:caret-up" class="minus1"></iconify-icon>
              </div>
              <ul class="list-unstyled p-0 sub-menu-sm"></ul>
            </li>
            <li class="link-sm">
              <a href="">Stationary & office</a>
              <div class="link-sm-btn">
                <iconify-icon icon="bx:caret-down" class="plus1"></iconify-icon>
                <iconify-icon icon="bx:caret-up" class="minus1"></iconify-icon>
              </div>
              <ul class="list-unstyled p-0 sub-menu-sm"></ul>
            </li>
            <li class="link-sm">
              <a href="">gifts</a>
              <div class="link-sm-btn">
                <iconify-icon icon="bx:caret-down" class="plus1"></iconify-icon>
                <iconify-icon icon="bx:caret-up" class="minus1"></iconify-icon>
              </div>
              <ul class="list-unstyled p-0 sub-menu-sm"></ul>
            </li>
            <li class="link-sm">
              <a href="">Explore Designs</a>
              <div class="link-sm-btn">
                <iconify-icon icon="bx:caret-down" class="plus1"></iconify-icon>
                <iconify-icon icon="bx:caret-up" class="minus1"></iconify-icon>
              </div>
              <ul class="list-unstyled p-0 sub-menu-sm"></ul>
            </li>
          </ul>
        </div>
      </header>
      <nav class="menu_bar">
        <div class="container-fluid">
          <div class="menu">
            <ul class="list-unstyled p-0 m-0">
              {{-- <li><a href="">phone cases</a>
                <div class="sub-menu">
                  <ul class="list-unstyled p-0 m-0">
                    <li><a href="">all stickers</a></li>
                    <li><a href="">magnets</a></li>
                    
                  </ul>
                </div>
              </li> --}}
              @foreach ($Externalcategory as $item)
              <li><a href="{{route('category_wise_list', $item->slug)}}">{{$item->name}}</a></li>
              @endforeach
              
              {{-- <li><a href="">home & living</a></li>
              <li><a href="">kids & babies</a></li>
              <li><a href="">pets</a></li>
              <li><a href="">accessories</a></li>
              <li><a href="">stationery & office</a></li>
              <li><a href="">gifts</a></li>
              <li><a href="">explore & designs</a></li> --}}
            </ul>
          </div>
        </div>
      </nav>


        @yield('content')

       
        <section class="footer_top">
          <div class="container-fluid">
            <div class="row justify-content-between">
              <div class="col-sm-6">
                <h2>We’d like to <span>Talk</span></h2>
                <div class="text">See Everything About Your Users At One Place</div>
              </div>
              <div class="col-sm-5">
                <form class="signup__form" id="newsletter">
                  <input
                    required
                    id="email"
                    type="email"
                    placeholder="Your e-mail"
                  />
                  <button form="newsletter" type="submit" class="signup_btn">
                    Subscribe to us
                  </button>
                </form>
              </div>
            </div>
          </div>
        </section>
    
        <footer class="main__footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12 col-md-3">
                <div class="footer_item mb-4">
                  <h3>About Us</h3>
                  <p>The world’s first and largest digital marketplace for crypto collectibles and non-fungible tokens (NFTs). Buy</p>
                  <div class="address">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    254 Lillian Blvd, Holbrook
                  </div>
                  <div class="address">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone-call"><path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    1-800-654-3210
                  </div>
                </div>
              </div>
              <div class="col-6 col-md-3">
                <div class="footer_item mb-4">
                  <h3>About</h3>
                  <ul class="mb-0">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Social Responsibility</a></li>
                    <li><a href="#">Partner Program</a></li>
                    <li><a href="#">Affiliates</a></li>
                    <li><a href="#">Sell your art</a></li>
                    <li><a href="#">Jobs</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-6 col-md-3">
                <div class="footer_item mb-4">
                  <h3>Help</h3>
                  <ul class="mb-0">
                    <li><a href="#">Delivery</a></li>
                    <li><a href="#">Returns</a></li>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Guidelines</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Cookie Settings</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-12 col-md-3">
                <div class="footer_item mb-4 footer-flex">
                  <h3>Download</h3>
                  <ul class="mb-0">
                    <li>
                      <a href="#"
                        ><img
                          src="https://www.redbubble.com/explore/client/a111d9769165e4f4559f20e6303ce781.svg"
                          alt=""
                      /></a>
                    </li>
                    <li>
                      <a href="#"
                        ><img
                          src="https://www.redbubble.com/explore/client/55f4aa18d6f90c657bcf3f71fe85c621.png"
                          alt=""
                      /></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </footer>
        <!-- main__footer -->
    
        <section class="copy_right_area">
          <div class="container-fluid">
            <div class="row justify-content-md-between justify-content-center">
              <div class="col-auto align-self-center">
                <p class="mb-0">©All Rights Reserved 2023</p>
              </div>
              <div class="col-auto align-self-center">
                <ul class="footer_social mb-0 d-flex">
                  <li>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                  </li>
    
                  <li>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>
        <!-- Optional JavaScript -->
    
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="{{asset('website/js/bootstrap.min.js')}}"></script>
        <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
        <script type="text/javascript" src="{{asset('website/js/slick.min.js')}}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @yield('scripts')
        @stack('scripts')
        <script>
          const header = document.querySelector("header");
          const bars = document.querySelector(".bars");
          const times = document.querySelector(".times");
          const sidebar = document.querySelector(".sidebar");
          const linkSm2All = document.querySelectorAll(".link-sm-btn2");
          const plus1All = document.querySelectorAll(".plus1");
          const minus1All = document.querySelectorAll(".minus1");
          const plus2All = document.querySelectorAll(".plus2");
          const minus2All = document.querySelectorAll(".minus2");
          const subMenuInnerAll = document.querySelectorAll(".sub-menu-inner");
          const subMenuSmAll = document.querySelectorAll(".sub-menu-sm");
          const linkSmBtns = document.querySelectorAll(".link-sm-btn");
    
          bars.addEventListener("click", (e) => {
            header.classList.add("show-menu");
          });
    
          times.addEventListener("click", (e) => {
            header.classList.remove("show-menu");
          });
    
          minus1All.forEach((minus1) => {
            minus1.style.display = "none";
          });
          minus2All.forEach((minus2) => {
            minus2.style.display = "none";
          });
    
          linkSmBtns.forEach((linkSmBtn) => {
            linkSmBtn.addEventListener("click", (e) => {
              console.log(e.target.nextElementSibling);
              linkSmBtn.nextElementSibling.classList.toggle("active");
              const plus1 = linkSmBtn.children[0];
              const minus1 = linkSmBtn.children[1];
              if (linkSmBtn.nextElementSibling.classList.contains("active")) {
                plus1.style.display = "none";
                minus1.style.display = "block";
              } else {
                plus1.style.display = "block";
                minus1.style.display = "none";
              }
    
              subMenuInnerAll.forEach((subMenuInner) => {
                if (subMenuInner.classList.contains("active2")) {
                  subMenuInner.classList.remove("active2");
                  plus2All.forEach((plus2) => {
                    plus2.style.display = "block";
                  });
                  minus2All.forEach((minus2) => {
                    minus2.style.display = "none";
                  });
                }
              });
            });
          });
    
          linkSm2All.forEach((linkSm2) => {
            linkSm2.addEventListener("click", (e) => {
              //  console.log(linkSm2.nextElementSibling);
              linkSm2.nextElementSibling.classList.toggle("active2");
              // console.log(linkSm2.children[0]);
              const plus2 = linkSm2.children[0];
              const minus2 = linkSm2.children[1];
              if (linkSm2.nextElementSibling.classList.contains("active2")) {
                plus2.style.display = "none";
                minus2.style.display = "block";
              } else {
                plus2.style.display = "block";
                minus2.style.display = "none";
              }
            });
          });
        </script>
    
        <!-- <script>
          
          window.addEventListener("scroll", (e) => {
            if (scrollY > 1) {
              header.classList.add("fixed");
            } else {
              header.classList.remove("fixed");
            }
          });
        </script> -->
    
        <script type="text/javascript">
          var bannerSearchBoxHeight = $(".banner_search_form").outerHeight();
          bannerBottomPadding = bannerSearchBoxHeight + 30;
          $(document).ready(function () {
            $(".banner__area").css({ "padding-bottom": bannerBottomPadding });
          });
    
          jQuery(window).on("scroll", function () {
            if (jQuery(window).scrollTop() > 66) {
              jQuery(".main__header").addClass("sticky");
            } else {
              jQuery(".main__header").removeClass("sticky");
            }
          });
    
          // Services Slider
    
          $(".services__slider").slick({
            slidesToShow: 3,
            dots: false,
            arrows: true,
            autoplay: true,
            nextArrow:
              '<button class="slider_arrow_right"><img class="img-fluid" src="images/slider-right-arrow.svg"></button>',
            prevArrow:
              '<button class="slider_arrow_left"><img class="img-fluid" src="images/slider-left-arrow.svg"></button>',
            responsive: [
              {
                breakpoint: 992,
                settings: {
                  slidesToShow: 2,
                },
              },
              {
                breakpoint: 481,
                settings: {
                  slidesToShow: 1,
                },
              },
            ],
          });
    
          // Testimonial Slider
    
          $(".testimonila__slider").slick({
            slidesToShow: 3,
            dots: false,
            infinite: true,
            arrows: false,
            nextArrow:
              '<button class="slider_arrow_right"><img class="img-fluid" src="images/slider-right-arrow.svg"></button>',
            prevArrow:
              '<button class="slider_arrow_left"><img class="img-fluid" src="images/slider-left-arrow.svg"></button>',
            responsive: [
              {
                breakpoint: 992,
                settings: {
                  slidesToShow: 2,
                },
              },
              {
                breakpoint: 768,
                settings: {
                  slidesToShow: 1,
                },
              },
            ],
          });
          
        </script>
        <script>
          	const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
        </script>
            
        @if(session()->has('response') && session()->get('response') == 1)
          <script>
            Toast.fire({
              icon: 'success',
              title: "<small>{{session()->get('message')}}</small>"
            })
          </script>	
        @endif

        @if(session()->has('response') && session()->get('response') == 0)
          <script>
            Toast.fire({
              icon: 'error',
              title: "<small>{{session()->get('message')}}</small>"
            })
          </script>	
        @endif
       
      </body>
    </html>