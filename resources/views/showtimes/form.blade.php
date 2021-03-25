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
                    <li><a href="{{route('showtime-home')}}">Showtimes </a></li> /
                    <li>Update</li>
                </ul>
                <div class="panel-body">
                    <form class="form-horizontal" method="get" action="{{ route('showtime-update', ['id'=>$showtime->id]) }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="language" class="col-md-4 control-label">Theatre</label>
                            <div class="col-md-6">
                                <select class="form-control" name="theatre_id" required>
                                    @foreach($theatres as $theatre)
                                    @if ($showtime->theatre_id == $theatre->id)
                                    <option value="{{ $theatre->id }}" selected>{{ $theatre->name }}</option>
                                    @else
                                    <option value="{{ $theatre->id }}">{{ $theatre->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="language" class="col-md-4 control-label">Start Time</label>
                            <div class="col-md-6">
                                <select class="form-control" name="name" required>
                                    @if ($showtime->name == 'Noon')
                                    <option value="Noon" selected>Noon</option>
                                    @else
                                    <option value="Noon">Noon</option>
                                    @endif
                                    @if ($showtime->name == 'Matinee')
                                    <option value="Matinee" selected>Matinee</option>
                                    @else
                                    <option value="Matinee">Matinee</option>
                                    @endif
                                    @if ($showtime->name == 'First')
                                    <option value="First" selected>First</option>
                                    @else
                                    <option value="First">First</option>
                                    @endif
                                    @if ($showtime->name == 'Second')
                                    <option value="Second" selected>Second</option>
                                    @else
                                    <option value="Second">Second</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                <input type="time" class="form-control" name="start_time" required value="{{$showtime->start_time}}">
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