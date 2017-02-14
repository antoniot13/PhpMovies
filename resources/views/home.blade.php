@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-2">
                            <form id="form1" action="/" onchange="$('#form1').submit();" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <select name="order" class="selectpicker col-md-12">
                                    <option selected disabled> Order by: </option>
                                    <option value="cmp_release_date">Date</option>>
                                    <option value="cmp_popularity"> Most Popular</option>
                                    <option value="cmp_vote_average">Community Rating</option>
                                </select>
                            </form>
                        </div>
                        <div class="col-md-2">
                            <select class="selectpicker col-md-12">
                                <option selected disabled> Genre: </option>
                                <option value="all"> All genres</option>
                                <option value="comedy">Comedy</option>
                                <option value="horror">Horror</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-md-offset-2">
                            <strong>Display</strong>
                            <div class="btn-group">
                                <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
                                    </span>&nbsp;List</a>
                                <a href="#" id="grid" class="btn btn-default btn-sm active">
                                    <span class="glyphicon glyphicon-th"></span> Grid</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <form id="form" name="form" method="get" action="/search">
                                <div class="input-group">
                                    <input type="text" name="q" id="q" class="form-control" placeholder="Search">
                                    <input name="s" value="all" type="hidden" />
                                    <div class="input-group-btn">
                                        <button name="submit" class="btn btn-default" type="submit">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="row list-group" id="products">
                    @foreach($movies as $movie)
                        <div class="col-md-3 item">
                            <div class="thumbnail" style="height: 500px;">
                                <img class="group list-group-image" style="height: 360px;" src="{{$movie->base_url . $movie->image}}" alt="">
                                <div class="caption">
                                    <h4 class="group inner list-group-item-heading"><a href="{{$movie->id}}"> {{ $movie->title }} </a></h4>
                                    <p class="group inner list-group-item-text">{{ substr($movie->overview,0,70) . "..."}}</p>
                                </div>
                                <div class="ratings text-right" style="bottom: 35px; right: 25px; position: absolute">
                                    @for ($i = 0; $i < floor($movie->vote_average); $i++)
                                    <span class="glyphicon glyphicon-star"></span>
                                    @endfor
                                    @for ($i = floor($movie->vote_average); $i < 10; $i++)
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
