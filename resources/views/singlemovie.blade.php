@extends('layouts.app')


@section('content')
    <div class="container">

        <div class="row ">
            <div class="col-md-11">

                <h4 style="display:inline ">
                    <span style="border-left:1px solid black"></span>
                    @foreach ($singlemovie[0]->genre_array as $gen)
                        @foreach($gen as $gen1)
                            @if(is_string($gen1))
                            <span style="border-right:1px solid black"> &nbsp; {{ $gen1 }} &nbsp</span>
                            @endif
                        @endforeach
                    @endforeach
                </h4>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">

                <img style="height:400px;width:400px" src="{{$singlemovie[0]->base_url . $singlemovie[0]->image}}" alt="">
            </div>
            <div class="col-md-7 col-md-offset-1">
                <h3>{{$singlemovie[0]->title}}</h3>
                <br>
                <p>{{$singlemovie[0]->overview}}</p>

                <hr>

                <div class="row">
                    <div class="col-md-2">
                        <span class="glyphicon glyphicon-star" style="color:yellow ;  font-size: 45px" ></span>
                    </div>
                    <p> &nbsp;&nbsp;    {{$singlemovie[0]->vote_average}} / 10 </p>
                    <p> of {{$singlemovie[0]->vote_count}} ratings</p>
                </div>
                <hr>

                <form id="form" method="post" onchange="$('#form').submit();" action="/watched/{{ $singlemovie[0]->id }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="checkbox">
                        @if($iswatched)
                            <h4>Watched :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" value="" checked></h4>
                        @else
                            <h4>Watched :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" value=""></h4>
                        @endif
                    </div>
                </form>

                <br>
                <div class="col-md-7">
                    <form method="post" action="/rate/{{$singlemovie[0]->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <select name="rating" class="selectpicker col-md-4">
                            <option selected disabled>Rate: </option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <button class="btn btn-default" type="submit">Rate this movie!</button>
                    </form>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="page-header">
                    <h4><span class="pull-right">{{count($comments)}}</span> Comments </h4>
                </div>



                    @foreach($comments as $comment)
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                </div><!-- /col-sm-12 -->
                            </div><!-- /row -->
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="thumbnail">
                                        <?php
                                            $pic=\app\DBImpl::getPictureByUser($comment[0])
                                            ?>
                                        <img class="img-responsive user-photo" src="{{$pic}}">
                                    </div><!-- /thumbnail -->
                                </div><!-- /col-sm-1 -->
                                <div class="col-sm-5">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <?php
                                            $user=\app\DBImpl::getUserById($comment[0])
                                                ?>
                                            <span class="glyphicon glyphicon-user"></span>
                                            <strong>{{$user}}</strong> <span class="text-muted"></span>
                                        </div>
                                        <div class="panel-body">
                                            {{$comment[1]}}
                                        </div><!-- /panel-body -->
                                    </div><!-- /panel panel-default -->
                                </div><!-- /col-sm-5 -->


                            </div>
                        </div>
                    @endforeach

                        <div class="well">
                            <h4>Leave a Comment:</h4>
                            <form  method="POST" action="{{$singlemovie[0]->id}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <textarea name="comment" class="form-control" rows="3" ></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
        </div>
    </div>
    </div>
@endsection