@extends('Frontend.master')
@section('title')
    News
@endsection
@section('content')
        <main class="shop news-blog">
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="main-title">
                                NEWS BLOG
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