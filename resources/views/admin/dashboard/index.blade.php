@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
@php
$users = App\Models\User::where('status','1')->get();
$new_orders = App\Models\Order::where('status','1')->get();
$ongoing_orders = App\Models\Order::whereIn('status',array('2','3','4','5','6','7'))->get();
$delivered_orders = App\Models\Order::where('status','8')->get();
$cancelled_orders = App\Models\Order::where('status','10')->get();
$restaurants = App\Models\Restaurant::where('status','1')->get();

$orders = App\Models\Order::where('status','1')->where('is_deleted',0)->orderBy('id','desc')->take(10)->get();

$sales_data = array();

$sales_data_result = DB::select("SELECT restaurant_id, round(sum(total_amount)) as t_amount from orders
group by orders.restaurant_id order by t_amount desc limit 10");

foreach($sales_data_result as $sales){
    $restaurant_id = $sales->restaurant_id;

    $restaurant_data_result = DB::select("select * from restaurants where id='$restaurant_id'");

    $restaurant_name = $restaurant_data_result[0]->name;

    $sales->restaurant_name = $restaurant_name;

    array_push($sales_data,$sales);
}

$order_data = array();

$order_data_result = DB::select("SELECT restaurant_id, round(count(id)) as t_order from orders
group by orders.restaurant_id order by t_order desc limit 10");

foreach($order_data_result as $order){
    $restaurant_id = $order->restaurant_id;

    $restaurant_data_result = DB::select("select * from restaurants where id='$restaurant_id'");

    $restaurant_name = $restaurant_data_result[0]->name;

    $order->restaurant_name = $restaurant_name;

    array_push($order_data,$order);
}

 

@endphp
<style type="text/css">
    .row-md-body.no-nav {
    margin-top: 30px;
}
</style>
<div class="fixed-row">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
    </div>
</div>
    <div class="row section-mg row-md-body no-nav">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon">
                <i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Active Users</h4>
                    <p><b> {{count($users)}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>New Orders</h4>
                    <p><b>{{count($new_orders)}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Ongoing Orders</h4>
                    <p><b>{{count($ongoing_orders)}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Delivered Orders</h4>
                    <p><b>{{count($delivered_orders)}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Cancelled Orders</h4>
                    <p><b>{{count($cancelled_orders)}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Active Restaurants</h4>
                    <p><b>{{count($restaurants)}} </b></p>
                </div>
            </div>
        </div>
    </div>
    <h4>Latest 10 New Orders</h4>
    <div class="row">
        <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover custom-data-table-style table-striped" id="sampleTable">
                        <thead>
                            <tr> 
                                <th>Order No</th>
                                <th>Order Date</th>
                                <th>Restaurant</th>
                                <th>Customer Details</th>
                                <th>Order Amount </th> 
                                <th>Call</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $key => $order)
                                <tr> 
                                <td><a href="#" data-toggle="modal" data-target="#orderdetails_{{ $order->unique_id }}">{{ $order->unique_id }}</a></td>

                                    <td>{{ date("d-M-Y h:i a",strtotime($order->created_at))}}</td>
                                    <td>{{ $order->restaurant->name }}</td>
                                    <td>{{ $order->name }}<br>Mobile : <br>{{ $order->mobile }}</td>
                                    <td>Rs. {{ $order->total_amount }}</td>
                                    <td>  
                            <div class="dropdown">
                            <button class="call_menu dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_207_14)">
                                        <path d="M14.6667 11.28V13.28C14.6674 13.4657 14.6294 13.6494 14.555 13.8196C14.4806 13.9897 14.3715 14.1424 14.2347 14.2679C14.0979 14.3934 13.9364 14.489 13.7605 14.5485C13.5846 14.608 13.3983 14.63 13.2133 14.6133C11.1619 14.3904 9.19134 13.6894 7.46001 12.5667C5.84923 11.5431 4.48356 10.1774 3.46001 8.56667C2.33333 6.82747 1.63217 4.84733 1.41334 2.78667C1.39668 2.60231 1.41859 2.41651 1.47767 2.24108C1.53676 2.06566 1.63172 1.90446 1.75652 1.76775C1.88131 1.63103 2.03321 1.5218 2.20253 1.44701C2.37186 1.37222 2.5549 1.33351 2.74001 1.33333H4.74001C5.06354 1.33015 5.3772 1.44472 5.62251 1.65569C5.86783 1.86666 6.02806 2.15963 6.07334 2.48C6.15775 3.12004 6.31431 3.74848 6.54001 4.35333C6.6297 4.59195 6.64911 4.85127 6.59594 5.10059C6.54277 5.3499 6.41925 5.57874 6.24001 5.76L5.39334 6.60667C6.34238 8.2757 7.72431 9.65763 9.39334 10.6067L10.24 9.76C10.4213 9.58076 10.6501 9.45723 10.8994 9.40406C11.1487 9.35089 11.4081 9.3703 11.6467 9.46C12.2515 9.6857 12.88 9.84225 13.52 9.92667C13.8439 9.97235 14.1396 10.1355 14.351 10.385C14.5624 10.6345 14.6748 10.953 14.6667 11.28Z" stroke="#F05225" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_207_14">
                                            <rect width="16" height="16" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                            <div class="dropdown-menu call_dropdown_menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="tel:{{$order->restaurant->mobile}}">
                                    <span class="call_icon">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_207_14)">
                                                <path d="M14.6667 11.28V13.28C14.6674 13.4657 14.6294 13.6494 14.555 13.8196C14.4806 13.9897 14.3715 14.1424 14.2347 14.2679C14.0979 14.3934 13.9364 14.489 13.7605 14.5485C13.5846 14.608 13.3983 14.63 13.2133 14.6133C11.1619 14.3904 9.19134 13.6894 7.46001 12.5667C5.84923 11.5431 4.48356 10.1774 3.46001 8.56667C2.33333 6.82747 1.63217 4.84733 1.41334 2.78667C1.39668 2.60231 1.41859 2.41651 1.47767 2.24108C1.53676 2.06566 1.63172 1.90446 1.75652 1.76775C1.88131 1.63103 2.03321 1.5218 2.20253 1.44701C2.37186 1.37222 2.5549 1.33351 2.74001 1.33333H4.74001C5.06354 1.33015 5.3772 1.44472 5.62251 1.65569C5.86783 1.86666 6.02806 2.15963 6.07334 2.48C6.15775 3.12004 6.31431 3.74848 6.54001 4.35333C6.6297 4.59195 6.64911 4.85127 6.59594 5.10059C6.54277 5.3499 6.41925 5.57874 6.24001 5.76L5.39334 6.60667C6.34238 8.2757 7.72431 9.65763 9.39334 10.6067L10.24 9.76C10.4213 9.58076 10.6501 9.45723 10.8994 9.40406C11.1487 9.35089 11.4081 9.3703 11.6467 9.46C12.2515 9.6857 12.88 9.84225 13.52 9.92667C13.8439 9.97235 14.1396 10.1355 14.351 10.385C14.5624 10.6345 14.6748 10.953 14.6667 11.28Z" stroke="#F05225" stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_207_14">
                                                    <rect width="16" height="16" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg></span>
                                    <span>
                                        <small>Call Restaurant</small>
                                          {{$order->restaurant->mobile}} 
                                    </span>
                                </a>
                                <a class="dropdown-item" href="tel:{{$order->mobile}}">
                                    <span class="call_icon"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_207_14)">
                                                <path d="M14.6667 11.28V13.28C14.6674 13.4657 14.6294 13.6494 14.555 13.8196C14.4806 13.9897 14.3715 14.1424 14.2347 14.2679C14.0979 14.3934 13.9364 14.489 13.7605 14.5485C13.5846 14.608 13.3983 14.63 13.2133 14.6133C11.1619 14.3904 9.19134 13.6894 7.46001 12.5667C5.84923 11.5431 4.48356 10.1774 3.46001 8.56667C2.33333 6.82747 1.63217 4.84733 1.41334 2.78667C1.39668 2.60231 1.41859 2.41651 1.47767 2.24108C1.53676 2.06566 1.63172 1.90446 1.75652 1.76775C1.88131 1.63103 2.03321 1.5218 2.20253 1.44701C2.37186 1.37222 2.5549 1.33351 2.74001 1.33333H4.74001C5.06354 1.33015 5.3772 1.44472 5.62251 1.65569C5.86783 1.86666 6.02806 2.15963 6.07334 2.48C6.15775 3.12004 6.31431 3.74848 6.54001 4.35333C6.6297 4.59195 6.64911 4.85127 6.59594 5.10059C6.54277 5.3499 6.41925 5.57874 6.24001 5.76L5.39334 6.60667C6.34238 8.2757 7.72431 9.65763 9.39334 10.6067L10.24 9.76C10.4213 9.58076 10.6501 9.45723 10.8994 9.40406C11.1487 9.35089 11.4081 9.3703 11.6467 9.46C12.2515 9.6857 12.88 9.84225 13.52 9.92667C13.8439 9.97235 14.1396 10.1355 14.351 10.385C14.5624 10.6345 14.6748 10.953 14.6667 11.28Z" stroke="#F05225" stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_207_14">
                                                    <rect width="16" height="16" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg></span>
                                    <span>
                                        <small>Call Customer</small>
                                        {{$order->mobile}} 
                                    </span>
                                </a> 
                            </div>
                        </div> 
                            </td>           
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> 
        </div>
    </div>

    @foreach($orders as $key => $order)
        <div class="modal fade order_modal" id="orderdetails_{{ $order->unique_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-7 border-right">
                                        <div class="customer_details">
                                            <div class="row mb-3 order_info">
                                                <div class="col-sm-4">
                                                    <label>Order ID</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    {{ $order->unique_id }}
                                                </div>
                                            </div>
                                            <div class="row mb-3 order_info">
                                                <div class="col-sm-4">
                                                    <label>Restaurant</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    {{ $order->restaurant->name }}
                                                </div>
                                            </div>
                                            <div class="row mb-3 order_info">
                                                <div class="col-sm-4">
                                                    <label>Customer Details</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    {{$order->name}}<br>Email : {{$order->email}} <br> Mobile No : {{$order->mobile}}
                                                </div>
                                            </div>
                                            <div class="row mb-3 order_info">
                                                <div class="col-sm-4">
                                                    <label>Delivery Address</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    {{$order->delivery_address}}<br>Landmark : {{$order->delivery_landmark}}<br>{{$order->delivery_city}} - {{$order->delivery_pin}}
                                                </div>
                                            </div>
                                            <div class="row mb-3 order_info">
                                                <div class="col-sm-4">
                                                    <label>Order Status </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    @if($order->status==1)
                                                    New Order
                                                    @elseif($order->status==2)
                                                    Accepted Order
                                                    @elseif($order->status==3)
                                                    Delivery Boy Assigned
                                                    @elseif($order->status==4)
                                                    Order On Process
                                                    @elseif($order->status==5)
                                                    Order Delivered
                                                    @elseif($order->status==6)
                                                    Order Cancelled
                                                    @endif
                                                </div>
                                            </div>
                                           
                                            @if($order->paid_online)
                                            <div class="row mb-3 order_info">
                                                <div class="col-sm-4">
                                                    <label>Paid Online</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    ₹ {{ $order->paid_online }}
                                                </div>
                                            </div>
                                            @endif
                                            @if($order->paid_by_wallet)
                                            <div class="row mb-3 order_info">
                                                <div class="col-sm-4">
                                                    <label>Paid By Wallet</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    ₹ {{ $order->paid_by_wallet }}
                                                </div>
                                            </div>
                                            @endif  
                                            <div class="row mb-3 order_info">
                                                <div class="col-sm-4">
                                                    <label>Order Amount</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    ₹ {{ $order->total_amount }}
                                                </div>
                                            </div>
                                            <div class="row mb-3 order_info">
                                                <div class="col-sm-4">
                                                    <label>Transaction ID</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    {{ $order->transaction_id }}
                                                </div>
                                            </div>
 

                                            <div class="row mb-3 order_info">
                                                <div class="col-sm-4">
                                                    <label>Order Placed on </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    {{ date("d-M-Y h:i a",strtotime($order->created_at))}}
                                                </div>
                                            </div>
                                            <hr />  
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                                        <div class="cart_summary">
                                                            <h4 class="m-0">{{count($order->items)}} Items in this Order</h4>
                                                            <table class="cart_summary_table"> 
                                                            @foreach($order->items as $item)
                                                            <tr>
                                                                <td colspan="2">{{$item->product_name}} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{$item->quantity}} x <span>₹ {{$item->price}}</span></td>
                                                                <td align="right">₹ {{$item->price*$item->quantity}}</td>
                                                            </tr>
                                                            @endforeach
                                                            </table>

                                                            @if($order->notes)
                                                                <div class="order_note">
                                                                {{ $order->notes }}
                                                                </div>
                                                                @endif


                                                     <h4>Summary</h4>
                                                     <table class="summary_table">
                                                     <tbody>
                                                        <tr>
                                                            <td>Subtotal</td>
                                                            <td align="right"><span>₹ {{$order->amount}}</span></td>
                                                        </tr> 
                                                        <tr>
                                                            <td>Delivery Fee</td>
                                                            <td align="right"><span>₹ {{$order->delivery_charge}}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Delivery Tips</td>
                                                            <td align="right"><span>₹ {{($order->tips ? $order->tips : 0)}}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Govt Taxes</td>
                                                            <td align="right"><span>₹ {{$order->tax_amount}}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Packing Charge</td>
                                                            <td align="right"><span>₹ {{$order->packing_price}}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Discount <span> </span></td>
                                                            <td align="right"><span class="reduce">- ₹ {{$order->discounted_amount}}</span></td>
                                                        </tr>
                                                     </tbody>
                                                     <tfoot>
                                                        <tr>
                                                            <td>Total</td>
                                                            <td align="right">₹ {{$order->total_amount}}</td>
                                                        </tr>
                                                     </tfoot>
                                                   </table>  
   
                                                   @if($order->status == "1")
                                                    <a href="{{route('admin.order.restaurantForceAccept', $order->id)}}" class="btn btn-submit btn-block" onclick="openAsignportal();">Place order manually</a>
                                                   @endif 
                                                   <a href="{{route('admin.order.details', $order->id)}}" class="btn btn-submit btn-block" onclick="openAsignportal();">View Details</a>

                                                    </div>
                                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                </div>
                    @endforeach 
 
    <h4>Restaurant Wise Sales & Orders Report</h4>
    <div class="row section-mg row-md-body no-nav">
        <div class="col-md-6 col-lg-6">
            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
        </div>
        <div class="col-md-6 col-lg-6">
            <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>
        </div>
    </div>
    <div class="row section-mg row-md-body no-nav">

        <div class="col-md-6 col-lg-6">
        <div class="table-responsive">
            <table class="table table-hover custom-data-table-style table-striped" id="sampleTable">
                <thead>
                    <tr>
                        <th>Restaurant</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sales_data as $key => $s)
                        <tr>
                            <td>{{$s->restaurant_name}}</td>
                            <td>Rs. {{$s->t_amount}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
        <div class="col-md-6 col-lg-6">
        <div class="table-responsive">
            <table class="table table-hover custom-data-table-style table-striped" id="sampleTable">
                <thead>
                    <tr>
                        <th>Restaurant</th>
                        <th>Total Orders</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order_data as $key => $s)
                        <tr>
                            <td>{{$s->restaurant_name}}</td>
                            <td>{{$s->t_order}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>

@php
$stores1 = array();
$sales_values1 = array();
foreach($sales_data as $s){
    array_push($stores1,$s->restaurant_name);
    array_push($sales_values1,$s->t_amount);
}

$users1 = array();
$sales_values2 = array();
foreach($order_data as $s){
    array_push($users1,$s->restaurant_name);
    array_push($sales_values2,$s->t_order);
}

@endphp
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
var xValues = [];
var yValues = [];
xValues = <?php echo json_encode($stores1); ?>;
console.log("stores1>>",xValues);
yValues = <?php echo json_encode($sales_values1); ?>;
console.log("stores1>>",yValues);
var barColors = ["red", "green","blue","orange","brown"];


new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Restaurant Wise Sales"
    }
  }
});
</script>
<script>
var xValues1 = [];
var yValues1 = [];
xValues1 = <?php echo json_encode($users1); ?>;
console.log("users1>>",xValues1);
yValues1 = <?php echo json_encode($sales_values2); ?>;
console.log("users1>>",yValues1);
var barColors = ["red", "green","blue","orange","brown"];


new Chart("myChart1", {
  type: "bar",
  data: {
    labels: xValues1,
    datasets: [{
      backgroundColor: barColors,
      data: yValues1
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Order Wise Sales"
    }
  }
});
</script>
@endsection