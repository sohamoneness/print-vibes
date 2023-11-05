@extends('layout.app')
@section('content')

      <div class="dashboard-content">
        <div class="dashboard-content-inner">
          <div class="row">
            <div class="col-12 col-lg-8 col-md-12 m-auto">
              <div class="dashboard-account-container">
                <div class="dashboard-account-header">
                  <h4 class="mb-0">Forgot Password :</h4>
                </div>
                <div class="account-img">
                  <img src="{{ asset('images/account-profile-pic.png')}}" alt="" />
                  <div class="edit-btn">
                    <i class="fa-solid fa-pen"></i>
                  </div>
                </div>

                @if (session('change_password_success_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('change_password_success_message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('change_password_error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('change_password_error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="account-form">
                  <form action="{{ route('sendResetLink') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                      <div class="col-12 col-md-12">
                            <label for="">Email</label>
                            <input type="email" name="email" placeholder="Email" class="form-control" />
                            @error('email')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                      </div>
                      <div class="col-12">
                        <button class="account-btn">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection

@push('scripts')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"
    integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="js/app.js"></script>

  <script>
    $(document).ready(function(){
        $('.alert-dismissible').on('click', function(){
            $(this).removeClass('show');
        });
    });
</script>

  <script>
    const sideBar = document.querySelector(".sidebar");
    const dashRight = document.querySelector(".dashboard-right");
    const dashBars = document.querySelector(".dash-header-left");
    const overlaySidebar = document.querySelector(".overlay-sidebar");

    overlaySidebar.addEventListener("click", (e) => {
      sideBar.classList.add("show-sidebar-dashboard");
      dashRight.classList.add("margin-init");
      overlaySidebar.classList.remove("show-overlay");
    });

    dashBars.addEventListener("click", (e) => {
      // console.log('ff')
      sideBar.classList.toggle("show-sidebar-dashboard");
      dashRight.classList.toggle("margin-init");
      overlaySidebar.classList.add("show-overlay");
    });

    var x = window.matchMedia("(max-width: 990px)");
    myFunction(x);
    x.addEventListener("change", myFunction);

    function myFunction(x) {
      if (x.matches) {
        // If media query matches
        sideBar.classList.add("show-sidebar-dashboard");
        dashRight.classList.add("margin-init");
      } else {
        sideBar.classList.remove("show-sidebar-dashboard");
        dashRight.classList.remove("margin-init");
      }
    }

    const sidebarLinks = document.querySelectorAll(".sidebar-submenu-toggle");

    sidebarLinks.forEach((sidebarLink) => {
      sidebarLink.addEventListener("click", (e) => {
        const submenuInner = sidebarLink.children[1];

        if (submenuInner.style.maxHeight) {
          submenuInner.style.maxHeight = null;
        } else {
          submenuInner.style.maxHeight = submenuInner.scrollHeight + "px";
        }
      });
    });
  </script>
  @endpush