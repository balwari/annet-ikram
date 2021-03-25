@extends('layouts.app')

@section('content')
<div class="container-fluid">
<h3 style="text-align:center;">Movie Booking App</h3>           

@foreach($shows as $show)

<div class="card">
  <div class="container">
     <b><h4>Movie Name : {{$show->movie_name}}</b></h4>
    <p>Theatre : {{$show->theatre_name}}</p>
    <p>Showtime : {{$show->showtime_name}}</p>
    <p>Price : Rs.100</p>
<p><button type="button" class="btn btn-info" onClick="location.href='{{ route('get-details-show', ['id'=>$show->id]) }}'">
Book Now </button>
</p>
  </div>
</div>
@endforeach

    @endsection

<style>
    .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    width: 395px;
    height: auto;
    margin: 5px;
    float:left;
    text-align: center;
    font-family: arial;
    text-transform: capitalize;
    padding: 10px;
  }
  
  .price {
    color: grey;
    font-size: 22px;
  }
  
  .card button {
    border: none;
    outline: 0;
    padding: 12px;
    color: white !important;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
  }
  
  .card button:hover {
    opacity: 0.7;
  }
</style>