@extends('backend.master')
@section('content')
<div class="content-wrapper">
    @section('site-title')
      Admin | List Post
    @endsection
    @section('page-main-title')
      List Post
    @endsection
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
          <div class="table-responsive text-nowrap">
            <table class="table align-middle" style="text-align: center">
            
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Viewer</th>
                  <th>Thumbnail</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                  
                  @forelse ($news as $item)
                  <tr>
                    <td>{{$item->title}}</td> 
                    <td>{{$item->viewer}}</td>
                    <td>
                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                           <img src="{{url('./images/'.$item->thumbnail)}}" width="50px" height="50px" style="object-fit: cover;" alt="Avatar" >
                        </ul>
                      </td>
                    <td>{{$item->description}}</td>
                    
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{route('OpenUpdateNews',$item->id)}}"><i class="bx bx-edit-alt me-1"></i> Update</a>
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
          <form action="{{route('Deletenews')}}" method="post">
            @csrf
          <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Are you sure to remove this post?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                  <input type="text" id="remove-val" name="remove_id">
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
