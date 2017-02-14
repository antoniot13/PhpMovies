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
                                    <div class="thumbnail" style="height: 550px;">
                                        <img class="group list-group-image" src="{{$movie[0]->base_url . $movie[0]->image}}" alt="">
                                        <div class="caption">
                                            <h4 class="group inner list-group-item-heading"><a href="/{{$movie[0]->id}}"> {{ $movie[0]->title }} </a></h4>
                                            <p class="group inner list-group-item-text">{{ substr($movie[0]->overview,0,70) . "..."}}</p>
                                        </div>
                                        <div class="ratings text-right" style="bottom: 35px; right: 25px; position: absolute">
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
    </div>
@endsection
