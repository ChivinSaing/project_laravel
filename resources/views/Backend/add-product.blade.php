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
        var text = "{{Session::get('success')}}"
        Swal.fire({
            title: "Add product success",
            text,
            icon: "success"
        });
    </script>
    @endif
    @if (Session::has('notsuccess'))
    <script>
        var text = "{{Session::get('notsuccess')}}"
        Swal.fire({
            title: "Add product success",
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
                <form action="{{route('Product')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Name</label>
                                    <input class="form-control" type="text" name="name" />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Quantity</label>
                                    <input class="form-control" type="text" name="qty" />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Regular Price</label>
                                    <input class="form-control" type="number" name="regular_price" />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Discount</label>
                                    <select name="discount" class="form-select" id="name">
                                        @forelse ($discount as $item)
                                            <option value="{{$item->id}}">
                                                {{$item->name}}
                                            </option>
                                        @empty
                                            
                                        @endforelse      
                                    </select>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Available Size</label>
                                    <select name="size[]" class="form-control size-color" multiple="multiple">
                                        @forelse ($size as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->name}}
                                        </option>
                                    @empty
                                        
                                    @endforelse    
                                    </select>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Available Color</label>
                                    <select name="color[]" class="form-control size-color" multiple="multiple">
                                        @forelse ($color as $item)
                                            <option value="{{$item->id}}">
                                                {{$item->name}}
                                            </option>
                                        @empty
                                            
                                        @endforelse    
                                    </select>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Category</label>
                                    <select name="category" class="form-control">
                                        @forelse ($category as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->name}}
                                        </option>
                                        @empty
                                            
                                        @endforelse  
                                    </select>
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
                                <input type="submit" class="btn btn-primary" value="Add Post">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection