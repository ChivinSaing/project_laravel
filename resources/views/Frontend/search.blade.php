@extends('Frontend.master')
@section('title')
    Search
@endsection
@section('content')
        <main class="shop">

            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="main-title">
                                Product Result
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                       
                        @foreach ($product as $item)
                            <div class="col-3">
                                <figure>
                                    <div class="thumbnail">
                                        @if ($item->sale_price != $item->regular_price)
                                        <div class="status">
                                            Promotion
                                        </div>
                                        @endif
                                        <a href="/product-detail/{{$item->id}}">
                                            <img src="{{url('images/'.$item->thumbnail)}}" width="350px" height="400px" alt="">
                                        </a>
                                    </div>
                                    <div class="detail">
                                        <div class="price-list">
                                            @if ($item->sale_price == $item->regular_price)
                                                <div class="price">US {{$item->regular_price}}</div>   
                                            @else
                                                <div class="regular-price "><strike> US {{$item->regular_price}}</strike></div>
                                                <div class="sale-price ">US {{$item->sale_price}}</div>
                                            @endif
                                        </div>
                                        <h5 class="title">{{$item->name}}</h5>
                                    </div>
                                </figure>
                            </div>
                        @endforeach
                    
                    </div>
                </div>
        
                <div class="container">
                    <div class="row mt-5">
                        <div class="col-12">
                            <h3 class="main-title">
                                News Result
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($news as $item)
                            <div class="col-3">
                                <figure>
                                    <div class="thumbnail">
                                        <a href="/news-detail/{{$item->id}}">
                                            <img src="{{url('images/'.$item->thumbnail)}}" style="width: 100% !important;height:100% !important" alt="">
                                        </a>
                                    </div>
                                    <div class="detail">
                                        <h5 class="title">{{$item->title}}</h5>
                                    </div>
                                </figure>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        
        </main>
@endsection