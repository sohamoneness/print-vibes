<?php   
use Illuminate\Support\Facades\DB;  

$orders =  DB::select("SELECT driver_locations.lat, driver_locations.lng, driver_locations.id as location_id, `orders`.`delivery_boy_id`, `orders`.`status`, `orders`.`created_at`, `orders`.`delivery_address`, `orders`.`delivery_landmark`, `orders`.`delivery_city`, `orders`.`delivery_pin`,
           `delivery_boys`.`id`, `delivery_boys`.`is_available`, `delivery_boys`.`name` as `agent_name` FROM 
            (SELECT * FROM `delivery_boys` WHERE `status`  = 1) delivery_boys
            LEFT JOIN
            (SELECT * FROM `orders`) orders
            ON `delivery_boys`.`id` = `orders`.`delivery_boy_id`
            AND   `orders`.`status` in (3, 4, 5, 6, 7)and  `orders`.`is_deleted` = 0 
            LEFT JOIN driver_locations
            ON `delivery_boys`.`id` = `driver_locations`.`driver_id`
            GROUP BY `driver_locations`.`driver_id`
            ORDER BY `orders`.`delivery_boy_id` ASC");
$order_count =DB::table('orders')  
->select(DB::raw('count(delivery_boy_id) as user_count, delivery_boy_id')) 
->whereIn('status',array('3','4','5','6','7'))->where('delivery_boy_id','<>',0)
->where('is_deleted',0) 
->groupBy('delivery_boy_id') 
->get();
 
$completed_order_count =DB::table('orders')  
->select(DB::raw('count(delivery_boy_id) as complete_count, delivery_boy_id')) 
->whereIn('status',array('8'))->where('delivery_boy_id','<>',0)
->where('is_deleted',0) 
->groupBy('delivery_boy_id') 
->get(); 

?>

<div class="modal fade agent_modal" id="agentstatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delivery agent status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table_wrapper">
            <div class="table-responsive">
            <table class="agent_table">
                <thead>
                    <tr>
                        <th>Agent Name</th>
                        <th>Order Status</th>
                        <th align="center">Delivery ETA</th>
                        <th>Delivery Location</th>
                        <th>Current Location</th>
                        <th align="center">Completed</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $class = "";
                $order_status = "Free";
               ?>
                @foreach($orders as $key => $order)
                                @if($order->status==3)
                                @php 
                                
                                $class="agentbadge ongoing"; 
                                $order_status = "Requuest acceptced";
                                @endphp
                                @elseif($order->status==4)
                                @php $class="agentbadge ongoing"; 
                                $order_status = "Order On Process";
                                @endphp
                                @elseif($order->status==5)
                                @php $class="agentbadge ongoing" ;
                                $order_status = "Rider Started Towards Restaurant";
                                @endphp
                                @elseif($order->status==6)
                                @php $class="agentbadge ongoing";
                                $order_status = "Rider Reached Restaurant";
                                @endphp
                                @elseif($order->status==7)
                                @php $class="agentbadge offline" ;
                                $order_status = "Order Picked";
                                @endphp
                                @elseif($order->status==8)
                                @php 
                                $class="agentbadge offline";
                                $order_status = "Order Delivered";
                                @endphp
                                @else
                                @php 
                                $class="agentbadge online";
                                $order_status = "Free";
                                @endphp
                                @endif
                        <tr>
                    @if ($order->is_available==1)
                         <td> <span class="<?php echo $class;?>"></span> 
                           {{$order->agent_name}}  
                            @foreach($order_count as $agent_order)
                                @if($agent_order->delivery_boy_id ==  $order->delivery_boy_id) ({{$agent_order->user_count}})
                                @endif  
                            @endforeach  
                                </td>
                                <td><b>
                                {{ $order_status}}
                                    </b>
                                </td>
                            
                                @if($order->created_at)
                                @php  $order_time = date("h:i a",strtotime($order->created_at))  @endphp
                                @else 
                                @php $order_time = "--";  @endphp
                                @endif
                            
                            
                                <td> {{$order_time}} </td> 
                                <td>{{$order->delivery_address}}<br>Landmark : {{$order->delivery_landmark}}<br>{{$order->delivery_city}} - {{$order->delivery_pin}}</td>
                            <td align="center">
                                @php
                                    if($order->lat!=null|| $order->lng!=null){
                                            $data = "Yes";
                                            // $data = getaddress($order->lat, $order->lng);
                                    }else{
                                        $data = 'NA';
                                    }
                                @endphp
                                {{$data}}
                            </td>
                            <td align="center">
                            @foreach($completed_order_count as $completed_count )    
                            @if($completed_count->delivery_boy_id == $order->delivery_boy_id)    
                                {{$completed_count->complete_count}}
                            @endif
                            @endforeach    
                            </td>
                        </tr>
                    @else
                    <tr>
                        <td> <span class="agentbadge is_available"></span> 
                            {{$order->agent_name}} 
                        </td>
                        <td>Rider Not Available</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                    </tr>
                    @endif
                    @endforeach
                   
                </tbody>
            </table>
</div>
        </div>
      </div>
    </div>
  </div>
</div>


<header class="app-header">
    <a href="#" class="agent_status_btn" data-toggle="modal" data-target="#agentstatus"><img src="{{ asset('backend/images/delivery.png')}}"> Delivery Agent Status</a>
    <a class="app-header__logo" href="#"><img src="{{ asset('backend/images/fdex_logo.png')}}">{{ config('app.name') }}</a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
        <!-- <li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search" />
            <button class="app-search__button">
                <i class="fa fa-search"></i>
            </button>
        </li> -->
        <!-- <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <li class="app-notification__title">
                    You have 4 new notifications.
                </li>
                <div class="app-notification__content">
                    <li>
                        <a class="app-notification__item" href="javascript:;">
                            <span class="app-notification__icon">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x text-danger"></i>
                                    <i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i>
                                </span>
                            </span>
                            <div>
                                <p class="app-notification__message">
                                    Mail server not working
                                </p>
                                <p class="app-notification__meta">5 min ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="app-notification__item" href="javascript:;">
                            <span class="app-notification__icon">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x text-success"></i>
                                    <i class="fa fa-money fa-stack-1x fa-inverse"></i>
                                </span>
                            </span>
                            <div>
                                <p class="app-notification__message">
                                    Transaction complete
                                </p>
                                <p class="app-notification__meta">2 days ago</p>
                            </div>
                        </a>
                    </li>
                </div>
                <li class="app-notification__footer">
                    <a href="#">See all notifications.</a>
                </li>
            </ul>
        </li> -->
        <!-- User Menu-->
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i> <span>{{ Auth::user()->name }}</span> <span><i class="treeview-indicator fa fa-angle-down" style="font-size: 15px;"></i></span></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right account-dropdown">
                <li>
                    <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="fa fa-user fa-lg"></i> Profile</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="fa fa-sign-out fa-lg"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</header>