<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item  {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        
        <li>
            <a class="app-menu__item {{ request()->is('admin/users*') ? 'active' : '' }} {{ sidebar_open(['admin.users']) }}"
                href="{{ route('admin.users.index') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">User Management</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ request()->is('admin/order*') ? 'active' : '' }} {{ sidebar_open(['admin.order']) }}"
                href="{{ route('admin.order.new') }}"><i class="app-menu__icon fa fa-cube"></i>
                <span class="app-menu__label">Order Management</span>
            </a>
        </li>
        <li class="treeview">
            <a class="app-menu__item {{ request()->is('admin/restaurant*') ? 'active' : '' }} {{ sidebar_open(['admin.restaurant']) }}"
                href="{{ route('admin.restaurant.index') }}"><i class="app-menu__icon fa fa-coffee"></i>
                <span class="app-menu__label">Restaurant Management</span>
            </a>
            <span class="toggle_icon" data-toggle="treeview">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </span>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item {{ request()->is('admin/category/list*') ? 'active' : '' }} {{ sidebar_open(['admin.category.list']) }}"
                        href="{{ route('admin.category.list') }}"><i class="app-menu__icon fa fa-cogs"></i>
                        <span class="app-menu__label">Category Management</span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ request()->is('admin/cousine*') ? 'active' : '' }} {{ sidebar_open(['admin.cousine.index']) }}"
                        href="{{ route('admin.cousine.index') }}"><i class="app-menu__icon fa fa-cutlery"></i>
                        <span class="app-menu__label">Cuisine Management</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item"
                href="javascript:void(0)"><i class="app-menu__icon fa fa-cutlery"></i>
                <span class="app-menu__label">Marketing and promotion</span>
            </a>
            <span class="toggle_icon" data-toggle="treeview">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </span>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item {{ request()->is('admin/coupon*') ? 'active' : '' }} {{ sidebar_open(['admin.coupon.index']) }}"
                        href="{{ route('admin.coupon.index') }}"><i class="app-menu__icon fa fa-tags"></i>
                        <span class="app-menu__label">Coupon Management</span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ request()->is('admin/offers*') ? 'active' : '' }} {{ sidebar_open(['admin.offers.index']) }}"
                        href="{{ route('admin.offers.index') }}"><i class="app-menu__icon fa fa-percent"></i>
                        <span class="app-menu__label">Offers Management</span>
                    </a>
                </li>
                <li>  
                    <a class="treeview-item {{ request()->is('admin/banner*') ? 'active' : '' }} {{ sidebar_open(['admin.banner.index']) }}"
                        href="{{ route('admin.banner.index') }}"><i class="app-menu__icon fa fa-picture-o"></i>
                        <span class="app-menu__label">Banner Management</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item {{ request()->is('admin/accounts*') ? 'active' : '' }} {{ sidebar_open(['admin.accounts.index']) }}"
                href="{{ route('admin.accounts.index') }}"><i class="app-menu__icon fa fa-inr"></i>
                <span class="app-menu__label">Accounts Section</span>
            </a>
            <span class="toggle_icon" data-toggle="treeview">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </span>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item {{ request()->is('admin/order/report') ? 'active' : '' }} {{ sidebar_open(['admin.order']) }}"
                        href="{{ route('admin.order.report') }}"><i class="app-menu__icon fa fa-bar-chart"></i>
                        <span class="app-menu__label">Order Report</span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ request()->is('admin/order/sales') ? 'active' : '' }} {{ sidebar_open(['dmin.order']) }}"
                        href="{{ route('admin.order.sales') }}"><i class="app-menu__icon fa fa-pie-chart"></i>
                        <span class="app-menu__label">Sales Data</span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ request()->is('admin/payout*') ? 'active' : '' }} {{ sidebar_open(['admin.payout.index']) }}"
                        href="{{ route('admin.payout.index') }}"><i class="app-menu__icon fa fa-credit-card-alt"></i>
                        <span class="app-menu__label">Restaurant Payments</span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ request()->is('admin/wallet*') ? 'active' : '' }} {{ sidebar_open(['admin.wallet.index']) }}"
                        href="{{ route('admin.wallet.index') }}"><i class="app-menu__icon fa fa-credit-card"></i>
                        <span class="app-menu__label">Wallet Transactions</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- <li>
            <a class="app-menu__item"
                href="{{ route('admin.order.onlinetransactions') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Online Transactions</span>
            </a>
        </li> -->
        
        <li class="treeview">
            <a class="app-menu__item"
                href="javascript:void(0)"><i class="app-menu__icon fa fa-cutlery"></i>
                <span class="app-menu__label">Rider Management</span>
            </a>
            <span class="toggle_icon" data-toggle="treeview">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </span>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item {{ request()->is('admin/boys*') ? 'active' : '' }} {{ sidebar_open(['admin.boys.index']) }}"
                        href="{{ route('admin.boys.index') }}"><i class="app-menu__icon fa fa-group"></i>
                        <span class="app-menu__label">Delivery Boy Management</span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ request()->is('admin/delivery-boy-charge-config*') ? 'active' : '' }} {{ sidebar_open(['admin.delivery-boy-charge-config.index']) }}"
                        href="{{ route('admin.delivery-boy-charge-config.index') }}"><i class="app-menu__icon fa fa-group"></i>
                        <span class="app-menu__label">Delivery Boy Charge Config</span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ request()->is('admin/incentive*') ? 'active' : '' }} {{ sidebar_open(['admin.incentive.index']) }}"
                        href="{{ route('admin.incentive.index') }}"><i class="app-menu__icon fa fa-cogs"></i>
                        <span class="app-menu__label">Incentive Management</span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ request()->is('admin/boy/rider-payment*') ? 'active' : '' }} {{ sidebar_open(['admin.boy.payment-list']) }}"
                        href="{{ route('admin.boy.payment-list') }}"><i class="app-menu__icon fa fa-group"></i>
                        <span class="app-menu__label">Rider Payments</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="treeview">
            <a class="app-menu__item"
                href="javascript:void(0)"><i class="app-menu__icon fa fa-cutlery"></i>
                <span class="app-menu__label">Notification Management</span>
            </a>
            <span class="toggle_icon" data-toggle="treeview">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </span>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item {{ request()->is('admin/notification*') ? 'active' : '' }} {{ sidebar_open(['admin.notification.sos']) }}"
                        href="{{ route('admin.notification.sos') }}"><i class="app-menu__icon fa fa-exclamation-triangle"></i>
                        <span class="app-menu__label">SOS Notification</span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ request()->is('admin/notification*') ? 'active' : '' }} {{ sidebar_open(['admin.notification.datasetNotification']) }}"
                        href="{{ route('admin.notification.datasetNotification') }}"><i class="app-menu__icon fa fa-bell-o"></i>
                        <span class="app-menu__label">Notification Management</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="treeview">
            <a class="app-menu__item {{ request()->is('admin/settings*') ? 'active' : '' }} {{ sidebar_open(['admin.settings']) }} "
                href="{{ route('admin.settings') }}"><i class="app-menu__icon fa fa-desktop"></i>
                <span class="app-menu__label">Site Settings</span>
            </a>
            <span class="toggle_icon" data-toggle="treeview">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </span>
            <ul class="treeview-menu">
                {{-- <li>
                    <a class="treeview-item {{ request()->is('admin/geofencing*') ? 'active' : '' }} {{ sidebar_open(['admin.geofencing']) }} "
                        href="{{ route('admin.geofencing.index') }}"><i class="app-menu__icon fa fa-cogs"></i>
                        <span class="app-menu__label">Geo Fencing</span>
                    </a>
                </li> --}}
                <li>
                    <a class="treeview-item {{ request()->is('admin/geolocation*') ? 'active' : '' }} {{ sidebar_open(['admin.geofencing']) }} "
                        href="{{ route('admin.geolocation.index') }}"><i class="app-menu__icon fa fa-cogs"></i>
                        <span class="app-menu__label">Geo Location</span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ request()->is('admin/delivery-charge-config*') ? 'active' : '' }} {{ sidebar_open(['admin.delivery-charge-config.index']) }}"
                        href="{{ route('admin.delivery-charge-config.index') }}"><i class="app-menu__icon fa fa-group"></i>
                        <span class="app-menu__label">Delivery Charge Config</span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ request()->is('admin/notification/createDataset*') ? 'active' : '' }} {{ sidebar_open(['admin.delivery-charge-config.index']) }}"
                        href="{{ route('admin.notification.createDataset')  }}"><i class="app-menu__icon fa fa-group"></i>
                        <span class="app-menu__label">Data Set</span>
                    </a>
                    {{-- <a class="treeview-item {{ request()->is('admin/customer/list*') ? 'active' : '' }} {{ sidebar_open(['admin.delivery-charge-config.index']) }}"
                        href="{{ route('admin.customer.fetch')  }}"><i class="app-menu__icon fa fa-group"></i>
                        <span class="app-menu__label">Customer Data Set</span>
                    </a> --}}
                </li>
            </ul>
        </li>
        
        <li>
            <a class="app-menu__item {{ request()->is('admin/location*') ? 'active' : '' }} {{ sidebar_open(['admin.location.index']) }}"
                href="{{ route('admin.location.index') }}"><i class="app-menu__icon fa fa-map-o"></i>
                <span class="app-menu__label">Location Management</span>
            </a>
        </li>
        <!-- <li>
            <a class="app-menu__item {{ request()->is('admin/commission*') ? 'active' : '' }} {{ sidebar_open(['admin.commission.index']) }}"
                href="{{ route('admin.commission.index') }}"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Commission Management</span>
            </a>
        </li> -->
        
        
        <!-- <li>
            <a class="app-menu__item {{ request()->is('admin/vehicle*') ? 'active' : '' }} {{ sidebar_open(['admin.vehicle.index']) }}"
                href="{{ route('admin.vehicle.index') }}"><i class="app-menu__icon fa fa-motorcycle"></i>
                <span class="app-menu__label">Vehicle Management</span>
            </a>
        </li> -->
        
        <!-- <li>
            <a class="app-menu__item {{ request()->is('admin/blog*') ? 'active' : '' }} {{ sidebar_open(['admin.blog.index']) }}"
                href="{{ route('admin.blog.index') }}"><i class="app-menu__icon fa fa-newspaper-o"></i>
                <span class="app-menu__label">Blog Management</span>
            </a>
        </li> -->
        
        
        
    </ul>
</aside>