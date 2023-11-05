@extends('artist.layout.app')
@section('content')
@include('admin.partials.flash') 
@php
$start_date = (isset($_GET['start_date']) && $_GET['start_date']!='')?$_GET['start_date']:'';
$end_date = (isset($_GET['end_date']) && $_GET['end_date']!='')?$_GET['end_date']:'';
@endphp
  <div class="dashboard-content">
    <div class="dashboard-content-inner">
      <h4>Order List</h4>
      <div class="row">
        <div class="col-12">
          <div class="customer-management-top">
            <div class="customer-search">
              <div class="customer-form">
              </div>
              <div class="customer-search-right">
                <div class="add-customer">
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
                        <div class="col-12">

                            <div class="report-form-content">
                                <div class="report-form-content-heading">
                                    <h4 class="mb-0 pb-0">Search Order Data </h4>
                                </div>
                                <form action="">
                                    <div class="row g-3">
                                        
                                        <div class="col-12 col-lg-4 col-md-6">
                                            <label for="">Start Date</label>
                                            <div class="input-group date" id="datepicker">
                                                <input type="date" name="start_date" class="form-control" id="date" value="{{$start_date}}" />
                                                <span class="input-group-append">
                                                    <span class="input-group-text bg-light d-block">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-6">
                                            <label for="">End Date</label>
                                            <div class="input-group date" id="datepicker2">
                                                <input type="date" name="end_date" class="form-control" id="date" value="{{$end_date}}"/>
                                                <span class="input-group-append">
                                                    <span class="input-group-text bg-light d-block">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-4" style="margin-top: 45px;">
                                            <button type="submit" class="report-submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
                  @foreach($followers as $key => $follow)
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