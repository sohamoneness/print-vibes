@extends('vendor.layout.app')
@section('content')
@php
$today = date("Y-m-d");
$vendor_id = Auth::user()->id;

$total_jobs = App\Models\JobAssignment::where('vendor_id',$vendor_id)->get();
$new_jobs = App\Models\JobAssignment::where('vendor_id',$vendor_id)->where('status','2')->get();
$on_progress_jobs = App\Models\JobAssignment::where('vendor_id',$vendor_id)->where('status','3')->get();
$completed_jobs = App\Models\JobAssignment::where('vendor_id',$vendor_id)->where('status','4')->get();
$cancelled_jobs = App\Models\JobAssignment::where('vendor_id',$vendor_id)->where('status','5')->get();

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
                <h5>{{count($total_jobs)}}</h5>
                <span>Total Jobs</span>
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
                <h5>{{count($new_jobs)}}</h5>
                <span>New Jobs</span>
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
                <h5>{{count($on_progress_jobs)}}</h5>
                <span>On Progress Jobs</span>
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
                <h5>{{count($completed_jobs)}}</h5>
                <span>Completed Jobs</span>
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
                <h5>{{count($cancelled_jobs)}}</h5>
                <span>Cancelled Jobs</span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

