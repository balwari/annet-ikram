@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 style="text-align:center;">Bookings</h3>
    <ul class="breadcrumb">
        <li><a href="{{route('all')}}">Home </a></li> /
        <li>Bookings</li>
    </ul>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Ticket No</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>No of Tickets</th>
                <th>Amount</th>
                <th>Movie</th>
                <th>Theatre</th>
                <th>Showtime</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr>
                <th>{{ $booking->id }}</th>
                <td>{{ $booking->name }}</td>
                <td>{{ $booking->mobile }}</td>
                <td>{{ $booking->no_tickets }}</td>
                <td>{{ $booking->amount }}</td>
                <td>{{ $booking->movie_name }}</td>
                <td>{{ $booking->theatre_name }}</td>
                <td>{{ $booking->showtime_name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection