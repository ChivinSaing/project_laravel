@extends('backend.master')
@section('content')
    @section('site-title')
        Admin | Add Post
    @endsection
    @section('page-main-title')
       Update Color
    @endsection

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl-12">
                <!-- File input -->
                <form action="{{route('Updatecolor')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <input type="hidden" name="id" value="{{$color->id}}" id="">
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="formtext" class="form-label">Name</label>
                                    <input type="text" name="name" value="{{$color->name}}" class="form-control myy-2" id="">
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-primary" value="Update Color">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
