@extends('website.layout.app')
@section('content')

<section class="list__section">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-md-3">
        <div class="list__section__filter">
          <div class="select__list">
            <h6 class="filter__title--mod">Category 
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></h6>
            <div class="filter__scroll mCustomScrollbar">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1"/>
                <label class="custom-control-label" for="customCheck1">All Categories</label>
              </div>
              @foreach ($AllCategoryList as $item)
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="cat{{$item->id}}" value="{{$item->id}}"/>
                  <label class="custom-control-label" for="cat{{$item->id}}">{{$item->name}}</label>
                </div>
              @endforeach
             
            </div>
          </div>
          <div class="select__list">
            <h6 class="filter__title--mod">Price <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></h6>
            <div class="filter__scroll">
              <div class="custom-control custom-checkbox">
                <input
                  type="checkbox"
                  class="custom-control-input"
                  id="AmenitiesCheck1"
                />
                <label class="custom-control-label" for="AmenitiesCheck1"
                  >$</label
                >
              </div>
              <div class="custom-control custom-checkbox">
                <input
                  type="checkbox"
                  class="custom-control-input"
                  id="AmenitiesCheck2"
                />
                <label class="custom-control-label" for="AmenitiesCheck2"
                  >$$</label
                >
              </div>
              <div class="custom-control custom-checkbox">
                <input
                  type="checkbox"
                  class="custom-control-input"
                  id="AmenitiesCheck3"
                />
                <label class="custom-control-label" for="AmenitiesCheck3"
                  >$$$</label
                >
              </div>
            </div>
            
          </div>
          <div class="select__list">
            <h6 class="filter__title--mod">Artwork Medium <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></h6>
            <div class="filter__scroll">
              <div class="custom-control custom-checkbox">
                <input
                  type="radio"
                  class="custom-control-input"
                  id="artworkcheck1"
                  name="artworkradio"
                />
                <label class="custom-control-label" for="artworkcheck1"
                  >All Mediums</label
                >
              </div>
              <div class="custom-control custom-checkbox">
                <input
                  type="radio"
                  class="custom-control-input"
                  id="artworkcheck2"
                  name="artworkradio"
                />
                <label class="custom-control-label" for="artworkcheck2"
                  >Design & Illustration</label
                >
              </div>
              <div class="custom-control custom-checkbox">
                <input
                  type="radio"
                  class="custom-control-input"
                  id="artworkcheck3"
                  name="artworkradio"
                />
                <label class="custom-control-label" for="artworkcheck3"
                  >Digital Art</label
                >
              </div>
              <div class="custom-control custom-checkbox">
                <input
                  type="radio"
                  class="custom-control-input"
                  id="artworkcheck4"
                  name="artworkradio"
                />
                <label class="custom-control-label" for="artworkcheck4"
                  >Drawing</label
                >
              </div>
              <div class="custom-control custom-checkbox">
                <input
                  type="radio"
                  class="custom-control-input"
                  id="artworkcheck5"
                  name="artworkradio"
                />
                <label class="custom-control-label" for="artworkcheck5"
                  >Printing & Mixed Media</label
                >
              </div>
              <div class="custom-control custom-checkbox">
                <input
                  type="radio"
                  class="custom-control-input"
                  id="artworkcheck6"
                  name="artworkradio"
                />
                <label class="custom-control-label" for="artworkcheck6"
                  >Photography</label
                >
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-12 col-md-9">
        <div class="listing-right">
          <div class="row mb-2 mb-sm-5">
            <div class="col-12">
              <div class="listing-right-heading">
                <h4 class="mb-0">
                  {{$category->name}}
                </h4>
              </div>
            </div>
          </div>
          <div class="row align-items-center justify-content-between">
            <div class="col-auto col-sm-6">
              <p class="m-0">Showing 1–12 of 45 results</p>
            </div>
            <div class="col-auto col-md-6">
              <div class="select">
                <select name="" class="sorting" id="">
                  <option value="" selected>Most relevant</option>
                  <option value="">Most relevant</option>
                  <option value="">Trending</option>
                  <option value="">Newest</option>
                  <option value="">Best Selling</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row mt-4">
            @if (count($products)>0)
              @foreach ($products as $key => $item)
                <div class="col-6 col-lg-4 col-md-6 mb-4">
                  <div class="featured-content">
                    <a href="{{route('single_product',[$slug, $item['slug']])}}">
                      <div class="featured-img">
                        <img src="{{ asset('products/'.$item['image']) }}" alt="" class="img-fluid" />
                      </div>
                      <div class="featured-info">
                        <div class="name">
                          <h5 class="mb-0">
                            Watercolor rainbow pattern glitter, abstract
                            geometric octagon Abstract art Samsung Galaxy Soft
                            Case
                          </h5>
                          <span>By {{isset($item['design_data'])?$item['design_data']['title']:"None"}}</span>
                          @php
                              $discountPercentage = DiscountPercentage($item['price'], $item['offer_price']);
                          @endphp 
                          <div class="price">
                            <p class="mb-0">₹{{number_format($item['offer_price'], 2, '.', '')}}</p>
                            <p class="discounted"><del>₹{{number_format($item['price'], 2, '.', '')}}</del> ({{number_format($discountPercentage)}}%off)</p>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              @endforeach
            @else
            <div class="col-6 col-lg-4 col-md-6 mb-4">
            <div class="alert alert-warning text-center">No Products Found!</div>
            </div>
            @endif
            
          </div>

          <div class="row mt-4">
            <div class="col-12">
              <div class="listing-pagination">
                <ul class="list-unstyled p-0 m-0">
                  <li>
                    <a href="javascript:void(0)"
                      ><iconify-icon icon="prime:angle-left"></iconify-icon
                    ></a>
                  </li>
                  <li><a href="javascript:void(0)" class="active">1</a></li>
                  <li><a href="javascript:void(0)" class="">2</a></li>
                  <li><a href="javascript:void(0)" class="">3</a></li>
                  <li><a href="javascript:void(0)" class="">4</a></li>
                  <li><a href="javascript:void(0)" class="">5</a></li>
                  <li>
                    <a href="javascript:void(0)"
                      ><iconify-icon icon="prime:angle-right"></iconify-icon
                    ></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@push('scripts')

@endpush