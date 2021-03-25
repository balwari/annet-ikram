@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Update</h3>
                </div>
                <ul class="breadcrumb">
                    <li><a href="{{route('all')}}">Home </a></li> /
                    <li><a href="{{route('movie-home')}}">Movies </a></li> /
                    <li>Update</li>
                </ul>
                <div class="panel-body">
                    <form class="form-horizontal" method="get" action="{{ route('movie-update', ['id'=>$movie->id]) }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Movie Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="movie_name" placeholder="Movie Name" value="{{ $movie->movie_name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="language" class="col-md-4 control-label">Language</label>
                            <div class="col-md-6">
                                <select class="form-control" name="language" required>
                                    @if ($movie->language == 'Hindi')
                                    <option value="Hindi" selected>Hindi</option>
                                    @else
                                    <option value="Hindi">Hindi</option>
                                    @endif
                                    @if ($movie->language == 'Telugu')
                                    <option value="Telugu" selected>Telugu</option>
                                    @else
                                    <option value="Telugu">Telugu</option>
                                    @endif
                                    @if ($movie->language == 'English')
                                    <option value="English" selected>English</option>
                                    @else
                                    <option value="English">English</option>
                                    @endif
                                    @if ($movie->language == 'Tamil')
                                    <option value="Tamil" selected>Tamil</option>
                                    @else
                                    <option value="Tamil">Tamil</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="language" class="col-md-4 control-label">Is Active</label>
                            <div class="col-md-6">
                                <select class="form-control" name="is_active" required>
                                    @if ($movie->is_active == 'Active')
                                    <option value="Active" selected>Active</option>
                                    @else
                                    <option value="Active">Active</option>
                                    @endif
                                    @if ($movie->is_active == 'InActive')
                                    <option value="InActive" selected>InActive</option>
                                    @else
                                    <option value="InActive">InActive</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection