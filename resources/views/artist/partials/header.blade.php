<header>
    <nav>
      <div class="container container-flex">
        <div class="bars"><i class="fa-solid fa-bars"></i></div>
        <div class="logo">
          <a href="/">
            <img src="images/logo.png" alt="" class="logo-white"/>
            <img src="images/logo.png" alt="" class="logo-dark">
          </a>
        </div>
        <div class="nav-right">
          <div class="overlay"></div>
          <ul class="list-unstyled p-0 m-0">
            <div class="times">
              <i class="fa-solid fa-xmark"></i>
            </div>
            <li><a href="javascript:void(0);">Home</a></li>
            <li><a href="javascript:void(0);">About Us</a></li>
            <li><a href="javascript:void(0);">Contact Us</a></li>
            
          </ul>

          <a href="{{ route('artist.register') }}" class="sign-up-lg"
            ><i class="fa-solid fa-user"></i> <span>sign up</span></a
          >

          <a href="{{ route('artist.login') }}" class="sign-up-lg"
            ><i class="fa-solid fa-right-to-bracket"></i>
            <span>Login</span></a
          >
        </div>
      </div>
    </nav>
  </header>