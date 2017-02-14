@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{$user->name}}
                        <div class="pull-right">
                            Joined on {{$user->created_at->format('M d,Y \a\t h:i a') }}
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <?php
                                $pic = \App\DBImpl::getPictureByUser(Auth::user()->id);

                                ?>
                                <img class="img-responsive user-photo" src="/{{$pic}}">
                            </div>
                        </div>
                        <form method="post" action="{{Auth::user()->id}}/uploadpicture" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="userfile">Profile picture</label>
                                <input type="file" class="form-control" style="width: 500px;" name="userfile">
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                            <a href="{{ url('/') }}" class="btn btn-warning">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
