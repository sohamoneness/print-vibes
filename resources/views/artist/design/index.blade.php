@extends('artist.layout.app')
@section('content')
@include('admin.partials.flash') 

<style>
  .design_card {
    margin-bottom: 30px;
  }
  .design_card .card-header {
    font-size: 14px;
    font-weight: 500;
  }
  .design_card img {
    width: 100%;
    height: 100%;
    aspect-ratio: 16 / 9;
    object-fit: cover;
  }
  .action-btn {
    font-size: 11px;
    font-weight: 500;
    text-transform: uppercase;
    margin-left: 10px;
  }
  .action-btn i {
    margin-right: 3px;
  }
  .action-btn.remove {
    color: #d00;
  }
  .action-btn.edit {
    color: #17a2b8;
  }


  .toggle-button-cover {
    display: block;
    position: relative;
    width: 100px;
    height: 26px;
    box-sizing: border-box;
    /* margin: 0 auto; */
  }

  .toogle-lg .toggle-button-cover {
    width: 137px;
    height: 43px;
  }

  .button-cover {
    height: 26px;
    border-radius: 0px;
  }

  .toogle-lg .button-cover {
    height: 100%;
  }

  .button-cover:before {
    counter-increment: button-counter;
    content: counter(button-counter);
    position: absolute;
    right: 0;
    bottom: 0;
    color: #d7e3e3;
    font-size: 12px;
    line-height: 1;
    padding: 5px;
  }

  .button-cover,
  .knobs,
  .layer {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
  }

  .button-togglr {
    position: relative;
    top: 50%;
    width: 100px;
    height: 28px;
    margin: -14px auto 0 auto;
    overflow: hidden;
  }

  .toogle-lg .button-togglr {
    width: 100%;
    height: 100%;
  }

  .button-togglr.r,
  .button-togglr.r .layer {
    border-radius: 100px;
  }

  .button-togglr.b2 {
    border-radius: 2px;
  }

  .checkbox {
    position: relative;
    width: 100%;
    height: 100%;
    padding: 0;
    margin: 0;
    opacity: 0;
    cursor: pointer;
    z-index: 3;
  }

  .knobs {
    z-index: 2;
  }

  .layer {
    width: 100%;
    background-color: #e7f1e4;
    transition: 0.3s ease all;
    z-index: 1;
    border-radius: 2px;
    border: #d8d8d8 1px solid;
  }
  .toggle_btn .knobs:before,
  .toggle_btn .knobs:after,
  .toggle_btn .knobs span {
    position: absolute;
    top: 4px;
    width: 46px;
    height: 21px;
    font-size: 10px;
    font-weight: 400;
    text-align: center;
    line-height: 1;
    padding: 5px 2px;
    border-radius: 2px;
    transition: 0.3s ease all;
  }

  .toggle_btn .knobs:before {
    content: '';
    right: 4px;
    background-color: #F44336;
  }

  .toggle_btn .knobs:after {
    content: 'Active';
    left: 4px;
    color: #4e4e4e;
  }

  .toggle_btn .knobs span {
    display: inline-block;
    right: 4px;
    color: #fff;
    z-index: 1;
  }

  .toggle_btn .checkbox:checked+.knobs span {
    color: #4e4e4e;
    left: auto;
    right: 4px;
  }

  .toggle_btn .checkbox:checked+.knobs:before {
    left: 4px;
    background-color: #2ea508;
  }

  .toggle_btn .checkbox:checked+.knobs:after {
    color: #fff;
  }

  .toggle_btn .checkbox:checked~.layer {
    background-color: #fcebeb;
  }
