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
        <nav class="navbar navbar-expand-lg fixed-top">
            <a href="{{ route('favorites') }}" class="btn btn-outline-light mt-3">
                Favorites
            </a>
        </nav>
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
            @foreach ($comics as $key => $comic)
                @if ($key == 0 or $key == 5)
                    <div class='row justify-content-md-center m-3'>
                        <div class="card-deck">
                @endif
                            <div class="card bg-primary">
                                <img class="card-img" src="{{$comic['thumbnail']['path']}}.{{$comic['thumbnail']['extension']}}" alt="{{$comic['title']}}">

                                <a href="{{route('comic', $comic['id'])}}">
                                    <div class="overlay">
                                        <div class="text-overlay">{{$comic['title']}}</div>
                                    </div>
                                </a>
                            </div>
                @if ($key == 4 or $key == 9)
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <footer class="fixed-bottom col-12 bg-primary">
            <div class="container">
                <div class="row justify-content-center">
                    <nav aria-label="">
                        <ul class="pagination pagination-lg">
                            @if ($page > 1)
                                <li class="page-item active"><a class="page-link" href="{{route('index', 'page='.($page-1))}}"><</a></li>
                            @endif
                            @if ($page < 10)
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
                            @else
                                @for ($i = $page-10; $i <= $page+1; $i++)
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
