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
                <form action="">
                  <div class="customer-form-group">
                    <input type="text" placeholder="Search by title or tags" />
                    <button type="submit">
                      <img src="{{asset('backend/images/search.png')}}" alt="" />
                    </button>
                  </div>
                </form>
              </div>
              <div class="customer-search-right">
                <div class="add-customer">
                  <a href="{{ route('admin.design.create') }}" class="add-customer-btn" ><img src="{{asset('backend/images/add.png')}}" alt="" /> Add design </a>
                </div>
              </div>
            </div>
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
                    <th>Title</th>
                    <th>Tag</th>
                    <th>Statistics</th>
                    <th>Image</th>
                    <td>Status</td>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($designs as $key => $design)
                  <tr>
                    <td> {{ $designs->firstItem() + $loop->index }}</td>
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
                            <div class="button-togglr b2 toggle_btn" id="button-11">
                                <input id="toggle-block" type="checkbox" name="status" class="checkbox" data-design_id="{{ $design['id'] }}" {{ $design['status'] == 1 ? 'checked' : '' }}>
                                <div class="knobs"><span>Inactive</span></div>
                                <div class="layer"></div>
                            </div>
                        </div>
                    </div>
                    </td>
                    <td class="">
                      <!-- <a class="view action-btn" title="View">
                        <i class="fa-solid fa-eye"></i>
                      </a> -->
                      <a href="{{ route('admin.design.edit', $design['id']) }}" class="edit edit_btn" title="Edit">
                        <i class="fa-solid fa-pen"></i> Edit
                      </a>
                      <a href="#" data-id="{{$design['id']}}" class="sa-remove del delete_btn" title="Del">
                        <i class="fa-solid fa-trash"></i> Delete
                      </a>
                    </td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
              {{$designs->appends($_GET)->links()}}
            </div>
          </div>
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
                url:"{{route('admin.design.updateStatus')}}",
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