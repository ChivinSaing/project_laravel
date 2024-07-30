@extends('backend.master')
@section('content')

    @section('site-title')
        Admin | Add Post
    @endsection
    @section('page-main-title')
        Add Post
    @endsection

    @if (Session::has('update product success'))
    <script>
        var text = "{{Session::get('update product success')}}"
        Swal.fire({
            title: "Update product success",
            text,
            icon: "success"
        });
    </script>
    @endif
    @if (Session::has('update product not success'))
    <script>
        var text = "{{Session::get('update product not success')}}"
        Swal.fire({
            title: "Update product not success",
            text,
            icon: "error"
        });
    </script>
    @endif
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl-12">
                <!-- File input -->
                <form action="{{route('Updatenews')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <input type="text" name="id" value="{{$news->id}}" id="">
                                   
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Title</label>
                                    <input class="form-control" type="text" value="{{$news->title}}" name="title" />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label text-danger">Recommend image size ..x.. pixels.</label>
                                    <input class="form-control" type="file"  name="thumbnail" />
                                    <img src="{{url('images/'.$news->thumbnail)}}" width="100px" alt="">
                                    <input type="text" id="" value="{{$news->thumbnail}}" name="old_thumbnail">
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-danger">Description</label>
                                    <textarea name="description"  class="form-control" cols="30" rows="10">{{$news->description}}</textarea>
                                </div>                         
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Update News">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
