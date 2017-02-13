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

                        <form method="post" action="#">
                            <div class="form-group">
                                <label for="userfile">Profile picture</label>
                                <input type="file" class="form-control" name="userfile">
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
