@extends('Frontend.master')
@section('title')
    Shop
@endsection
@section('content')
        <main>
            <main class="shop">
                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-9">
                                <div class="row">
                                    @foreach ($product as $item)
                                    <div class="col-4">
                                        <figure>
                                            <div class="thumbnail">
                                                @if ($item->sale_price != $item->regular_price)
                                                    <div class="status">
                                                        Promotion
                                                    </div>
                                                @endif
                                                <a href="/product-detail/{{$item->id}}">
                                                    <img src="{{url('images/'.$item->thumbnail)}}" alt="">
                                                </a>
                                            </div>
                                            <div class="detail">
                                                <div class="price-list">
                                                   @if ($item->sale_price == $item->regular_price)
                                                        <div class="price">US {{$item->regular_price}}</div>
                                                   @else
                                                       <div class="regular-price "><strike> US {{$item->regular_price}}</strike></div>
                                                       <div class="sale-price ">{{$item->sale_price}}</div>
                                                   @endif
                                                    
                                                </div>
                                                <h5 class="title">{{$item->name}}</h5>
                                            </div>
                                        </figure>
                                    </div>
                                    @endforeach
                                    
                                    <div class="col-12">
                                        <ul class="pagination">
                                            @if ($cate)
                                                <li>
                                                    @for ($i = 1; $i <= $totalPage; $i++)
                                                        <a href="/shop?cate={{$cate}}&page={{$i}}">{{$i}}</a>
                                                    @endfor
                                                </li>
                                            @elseif ($price)
                                                <li>
                                                    @for ($i = 1; $i <= $totalPage; $i++)
                                                        <a href="/shop?price={{$price}}&page={{$i}}">{{$i}}</a>
                                                    @endfor
                                                </li>
                                            @elseif ($promotion)
                                                <li>
                                                    @for ($i = 1; $i <= $totalPage; $i++)
                                                        <a href="/shop?promotion={{$promotion}}&page={{$i}}">{{$i}}</a>
                                                    @endfor
                                                </li>
                                             @else
                                                <li>
                                                    @for ($i = 1; $i <=  $totalPage; $i++)
                                                        <a href="/shop?page={{$i}}">{{$i}}</a>
                                                    @endfor
                                                </li>
                                            @endif
                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 filter">
                                <h4 class="title">Category</h4>
                                <ul>
                                    <li>
                                        <a href="/shop">ALL</a>
                                    </li>
                                    @foreach ($categories as $item)
                                        <li>
                                            <a href="/shop?cate={{$item->id}}">{{$item->name}}</a>
                                        </li> 
                                    @endforeach
                                </ul>
                                
                                <h4 class="title mt-4">Price</h4>
                                <div class="block-price mt-4">
                                    <a href="/shop?price=max">High</a>
                                    <a href="/shop?price=min">Low</a>
                                </div>
            
                                <h4 class="title mt-4">Promotion</h4>
                                <div class="block-price mt-4">
                                    <a href="/shop?promotion=true">Promotion Product</a>
                                </div>
            
                            </div>
                        </div>
                    </div>
                </section>
            
            </main>
        </main>
@endsection