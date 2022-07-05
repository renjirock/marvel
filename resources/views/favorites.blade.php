<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Comics Marvel</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.min.css') }}" crossorigin="anonymous">
    </head>
    <body class='bg-dark'>
        <header>
            <div class="col-12 bg-primary">
                <div class="text-center p-3 text-white">
                    <a href="{{route('index')}}">
                        <img class="marvel-logo" src="{{ asset('assets/img/Marvel_Logo.svg')}}">
                    </a>
                    API Explorer
                </div>
            </div>
        </header>
        <div>
            @if ($favorites->count() > 0)
                @foreach ($favorites as $key => $favorite)
                    @if ($key == 0 or $key == 5)
                        <div class='row justify-content-md-center m-3'>
                            <div class="card-deck">
                    @endif
                                <div class="card bg-primary">
                                    <img class="card-img" src="{{$favorite->thumbnail}}" alt="{{$favorite->title}}">

                                    <a href="{{route('comic', $favorite->comic_id)}}">
                                    <div class="overlay">
                                        <div class="text-overlay">{{$favorite->title}}</div>
                                    </div>
                                    </a>
                                </div>
                    @if ($key == 4 or $key == 9)
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <div class='row justify-content-md-center m-3'>
                    <div class="card-deck">
                        <div class="card bg-primary">
                            <img class="card-img" src="http://i.annihil.us/u/prod/marvel/i/mg/b/40/image_not_available.jpg" alt="not found">

                            <a href="{{route('index')}}">
                            <div class="overlay">
                                <div class="text-overlay">not found</div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <footer class="fixed-bottom col-12 bg-primary">
            <div class="container">
                <div class="row justify-content-center">
                    <nav aria-label="">
                        <ul class="pagination pagination-lg">
                            @if ($favorites->count() > 0)
                                @for ($i = 1; $i <= 10; $i++)
                                    @if ($i == $page)
                                        <li class="page-item active" aria-current="page">
                                            <span class="page-link bg-dark">{{$i}}</span>
                                        </li>
                                    @endif
                                    @if ($i != $page)
                                        <li class="page-item active"><a class="page-link" href="{{route('index', 'page='.$i)}}">{{$i}}</a></li>
                                    @endif
                                @endfor
                            @endif
                            <li class="page-item active"><a class="page-link" href="{{route('index', 'page='.($page+1))}}">></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
