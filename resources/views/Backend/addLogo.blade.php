@extends('backend.master')
@section('content')

    @if (Session::has('success'))
        <script>
            var text = "{{Session::get('success')}}"
            Swal.fire({
                title: "add success",
                text,
                icon: "success"
            });
        </script>
    @endif
    @if (Session::has('not success'))
        <script>
            var text = "{{Session::get('not success')}}"
            Swal.fire({
                title: "add error",
                text,
                icon: "error"
            });
        </script> 
    @endif
    @section('site-title')
        Admin | Add Post
    @endsection
    @section('page-main-title')
       Add Logo
    @endsection

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl-12">
                <!-- File input -->
                <form action="/dashboard/add-logo" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label">Thumbnail</label>
                                    <input class="form-control" type="file" name="thumbnail" />
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-primary" value="Add Logo">
                                </div>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
