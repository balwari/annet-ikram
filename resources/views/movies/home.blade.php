@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 style="text-align:center;">Movies</h3>
    <ul class="breadcrumb">
        <li><a href="{{route('all')}}">Home </a></li> /
        <li>Movies</li>
    </ul>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Movie Name</th>
                <th>Language</th>
                <th>Is Active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $movie->movie_name }}</td>
                <td>{{ $movie->language }}</td>
                <td>{{ $movie->is_active }}</td>
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Option">
                        <button type="button" class="btn btn-info" onClick="location.href='{{ route('movie-get', ['id'=>$movie->id]) }}'">
                            Update
                        </button>
                        <button type="button" class="btn btn-danger" onClick="location.href='{{ route('movie-delete', ['id'=>$movie->id]) }}'">
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
                        <form class="form-horizontal" method="POST" action="{{route('movie-create')}}">
                            <div class="form-group">
                                <input type="text" class="form-control" name="movie_name" placeholder="Movie Name" required></div>
                            <div class="form-group">
                                <select class="form-control" name="language" required>
                                    <option value="Hindi">Hindi</option>
                                    <option value="Telugu">Telugu</option>
                                    <option value="English">English</option>
                                    <option value="Tamil">Tamil</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="is_active" required>
                                    <option value="Active">Active</option>
                                    <option value="InActive">InActive</option>
                                </select>
                            </div>
                            <div class="form-group" style="text-align:center;"><input type="submit" class="btn btn-success" value="Add New"></div>
                            {{ $movies->links() }}
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection