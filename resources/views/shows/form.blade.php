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
                    <li><a href="{{route('show-home')}}">Shows</a></li> /
                    <li>Update</li>
                </ul>
                <div class="panel-body">
                    <form class="form-horizontal" method="get" action="{{ route('show-update', ['id'=>$show->id]) }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="language" class="col-md-4 control-label">Theatre</label>
                            <div class="col-md-6">
                                <select class="form-control" name="theatre_id" required >
                                    <option value="{{ $theatre->id }}">{{ $theatre->name }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="language" class="col-md-4 control-label">Showtime</label>
                            <div class="col-md-6">
                                <select class="form-control" name="showtime_id" required >
                                @foreach($showtimes as $showtime)
                                    @if ($show->showtime_id == $showtime->id)
                                    <option value="{{ $showtime->id }}" selected>{{ $showtime->name }}</option>
                                    @else
                                    <option value="{{ $showtime->id }}">{{ $showtime->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="language" class="col-md-4 control-label">Movie Name</label>
                            <div class="col-md-6">
                        <select class="form-control" name="movie_id" required>
                                    @foreach($movies as $movie)
                                    <option value="{{ $movie->id }}">{{ $movie->movie_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="language" class="col-md-4 control-label">Start Date</label>
                            <div class="col-md-6">
                        <input type="date" class="form-control" name="start_date" required>
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