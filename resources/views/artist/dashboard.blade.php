@extends('artist.layout.app')
@section('content')
@php
$today = date("Y-m-d");
$artist_id = Auth::user()->id;
$total_visitors = App\Models\Visitor::where('artist_id',$artist_id)->get();
$today_visitors = App\Models\Visitor::where('artist_id',$artist_id)->where('created_at','like',$today.'%')->get();
$total_orders = App\Models\UserTransaction::where('user_id',$artist_id)->get();
$today_orders = App\Models\UserTransaction::where('user_id',$artist_id)->where('created_at','like',$today.'%')->get();
$total_sales = App\Models\UserTransaction::where('user_id',$artist_id)->sum('commission_amount');
$today_sales = App\Models\UserTransaction::where('user_id',$artist_id)->where('created_at','like',$today.'%')->sum('commission_amount');
$total_followers = App\Models\Follower::where('user_id',$artist_id)->with('followed_by')->get();
$total_designs = App\Models\Design::where('user_id',$artist_id)->get();
$follower_list = DB::select("select followers.*, users.name, users.email
                              from followers join users
                              on (followers.followed_by = users.id)
                              where followers.user_id=$artist_id");
@endphp
  <div class="dashboard-content">
    <div class="dashboard-content-inner">
      <h4>Dashboard</h4>
      <div class="row g-3">
        <div class="col-12 col-lg-3 col-md-6">
          <div class="dashboard-item">
            <a href="">
              <div class="dashboard-item-img">
                <img src="images/visitor.png" alt="" />
              </div>
              <div class="dashboard-item-info">
                <h5>{{count($total_visitors)}}</h5>
                <span>Total Visitors</span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-12 col-lg-3 col-md-6">
          <div class="dashboard-item">
            <a href="">
              <div class="dashboard-item-img">
                <img src="images/visitor.png" alt="" />
              </div>
              <div class="dashboard-item-info">
                <h5>{{count($today_visitors)}}</h5>
                <span>Today's Visitors</span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-12 col-lg-3 col-md-6">
          <div class="dashboard-item">
            <a href="">
              <div class="dashboard-item-img">
                <img src="images/visitor.png" alt="" />
              </div>
              <div class="dashboard-item-info">
                <h5>{{count($total_orders)}}</h5>
                <span>Total Orders</span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-12 col-lg-3 col-md-6">
          <div class="dashboard-item">
            <a href="">
              <div class="dashboard-item-img">
                <img src="images/visitor.png" alt="" />
              </div>
              <div class="dashboard-item-info">
                <h5>{{count($today_orders)}}</h5>
                <span>Today's Orders</span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-12 col-lg-3 col-md-6">
          <div class="dashboard-item dashboard-item-bg">
            <a href="">
              <div class="dashboard-item-img">
                <img src="images/leads.png" alt="" />
              </div>
              <div class="dashboard-item-info">
                <h5>₹{{$total_sales}}</h5>
                <span>Total Sales</span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-12 col-lg-3 col-md-6">
          <div class="dashboard-item dashboard-item-bg">
            <a href="">
              <div class="dashboard-item-img">
                <img src="images/leads.png" alt="" />
              </div>
              <div class="dashboard-item-info">
                <h5>₹{{$today_sales}}</h5>
                <span>Today's Sales</span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-12 col-lg-3 col-md-6">
          <div class="dashboard-item dashboard-item-bg">
            <a href="">
              <div class="dashboard-item-img">
                <img src="images/order-icon.png" alt="" />
              </div>
              <div class="dashboard-item-info">
                <h5>{{count($total_followers)}}</h5>
                <span>Total Followers</span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-12 col-lg-3 col-md-6">
          <div class="dashboard-item dashboard-item-bg">
            <a href="">
              <div class="dashboard-item-img">
                <img src="images/sells-icon.png" alt="" />
              </div>
              <div class="dashboard-item-info">
                <h5>{{count($total_designs)}}</h5>
                <span>Total Designs</span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="dashboard-content-inner">
      <div class="row g-4">
        <div class="col-12 col-md-6 mb-5">
          <h4>Sales Report</h4>
          <div class="dashboard-chart-item">
            <canvas id="myChart"></canvas>
          </div>
        </div>
        <div class="col-12 col-md-6 mb-5">
          <h4>Visitor Report</h4>
          <div class="dashboard-chart-item">
            <canvas id="myChart2"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="dashboard-content-inner">
      <h4>List of Recent Transactions</h4>
      <div class="row g-3">
        <div class="col-12">
          <div class="dashboard-table">
            <div class="table-responsive">
              <table class="table table-stiped table-hovered">
                <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Comment</th>
                    <th>Status</th>
                  </tr>
                </thead>

                <tbody>
                  @php
                  $srNo = 1;
                  @endphp
                  @foreach($total_orders as $key => $order)
                  <tr>
                    <td>{{$srNo}}</td>
                    <td>{{date("d-M-Y",strtotime($order->created_at))}}</td>
                    <td>₹{{$order->commission_amount}}</td>
                    <td>{{$order->comment}}</td>
                    <td><span class="status pending">Deduct</span></td>
                  </tr>
                  @php
                  $srNo += 1;
                  @endphp
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="dashboard-content-inner">
      <h4>List of Recent Followers</h4>
      <div class="row g-3">
        <div class="col-12">
          <div class="dashboard-table">
            <div class="table-responsive">
              <table class="table table-stiped table-hovered">
                <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email Id</th>
                  </tr>
                </thead>

                <tbody>
                  @php
                  $srNo = 1;
                  @endphp
                  @foreach($follower_list as $key => $follow)
                  <tr>
                    <td>{{$srNo}}</td>
                    <td>{{date("d-M-Y",strtotime($follow->created_at))}}</td>
                    <td>{{$follow->name}}</td>
                    <td>{{$follow->email}}</td>
                  </tr>
                  @php
                  $srNo += 1;
                  @endphp
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
<script
src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
crossorigin="anonymous"
referrerpolicy="no-referrer"
></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"
integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA=="
crossorigin="anonymous"
referrerpolicy="no-referrer"
></script>
<script src="js/app.js"></script>

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

let myChart = document.getElementById("myChart").getContext("2d");
let myChart2 = document.getElementById("myChart2").getContext("2d");

let massPopChart = new Chart(myChart, {
  type: "bar",
  data: {
    labels: [
      "Jan",
      "Feb",
      "Mar",
      "April",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec",
    ],

    datasets: [
      {
        label: "Sales Report",
        backgroundColor: "#e72077",
        data: [
          0, 0, 0, 0, 0, 0, {{$total_sales}}, 0, 0, 0, 0, 0,
        ],
      },
    ],
  },
  option: {},
});
//  massPopChart.destroy();
let massPopChart2 = new Chart(myChart2, {
  type: "bar",
  data: {
    labels: [
      "Jan",
      "Feb",
      "Mar",
      "April",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec",
    ],
    datasets: [
      {
        label: "Visitor Report",
        backgroundColor: "#e72077",
        data: [
          0, 0, 0, 0, 0, 0, {{count($total_visitors)}}, 0, 0, 0, 0, 0,
        ],
      },
    ],
  },
  option: {},
});
</script>
@endpush