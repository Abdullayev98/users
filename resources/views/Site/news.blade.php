<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        /*
        background-color: #A9C9FF;
        background-image: linear-gradient(180deg, #A9C9FF 0%, #FFBBEC 100%);

        */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');

        .movie {
            margin-top: 50px;
            margin-left: 100px;
            max-width: 1200px;
            border-radius: 5px;
            display: flex;
            box-shadow: 0 5px 20px 10px rgba(0, 0, 0, .2);
            overflow: hidden;
        }

        .movie__hero {
            flex: 0 0 45%;
        }

        .movie__img {
            width: 100%;
            display: block;
        }

        .movie__content {
            background-color: #fff;
            flex: 1;
            padding: 35px 30px;
            display: flex;
            flex-direction: column;
        }

        .movie__price {
            background:linear-gradient(to bottom, #A9C9FF 0%, #FFBBEC 100%);
            flex: 0 0 50px;
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 2px;
            color: rgb(255, 255, 255);
            writing-mode: vertical-lr;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .movie__title {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .heading__primary {
            font-size: 16px;
            margin-right: auto;
            color: royalblue;
        }

        .fa-fire {
            color: salmon;
        }

        .movie__tag {
            font-size: 10px;
            color: #fff;
            padding: 2px 7px;
            border-radius: 100px;
            margin-right: 8px;
            display: block;
            text-transform: uppercase;

        }

        .movie__tag--1 {
            background-color: white;
        }

        .movie__tag--2 {
            background-color:white;
        }

        .movie__description {
            font-size: 14px;
        }

        .movie__details {
            display: flex;
            margin: auto;
        }

        .movie__detail {
            font-size: 13px;
            margin-right: 20px;
            display: flex;
            align-items: center;
        }

        .icons i {
            margin-right: 3px;
            font-size: 18px;
        }

        .icons-red {
            color: salmon;
        }
        .icons-grey {
            color: grey;
        }

        .icons-yellow {
            color: rgb(190, 190, 71);

        }
    </style>
    <title>News</title>
</head>
<body>
{{--<div class="container mt-5">--}}
{{--    <div class="row">--}}
{{--        <div class="col-12">--}}
{{--            <form action="/upload" method="post" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                <div class="row">--}}
{{--                    <div class="col-4">--}}
{{--                        <input type="file" class="form-control" name="image">--}}
{{--                    </div>--}}
{{--                    <div class="col-4">--}}
{{--                        <input type="text" class="form-control"  name="title">--}}
{{--                    </div>--}}
{{--                    <div class="col-4">--}}
{{--                        <input type="text" class="form-control"  name="text">--}}
{{--                    </div>--}}
{{--                    <div class="col-12 mt-3">--}}
{{--                        <input type="submit" class="form-control col-12 bg-success">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

@foreach($news as $new)
    <figure class="movie">
    <div class="movie__hero">
        <img src="{{asset('storage/'.$new->img)}}" alt="Rambo" class="movie__img">
    </div>
    <div class="movie__content">
        <div class="movie__title">
            <h1 class="heading__primary">{{$new->title}}<i class="fas fa-fire"></i></h1>
            <div class="movie__tag movie__tag--1"></div>
            <div class="movie__tag movie__tag--2"></div>
        </div>
        <p class="movie__description">
            {{$new->text}}
        </p>
</figure>
@endforeach


</body>

</html>
