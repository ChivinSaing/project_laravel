@extends('backend.master')
@section('content')
<div class="content-wrapper">
    @section('site-title')
      Admin | List Post
    @endsection
    @section('page-main-title')
      List Post
    @endsection

    @if (Session::has('updateSuccess'))
      <script>
          var text = "{{Session::get('updateSuccess')}}"
          Swal.fire({
              title: "Update Success",
              text,
              icon: "success"
          });
      </script>
    @endif
    @if (Session::has('updateNotSuccess'))
        <script>
            var text = "{{Session::get('updateNotSuccess')}}"
            Swal.fire({
                title: "Update Error",
                text,
                icon: "error"
            });
        </script> 
    @endif

    @if (Session::has('deleteSuccess'))
    <script>
        var text = "{{Session::get('deleteSuccess')}}"
        Swal.fire({
            title: "Delete Success",
            text,
            icon: "success"
        });
    </script>
  @endif
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr>
                  <th>Thumbnail</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @forelse ($thumbnails as $item)
                    <tr>
                        <td>
                            <img src="{{url('images/'.$item->thumbnail)}}" width="100px" height="100px" style="object-fit: cover" alt="">
                        </td>
                        <td>
                            <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('UpdateLogo')}}/{{$item->id}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" id="remove-post-key" data-value="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bx-trash me-1"></i> Delete</a>
                                {{-- href="javascript:void(0);" --}}
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
          <form action="/dashboard/deleteLogo" method="post">
            @csrf
          <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Are you sure to remove this post?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                  <input type="text" id="remove-val" name="remove-id">
                  <button type="submit" class="btn btn-danger">Yes</button>
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