</style>

  <div class="dashboard-content">
    <div class="dashboard-content-inner">
      <h4>{{ $pageTitle }}</h4>
      <div class="row">
        <div class="col-12">
          <div class="customer-management-top">
            <div class="customer-search">
              <div class="customer-form">
                <form action="">
                  <div class="customer-form-group">
                    <input type="text" placeholder="Search" />
                    <button type="submit">
                      <img src="images/search.png" alt="" />
                    </button>
                  </div>
                </form>
              </div>
              <div class="customer-search-right">
                <!-- <div class="import-csv">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"> <img src="images/csv-icon.png" alt=""> Import to csv</button>
                                    </div>
                                    <div class="export-csv"><button download onclick="window.open()"> <img src="images/csv-icon.png" alt=""> Export to csv</button></div> -->
                <div class="add-customer">
                  <a href="{{ route('artist.design.create') }}" class="add-customer-btn" ><img src="images/add.png" alt="" /> add your design </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

        
      <div class="row g-3">
        <div class="col-12">

        <div class="row">
          @php
          $srNo = 1;
          @endphp
          @foreach($designs as $key => $design)
          <div class="col-sm-4">
            <div class="card design_card">
              <div class="card-header">{{$design->title}}</div>
              @if($design->image!='')
              <img src="{{URL::to('/').'/designs/'}}{{$design->image}}">
              @endif
              <div class="card-body">
                <div class="row justify-content-between">
                  <div class="col-auto">
                    <!-- <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="toggle-block" value="{{ $design['id'] }}" name="status" {{ $design['status'] == 1 ? 'checked' : '' }}>
                      <label class="form-check-label" for="toggle-block">Inactive</label>
                    </div> -->

  
                    <div class="toggle-button-cover margin-auto">
                        <div class="button-cover">
                            <div class="button-togglr b2 toggle_btn" id="button-11">
                                <input id="toggle-block" type="checkbox" name="status" class="checkbox" data-design_id="{{ $design['id'] }}" {{ $design['status'] == 1 ? 'checked' : '' }}>
                                <div class="knobs"><span>Inactive</span></div>
                                <div class="layer"></div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <a href="{{ route('artist.design.edit', $design['id']) }}" class="edit action-btn" title="Edit">
                      <i class="fa-solid fa-pen"></i> Edit
                    </a>
                    <a href="#" data-id="{{$design['id']}}" class="remove del action-btn" title="Del">
                      <i class="fa-solid fa-trash"></i> Delete
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @php
          $srNo += 1;
          @endphp
          @endforeach
        </div>

        <?php /* ?>
          <div class="dashboard-table">
            <div class="table-responsive">
              <table class="table table-stiped table-hovered">
                <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>Title</th>
                    <th>Tag</th>
                    <th>Statistics</th>
                    <th>Image</th>
                    <td>Status</td>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  @php
                  $srNo = 1;
                  @endphp
                  @foreach($designs as $key => $design)
                  <tr>
                    <td>{{$srNo}}</td>
                    <td>{{$design->title}}</td>
                    <td>{{$design->tags}}</td>
                    <td>
                      Total Likes : <b>{{$design->total_likes}}</b><br>
                      Total Visit : <b>{{$design->total_visit}}</b>
                    </td>
                    <td>@if($design->image!='')
                            <img style="width: 150px;height: 100px;" src="{{URL::to('/').'/designs/'}}{{$design->image}}">
                            @endif</td>
                    <td>
                      <div class="toggle-button-cover margin-auto">
                            <div class="button-cover">
                                <div class="button-togglr b2" id="button-11">
                                    <input id="toggle-block" type="checkbox" name="status" class="checkbox" data-design_id="{{ $design['id'] }}" {{ $design['status'] == 1 ? 'checked' : '' }}>
                                    <div class="knobs"><span>Inactive</span></div>
                                    <div class="layer"></div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="action-btns">
                      <!-- <a class="view action-btn" title="View">
                        <i class="fa-solid fa-eye"></i>
                      </a> -->
                      <a href="{{ route('artist.design.edit', $design['id']) }}" class="edit action-btn" title="Edit">
                        <i class="fa-solid fa-pen"></i>
                      </a>
                      <a href="#" data-id="{{$design['id']}}" class="sa-remove del action-btn" title="Del">
                        <i class="fa-solid fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                  @php
                  $srNo += 1;
                  @endphp
                  @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
          <?php */ ?>
        </div>
      </div>

        



    </div>
  </div>
@endsection
@push('scripts')
     {{-- New Add --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <script type="text/javascript">
    $('.sa-remove').on("click",function(){
        var designid = $(this).data('id');
        swal({
          title: "Are you sure?",
          text: "Your will not be able to recover the record!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },
        function(isConfirm){
          if (isConfirm) {
            window.location.href = "design/"+designid+"/delete";
            } else {
              swal("Cancelled", "Record is safe", "error");
            }
        });
    });
    </script>
    <script type="text/javascript">
        $('input[id="toggle-block"]').change(function() {
            var design_id = $(this).data('design_id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var check_status = 0;
          if($(this).is(":checked")){
              check_status = 1;
          }else{
            check_status = 0;
          }
          $.ajax({
                type:'POST',
                dataType:'JSON',
                url:"{{route('artist.design.updateStatus')}}",
                data:{ _token: CSRF_TOKEN, id:design_id, check_status:check_status},
                success:function(response)
                {
                  swal("Success!", response.message, "success");
                },
                error: function(response)
                {
                    
                  swal("Error!", response.message, "error");
                }
              });
        });


        
    </script>
@endpush