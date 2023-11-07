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
                  <a href="{{ route('admin.product.index') }}" class="add-customer-btn back_btn" ><img src="{{asset('backend/images/curve-arrow.png')}}" alt="" /> Back </a>
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
          <form action="{{ route('admin.product.store') }}" method="POST" role="form" enctype="multipart/form-data">
             @csrf 
            <div class="row g-3">
              <div class="col-12 col-lg-12 col-md-12">
                <label for="">Name: </label>
                <input type="text" name="name" placeholder="Name" class="form-control" value="{{old('name')}}"/>
                @error('name')
                    <p class="small text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-12 col-lg-6 col-md-6">
                <label for="">Category </label>
                <select name="category[]" id="category" multiple="multiple" class="form-control">
                  @foreach ($categories as $key =>$item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
                @error('category')
                    <p class="small text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-12 col-lg-6 col-md-6">
                <label for="">Design </label>
                <select name="design[]" id="design" multiple="multiple" class="form-control">
                  @foreach ($designs as $key =>$item)
                      <option value="{{$item->id}}">{{$item->title}}</option>
                  @endforeach
                </select>
                @error('design')
                  <p class="small text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-12 col-lg-6 col-md-6">
                <label for="">Sizes </label>
                <div class="wrapper" id="multipleChackbox">
                  <button type="button" class="form-control toggle-next ellipsis">Select Sizes</button>
                  <div class="checkboxes" id="Sizes">
                    <label class="apply-selection">
                      <input type="checkbox" value=""class="ajax-link" />
                      &#x2714; apply selection
                    </label>
                    <div class="inner-wrap">
                      @foreach ($sizes as $key =>$item)
                        <label><input type="checkbox" name="sizes[]" value="{{$item->id}}" class="ckkBox val" />
                        <span>{{$item->name}} </span></label><br>
                      @endforeach
                      @error('sizes[]')
                      <p class="small text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-lg-6 col-md-6">
                <label for="">Colors </label>
                <div class="wrapper" id="multipleColorChackbox">
                  <button type="button" class="form-control toggle-next ellipsis">Select Colors</button>
                  <div class="checkboxes" id="Colors">
                    <label class="apply-selection">
                      <input type="checkbox" value=""class="ajax-link" />
                      &#x2714; apply selection
                    </label>
                    <div class="inner-wrap">
                      @foreach ($colors as $key =>$item)
                        <label><input type="checkbox" name="colors[]" value="{{$item->id}}" class="ckkBox val" />
                        <span>{{$item->name}} </span><span class="btn" style="background-color: {{$item->color_code}};"></span></label><br>
                      @endforeach
                      @error('colors[]')
                        <p class="small text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-lg-6 col-md-6">
                <label for="">Image: </label>
                <input type="file" name="image" placeholder="Title" class="form-control" />
                @error('image')
                    <p class="small text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-12 col-lg-3 col-md-3">
                <label for="">Price: </label>
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{old('price')}}">
                  @error('price')
                      <p class="small text-danger">{{ $message }}</p>
                  @enderror
              </div>
              <div class="col-12 col-lg-3 col-md-3">
                <label for="">Offer Price: </label>
                <input type="text" name="offer_price" class="form-control" placeholder="Offer price" value="{{old('offer_price')}}">
                  @error('offer_price')
                      <p class="small text-danger">{{ $message }}</p>
                  @enderror
              </div>
              <div class="col-12">
                <label for=""> Description </label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{old('description')}}</textarea>
                @error('description')
                    <p class="small text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-12">
                <label for=""> Features </label>
                <textarea name="features" id="features" cols="30" rows="5" class="form-control">{{old('features')}}</textarea>
                @error('features')
                    <p class="small text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-12">
                <label for=""> Meta Title </label>
                <textarea name="meta_title" id="" cols="30" rows="2" class="form-control">{{old('meta_title')}}</textarea>
              </div>
              <div class="col-12">
                <label for=""> Meta Keyword </label>
                <textarea name="meta_keyword" id="" cols="30" rows="2" class="form-control">{{old('meta_keyword')}}</textarea>
              </div>
              <div class="col-12">
                <label for=""> Meta Description </label>
                <textarea name="meta_description" id="" cols="30" rows="2" class="form-control">{{old('meta_description')}}</textarea>
              </div>
              <div class="col-12">
                <button type="submit" class="add-item-btn">
                  Add Product <i class="fa-solid fa-plus-circle"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
@endsection
@push('scripts')
<script>
  $(document).ready(function() {
      $('#category').select2({
        placeholder: 'Select a category',
      });
      $('#design').select2({
        placeholder: 'Select a design',
      });
  });
  ClassicEditor
      .create( document.querySelector( '#description' ) )
      .then( editor => {
              console.log( editor );
      } )
      .catch( error => {
              console.error( error );
      } );
  ClassicEditor
      .create( document.querySelector( '#features' ) )
      .then( editor => {
              console.log( editor );
      } )
      .catch( error => {
              console.error( error );
      } );
</script>
<script>
  $(function () {
    setCheckboxSelectLabels();

      $(".toggle-next").click(function () {
        $(this).next(".checkboxes").slideToggle(400);
      });

      $(".ckkBox").change(function () {
        toggleCheckedAll(this);
        setCheckboxSelectLabels();
    });
});

function setCheckboxSelectLabels(elem) {
  var wrappers = $(".wrapper");
  $.each(wrappers, function (key, wrapper) {
    var checkboxes = $(wrapper).find(".ckkBox");
    var label = $(wrapper).find(".checkboxes").attr("id");
    var prevText = "";
    $.each(checkboxes, function (i, checkbox) {
      var button = $(wrapper).find("button");
      if ($(checkbox).prop("checked") == true) {
        var text = $(checkbox).next().html();
        var btnText = prevText + text;
        var numberOfChecked = $(wrapper).find("input.val:checkbox:checked")
          .length;
        if (numberOfChecked >= 10) {
          btnText = numberOfChecked + " " + label + " selected";
        }
        $(button).text(btnText);
        prevText = btnText + ", ";
      }
    });
  });
}

function toggleCheckedAll(checkbox) {
  var apply = $(checkbox).closest(".wrapper").find(".apply-selection");
    apply.fadeIn("slow");

    var val = $(checkbox).closest(".checkboxes").find(".val");
    var all = $(checkbox).closest(".checkboxes").find(".all");
    var ckkBox = $(checkbox).closest(".checkboxes").find(".ckkBox");

    if (!$(ckkBox).is(":checked")) {
      $(all).prop("checked", true);
      return;
    }

    if ($(checkbox).hasClass("all")) {
      $(val).prop("checked", false);
    } else {
      $(all).prop("checked", false);
    }
  }

</script>
@endpush