@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 style="text-align:center;">Theatres</h3>
    <ul class="breadcrumb">
        <li><a href="{{route('all')}}">Home </a></li> /
        <li>Theatres</li>
    </ul>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>City</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($theatres as $theatre)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $theatre->name }}</td>
                <td>{{ $theatre->city }}</td>
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Option">
                        <button type="button" class="btn btn-info" onClick="location.href='{{ route('theatre-get', ['id'=>$theatre->id]) }}'">
                            Update
                        </button>
                        <button type="button" class="btn btn-danger" onClick="location.href='{{ route('theatre-delete', ['id'=>$theatre->id]) }}'">
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
                        <form class="form-horizontal" method="POST" action="{{route('theatre-create')}}">
                            <div class="form-group"><input type="text" class="form-control" name="name" placeholder="name" required></div>
                            <div class="form-group"><input type="text" class="form-control" name="city" placeholder="city" required></div>
                            <div class="form-group" style="text-align:center;"><input type="submit" class="btn btn-success" value="Add New"></div>
                            {{ $theatres->links() }}
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection