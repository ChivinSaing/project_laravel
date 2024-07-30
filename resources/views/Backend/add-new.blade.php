@extends('backend.master')
@section('content')

    @section('site-title')
        Admin | Add Post
    @endsection
    @section('page-main-title')
        Add Post
    @endsection
    @if (Session::has('success'))
    <script>
        var text = "{{Session::get('add news success')}}"
        Swal.fire({
            title: "Add news success",
            text,
            icon: "success"
        });
    </script>
    @endif
    @if (Session::has('notsuccess'))
    <script>
        var text = "{{Session::get('add news not success')}}"
        Swal.fire({
            title: "Add news not success",
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
                <form action="{{route('News')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">

                            <div class="row"> 
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Title</label>
                                    <input class="form-control" type="text" name="title" placeholder="title" />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label text-danger">Recommend image size ..x.. pixels.</label>
                                    <input class="form-control" type="file" name="thumbnail" />
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-danger">Description</label>
                                    <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                                </div>                              </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Add News">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
