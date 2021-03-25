@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 style="text-align:center;">Shows</h3>
    <ul class="breadcrumb">
        <li><a href="{{route('all')}}">Home </a></li> /
        <li>Shows</li>
    </ul>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Theatre Name</th>
                <th>ShowTime</th>
                <th>Movie Name</th>
                <th>Release Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shows as $show)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $show->theatre_name }}</td>
                <td>{{ $show->showtime_name }}</td>
                <td>{{ $show->movie_name }}</td>
                <td>{{ $show->start_date }}</td>
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Option">
                        <button type="button" class="btn btn-info" onClick="location.href='{{ route('show-get', ['id'=>$show->id]) }}'">
                            Update
                        </button>
                        <button type="button" class="btn btn-danger" onClick="location.href='{{ route('show-delete', ['id'=>$show->id]) }}'">
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
                        <form class="form-horizontal" method="POST" action="{{route('show-get-theatre')}}">
                            <div class="form-group">
                                <select class="form-control" name="theatre_id" required>
                                    @foreach($theatres as $theatre)
                                    <option value="{{ $theatre->id }}">{{ $theatre->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" style="text-align:center;"><input type="submit" class="btn btn-success" value="Add New"></div>
                            {{ $shows->links() }}
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection