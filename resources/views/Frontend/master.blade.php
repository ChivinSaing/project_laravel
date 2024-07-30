<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{url('theme.css')}}" rel="stylesheet">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css'" rel="stylesheet"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>    
        <header>
            <div class="container">
                <div class="logo">
                    <a href="">
                        
                         <img src="{{url('images/'.$Logo->thumbnail)}}" width="180px" height="80px" >
                        {{-- <h1>
                            KH FASHION
                        </h1>  --}}
                    </a>
                </div>
                <ul class="menu">
                    <li>
                        <a href="/">HOME</a>
                    </li>
                    <li>
                        <a href="/shop">SHOP</a>
                    </li>
                    <li>
                        <a href="/news">NEWS</a>
                    </li>
                </ul>
                <div class="search">
                    <form action="/search" method="get">
                        <input type="text" name="search" class="box" placeholder="SEARCH HERE">
                        <button class="p-3">
                            <div style="background-image:url({{url('search.jpg')}});
                                        width: 20px;
                                        height: 20px;
                                        background-position: center;
                                        background-size: contain;
                                        background-repeat: no-repeat;
                            "></div>
                        </button>
                    </form>
                </div>
            </div>
        </header>
        @yield('content')
        <footer>
            <span>
               <h5>Developer is: Saing Chivin</h5>
               <h5>Teach by: Kun KimLong</h5>
            </span>
        </footer>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</html>