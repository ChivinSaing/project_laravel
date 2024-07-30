@extends('backend.master')
@section('content')


    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl-12">
                <!-- File input -->
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="formtext" class="form-label">Name</label>
                                    <input class="form-control" type="text" name="name" />
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-primary" value="Add Category">
                                </div>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
