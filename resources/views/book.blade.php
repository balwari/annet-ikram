@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 style="text-align:center;">Book</h3>
    <ul class="breadcrumb">
        <li><a href="{{route('allshows')}}">Home </a></li> /
        <li>Book</li>
    </ul>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Movie Name</th>
                <th>Theatre</th>
                <th>Showtime</th>
                <th>Ticket</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $show->movie_name }}</td>
                <td>{{ $show->theatre_name }}</td>
                <td>{{ $show->showtime_name }}</td>
                <td>Rs.500</td>
                <td>
        </tbody>
    </table>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" method="GET" action="{{ route('book', ['id'=>$show->id]) }}">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Enter Name" required></div>
                            <div class="form-group">
                                <input type="tel" class="form-control" name="mobile" placeholder="Enter Mobile Number" required></div>
                            <div class="form-group">
                                <select class="form-control" name="no_tickets" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                            <div class="form-group" style="text-align:center;"><input type="submit" class="btn btn-success" value="Submit"></div>
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection