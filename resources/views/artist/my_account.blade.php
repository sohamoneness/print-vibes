@extends('artist.layout.app')
@section('content')
@include('admin.partials.flash') 
<div class="dashboard-content">
    <div class="dashboard-content-inner">
      <h4>My Account</h4>

      <div class="add-customer-content">
        <div class="add-customer-header">
          <h5>
            <img src="images/personal-details.png" alt="" />My Account
          </h5>
        </div>
        <div class="add-customer-form add-lead-form">
          <form action="{{ route('artist.design.store') }}" method="POST" role="form" enctype="multipart/form-data">
             @csrf 
            <div class="row g-3">
              
              <div class="col-12">
                <label for=""> About Me: </label>
                <textarea name="tags" id="" cols="30" rows="6" class="form-control"></textarea>
              </div>
              <div class="col-12">
                <label for=""> My Career: </label>
                <textarea name="description" id="" cols="30" rows="6" class="form-control"></textarea>
              </div>
              <div class="col-12">
                <button type="submit" class="add-item-btn">
                  Add Design <i class="fa-solid fa-plus-circle"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection