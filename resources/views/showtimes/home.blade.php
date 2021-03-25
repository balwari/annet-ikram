@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 style="text-align:center;">Show Times</h3>
    <ul class="breadcrumb">
        <li><a href="{{route('all')}}">Home </a></li> /
        <li>Show TImes</li>
    </ul>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Theatre Name</th>
                <th>Show Name</th>
                <th>Start Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($showtimes as $showtime)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $showtime->theatre_name }}</td>
                <td>{{ $showtime->name }}</td>
                <td>{{ $showtime->start_time }}</td>
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Option">
                        <button type="button" class="btn btn-info" onClick="location.href='{{ route('showtime-get', ['id'=>$showtime->id]) }}'">
                            Update
                        </button>
                        <button type="button" class="btn btn-danger" onClick="location.href='{{ route('showtime-delete', ['id'=>$showtime->id]) }}'">
                            Delete
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{route('showtime-create')}}">
                            <div class="form-group">
                                <select class="form-control" name="theatre_id" required>
                                    @foreach($theatres as $theatre)
                                    <option value="{{ $theatre->id }}">{{ $theatre->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="name" required>
                                    <option value="Noon">Noon</option>
                                    <option value="Matinee">Matinee</option>
                                    <option value="First">First</option>
                                    <option value="Second">Second</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="time" class="form-control" name="start_time" required>
                            </div>
                            <div class="form-group" style="text-align:center;"><input type="submit" class="btn btn-success" value="Add New"></div>
                            {{ $showtimes->links() }}
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection