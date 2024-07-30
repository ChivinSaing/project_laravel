@extends('backend.master')
@section('content')
<div class="content-wrapper">
    @section('site-title')
      Admin | List Post
    @endsection
    @section('page-main-title')
      List Post
    @endsection
    @if (Session::has('success'))
    <script>
        var text = "{{Session::get('success')}}"
        Swal.fire({
            title: "Delete product success",
            text,
            icon: "success"
        });
    </script>
    @endif
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
          <div class="table-responsive text-nowrap">
            <table class="table align-middle" style="text-align: center">
            
              <thead>
                  <tr>
                    <td>Total Product ={{$totalPro}}</td>
                    @foreach ($category as $item)
                        <td>
                          {{$item}}
                        </td>
                    @endforeach
                  </tr>
                <tr>
                  <th>Name</th>
                  <th>Thumbnail</th>
                  {{-- <th>Descrition</th> --}}
                  <th>User_ID</th>
                  <th>Category_ID</th>
                  <th>Discount_ID</th>
                  <th>Size</th>
                  <th>Color</th>
                  <th>QTY</th>
                  <th>Regular_Price</th>
                  <th>Sale_Price</th>
                  <th>Viewer</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                  @forelse ($products as $item)
                  <tr>
                    <td>{{$item->name}}</td> 
                    <td>
                      <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                         <img src="{{url('./images/'.$item->thumbnail)}}" width="80px" height="80px" style="object-fit: cover;" alt="Avatar" >
                      </ul>
                    </td>
                    {{-- <td>{{$item->description}}</td> --}}
                    <td>{{$item->Username}}</td>
                    <td>{{$item->CategoryName}}</td>
                    <td>{{$item->DiscountName}}%</td> 
                    <td>
                      @foreach ($item->sizes as $item2)
                          {{$item2->name}}
                          @if (!$loop->last)
                              , <!-- Display comma if it's not the last item -->
                          @endif
                      @endforeach
                  </td>
                  <td>
                      @foreach ($item->colors as $item2)
                          {{$item2->name}}
                          @if (!$loop->last)
                              , <!-- Display comma if it's not the last item -->
                          @endif
                      @endforeach
                  </td>
                    <td>{{$item->qty}}</td>
                    <td>{{$item->regular_price}}</td>
                    <td>{{$item->sale_price}}</td>
                    <td>{{$item->viewer}}</td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="{{route('openupdatepro',$item->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                          <a class="dropdown-item" id="remove-post-key" data-value="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#basicModal" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @empty
                  @endforelse
              </tbody>
            </table>
          </div>
        </div>

        <div class="mt-3">
          <form action="{{route('Deletepro')}}" method="post">
            @csrf
          <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Are you sure to remove this post?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                  <input type="hidden" id="remove-val" name="remove_id">
                  <button type="submit" class="btn btn-danger">Confirm</button>
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        
      <hr class="my-5" />
    </div>
    <!-- / Content -->
  </div>
</div>

@endsection
