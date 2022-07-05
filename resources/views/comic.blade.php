<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>comic {{$title}}- Comics Marvel</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.min.css') }}" crossorigin="anonymous">
    </head>
    <body class='bg-dark'>
        <nav class="navbar navbar-expand-lg fixed-top">
            <a href="{{ route('index') }}" class="btn btn-outline-light">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg>
            </a>
            <div class="ml-5">
                <form method="POST" action="{{$is_favorite ? route('favorite.delete') : route('favorite')}}">
                    @csrf
                    <input name ="id" type="hidden" value="{{$id}}">
                    <input name="title" type="hidden" value="{{$title}}">
                    <input name="thumbnail" type="hidden" value="{{$thumbnail}}">
                    <button type="submit" class="btn btn-outline-light" value="Submit">
                        @if (!$is_favorite)
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-star" viewBox="0 0 16 16">
                                <path d="M7.84 4.1a.178.178 0 0 1 .32 0l.634 1.285a.178.178 0 0 0 .134.098l1.42.206c.145.021.204.2.098.303L9.42 6.993a.178.178 0 0 0-.051.158l.242 1.414a.178.178 0 0 1-.258.187l-1.27-.668a.178.178 0 0 0-.165 0l-1.27.668a.178.178 0 0 1-.257-.187l.242-1.414a.178.178 0 0 0-.05-.158l-1.03-1.001a.178.178 0 0 1 .098-.303l1.42-.206a.178.178 0 0 0 .134-.098L7.84 4.1z"/>
                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-star-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zM8.16 4.1a.178.178 0 0 0-.32 0l-.634 1.285a.178.178 0 0 1-.134.098l-1.42.206a.178.178 0 0 0-.098.303L6.58 6.993c.042.041.061.1.051.158L6.39 8.565a.178.178 0 0 0 .258.187l1.27-.668a.178.178 0 0 1 .165 0l1.27.668a.178.178 0 0 0 .257-.187L9.368 7.15a.178.178 0 0 1 .05-.158l1.028-1.001a.178.178 0 0 0-.098-.303l-1.42-.206a.178.178 0 0 1-.134-.098L8.16 4.1z"/>
                            </svg>
                        @endif
                    </button>
                </form>
            </div>
        </nav>
        <div class="col-12 vh-100">
            <div class="row">
                <div class="col-6 vh-100 p-0">
                    <img class="bg-comic-detail" src="{{$thumbnail}}" alt="{{$title}}">
                    <div class="container-img">
                        <img class="comic-image" src="{{$thumbnail}}" alt="{{$title}}">
                    </div>
                </div>
                <div class="col-6 vh-100 p-0 content-comic">
                    <div class="col mh-50 text-center text-white comic-title">
                        <h2>{{$title}}</h2>
                    </div>

                    <div class="col mh-50 bg-creator p-0 comic-creators">
                        <div class="p-3">
                            <h5>Creators</h5>
                        </div>
                        @foreach ($creators as $key => $creator)
                            <div class="bg-list pl-4 border-bottom">
                                {{$key}}. {{$creator['name']}}
                            </div>
                        @endforeach
                        <div class="pt-5 pl-3">
                            <h5>Stories</h5>
                        </div>
                        @foreach ( $stories as $key => $storey)
                        <div class="bg-list pl-4 border-bottom">
                            {{$key}}. {{$storey['name']}}
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
