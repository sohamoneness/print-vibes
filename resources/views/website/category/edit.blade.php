@extends('admin.layout.app')
@section('content')
@include('admin.partials.flash') 
<div class="dashboard-content">
    <div class="dashboard-content-inner">
      <h4>{{ $pageTitle }}</h4>
      <div class="row">
        <div class="col-12">
          <div class="customer-management-top">
            <div class="customer-search">
              <div class="customer-form">
              </div>
              <div class="customer-search-right">
                <div class="add-customer">
                  <a href="{{ route('admin.category.index') }}" class="add-customer-btn back_btn" ><img src="{{asset('backend/images/curve-arrow.png')}}" alt="" /> Back </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="add-customer-content">
        <div class="add-customer-header">
          <h5>
            <img src="images/personal-details.png" alt="" /> {{ $subTitle }}
          </h5>
        </div>
        
        <div class="add-customer-form add-lead-form">
          <form action="{{ route('admin.category.update') }}" method="POST" role="form" enctype="multipart/form-data">
             @csrf 
             <input type="hidden" name="id" value="{{$targetDesign->id}}">
            <div class="row g-3">
              <div class="col-12 col-lg-12 col-md-12">
                <label for="">Name: </label>
                <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name', $targetDesign->name) }}"/>
                @error('name')
                    <p class="small text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-12">
                <label for=""> Meta Title </label>
                <textarea name="meta_title" id="" cols="30" rows="2" class="form-control">{{ old('meta_title', $targetDesign->meta_title) }}</textarea>
                @error('meta_title')
                <p class="small text-danger">{{ $message }}</p>
            @enderror
              </div>
              <div class="col-12">
                <label for=""> Meta Keyword </label>
                <textarea name="meta_keyword" id="" cols="30" rows="2" class="form-control">{{ old('meta_keyword', $targetDesign->meta_keyword) }}</textarea>
                @error('meta_keyword')
                <p class="small text-danger">{{ $message }}</p>
            @enderror
              </div>
              <div class="col-12">
                <label for=""> Description: </label>
                <textarea name="meta_description" id="" cols="30" rows="6" class="form-control">{{ old('meta_description', $targetDesign->meta_description) }}</textarea>
                @error('meta_description')
                  <p class="small text-danger">{{ $message }}</p>
              @enderror
              </div>
              <div class="col-12">
                <button type="submit" class="add-item-btn">
                  Update Category <i class="fa-solid fa-plus-circle"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection