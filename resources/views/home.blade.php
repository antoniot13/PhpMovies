@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Order by:
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Title A-Z</a></li>
                                    <li><a href="#">Most Popular</a></li>
                                    <li><a href="#">Community Rating</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Genre:
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">All Genres</a></li>
                                    <li><a href="#">Comedy</a></li>
                                    <li><a href="#">Horror</a></li>
                                    <li><a href="#">Drama</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-3">
                            <strong>Display</strong>
                            <div class="btn-group">
                                <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
                                    </span>List</a>
                                <a href="#" id="grid" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-th"></span>Grid</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <form id="form" name="form" method="get" action="http://www.imdb.com/find">
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

                    {{$movies}}
                    <div class="row list-group" id="products">
                    @for ($i = 0; $i < 20; $i++)
                        <div class="col-md-3 item">
                            <div class="thumbnail">
                                <img class="group list-group-image" src="http://placehold.it/320x200" alt="">
                                <div class="caption">
                                    <h4 class="group inner list-group-item-heading"><a href="#"> Movie {{$i}} </a></h4>
                                    <p class="group inner list-group-item-text">This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                                <div class="ratings text-right">
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class  ="glyphicon glyphicon-star-empty"></span>
                                </div>
                            </div>
                        </div>
                    @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
