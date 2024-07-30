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
                <form action="{{route('Updatepro')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <input type="hidden" name="id" value="{{$product->id}}" id="">
                                    <label for="formFile" class="form-label">Name</label>
                                    <input class="form-control" type="text" value="{{$product->name}}" name="name" />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Quantity</label>
                                    <input class="form-control" type="text" value="{{$product->qty}}" name="qty" />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Regular Price</label>
                                    <input class="form-control" type="number" value="{{$product->regular_price}}" name="regular_price" />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Discount</label>
                                    <select name="discount" class="form-select" id="name">
                                        @foreach ($discounts as $item)
                                            <option value="{{$item->id}}"@if ($item->id == $product->discount_id) selected @endif>
                                                {{$item->name}}
                                            </option> 
                                        @endforeach   
                                    </select>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Available Size</label>
                                    <select name="size[]" class="form-control size-color" multiple="multiple">
                                        @foreach ($sizes as $item)
                                            @php
                                                $isSelect = $product->sizes->contains('id', $item->id)
                                            @endphp
                                            <option value="{{$item->id}}" {{$isSelect ? 'selected' : ''}}>
                                                {{$item->name}}
                                            </option> 
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Available Color</label>
                                    <select name="color[]" class="form-control size-color" multiple="multiple">
                                        @foreach ($colors as $item)
                                            @php
                                                $isSelect = $product->colors->contains('id', $item->id)
                                            @endphp
                                            <option value="{{$item->id}}" {{$isSelect ? 'selected' : ''}}>
                                                {{$item->name}}
                                            </option> 
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Category</label>
                                    <select name="category" class="form-control">
                                        @foreach ($categorys as $item)
                                            <option value="{{$item->id}}"@if ($item->id == $product->categorys) selected @endif>
                                                {{$item->name}}
                                            </option> 
                                        @endforeach  
                                    </select>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label text-danger">Recommend image size ..x.. pixels.</label>
                                    <input class="form-control" type="file"  name="thumbnail" />
                                    <img src="{{url('images/'.$product->thumbnail)}}" width="100px" alt="">
                                    <input type="hidden" id="" value="{{$product->thumbnail}}" name="old_thumbnail">
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-danger">Description</label>
                                    <textarea name="description"  class="form-control" cols="30" rows="10">{{$product->description}}</textarea>
                                </div>                         
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Update Product">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
