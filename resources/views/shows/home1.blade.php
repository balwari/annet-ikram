@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 style="text-align:center;">Add Shows</h3>
    <ul class="breadcrumb">
        <li><a href="{{route('all')}}">Home </a></li> /
        <li><a href="{{route('show-home')}}">Shows </a></li> /
        <li>Add Show</li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{route('show-create')}}">
                            <div class="form-group">
                                <select class="form-control" name="theatre_id" required>
                                    <option value="{{ $theatre->id }}">{{ $theatre->name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="showtime_id" required>
                                    @foreach($showtimes as $showtime)
                                    <option value="{{ $showtime->id }}">{{ $showtime->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="movie_id" required>
                                    @foreach($movies as $movie)
                                    <option value="{{ $movie->id }}">{{ $movie->movie_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="date" class="form-control" name="start_date" required>
                            </div>
                            <div class="form-group" style="text-align:center;">
                            <input type="submit" class="btn btn-success" value="Add New"></div>
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection