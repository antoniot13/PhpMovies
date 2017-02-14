@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ Auth::user()->name  . "'s watched movies" }}
                    </div>
                    <div class="panel-body">
                        <div class="row list-group" id="products">
                            @foreach($movies as $movie)
                                <div class="col-md-3 item">
                                    <div class="thumbnail" style="height: 480px;">
                                        <a href="/{{$movie[0]->id}}"><img class="group list-group-image" style="height: 330px;" src="{{$movie[0]->base_url . $movie[0]->image}}" alt=""></a>
                                        <div class="caption">
                                            <h4 class="group inner list-group-item-heading"><a href="/{{$movie[0]->id}}"> {{ $movie[0]->title }} </a></h4>
                                            <p class="group inner list-group-item-text">{{ substr($movie[0]->overview,0,70) . "..."}}</p>
                                        </div>
                                        <div class="ratings text-right" style="bottom: 35px; right: 25px; position: absolute; color: gold;">
                                            @for ($i = 0; $i < floor($movie[0]->vote_average); $i++)
                                                <span class="glyphicon glyphicon-star"></span>
                                            @endfor
                                            @for ($i = floor($movie[0]->vote_average); $i < 10; $i++)
                                                <span class="glyphicon glyphicon-star-empty"></span>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Suggestions for you:</h2>
            </div>
            @if(count($suggestions2)>0)
            @foreach($suggestions1 as $movie)
                <div class="col-md-3 text-center">
                    <a href="/{{$movie->id}}"><img class="img-circle img-responsive img-center" style="height:200px; width:200px" src="{{$movie->base_url . $movie->image}}" alt=""></a>
                    <h4 style="margin-right:50px" class=""><a href="/{{$movie->id}}"> {{ $movie->title }} </a></h4>
                </div>
            @endforeach
                @foreach($suggestions2 as $movie)
                    <div class="col-md-3 text-center">
                        <a href="/{{$movie->id}}"><img class="img-circle img-responsive img-center" style="height:200px; width:200px" src="{{$movie->base_url . $movie->image}}" alt=""></a>
                        <h4 style="margin-right:50px" class=""><a href="/{{$movie->id}}"> {{ $movie->title }} </a></h4>
                    </div>
                @endforeach
            @else
                @foreach($suggestions1 as $movie)
                    <div class="col-md-3 text-center">
                        <a href="/{{$movie->id}}"><img class="img-circle img-responsive img-center" style="height:200px; width:200px" src="{{$movie->base_url . $movie->image}}" alt=""></a>
                        <h4 style="margin-right:50px" class=""><a href="/{{$movie->id}}"> {{ $movie->title }} </a></h4>
                    </div>
                @endforeach
                @endif
        </div>

    </div>
@endsection
