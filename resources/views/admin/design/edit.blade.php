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
                  <a href="{{ route('admin.design.index') }}" class="add-customer-btn back_btn" ><img src="{{asset('backend/images/curve-arrow.png')}}" alt="" /> Back </a>
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
          <form action="{{ route('admin.design.update') }}" method="POST" role="form" enctype="multipart/form-data">
             @csrf 
             <input type="hidden" name="id" value="{{$targetDesign->id}}">
            <div class="row g-3">
              <div class="col-12 col-lg-12 col-md-12">
                <label for="">Title: </label>
                <input type="text" name="title" placeholder="Title" class="form-control" value="{{ old('title', $targetDesign->title) }}"/>
                @error('name')
                    <p class="small text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-12 col-lg-12 col-md-12">
                <label for="">Design: </label>
                @if ($targetDesign->image != null)
                    <figure class="mt-2" style="width: 80px; height: auto;">
                        <img src="{{ asset('designs/'.$targetDesign->image) }}" id="blogImage" class="img-fluid" alt="img">
                    </figure>
                @endif
                <input type="file" name="image" placeholder="Title" class="form-control" />
                @error('name')
                    <p class="small text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-12">
                <label for=""> Tags: </label>
                <textarea name="tags" id="" cols="30" rows="6" class="form-control">{{ old('tags', $targetDesign->tags) }}</textarea>
              </div>
              <div class="col-12">
                <label for=""> Description: </label>
                <textarea name="description" id="" cols="30" rows="6" class="form-control">{{ old('description', $targetDesign->description) }}</textarea>
              </div>
              <div class="col-12">
                <button type="submit" class="add-item-btn">
                  Update Design <i class="fa-solid fa-plus-circle"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection