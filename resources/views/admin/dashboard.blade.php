@extends('layouts.app')

@section('content')
<div class="container-fluid">
<h3 style="text-align:center;">Admin</h3>           

<a href="{{route('theatre-home')}}">
    <div class="card">
        <h1>Theatres</h1>
    </div>
</a>
<a href="{{route('movie-home')}}">
    <div class="card">
        <h1>Movies</h1>
    </div>
</a>
<a href="{{route('showtime-home')}}">
    <div class="card">
        <h1>Show Times</h1>
    </div>
</a>
<a href="{{route('show-home')}}">
    <div class="card">
        <h1>Shows</h1>
    </div>
</a>
<a href="{{route('bookings')}}">
    <div class="card">
        <h1>Bookings</h1>
    </div>
</a>

    @endsection

<style>
    .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    width: 300px;
    height: auto;
    margin: 5px;
    float:left;
    text-align: center;
    font-family: arial;
    text-transform: capitalize;
  }
  
  .price {
    color: grey;
    font-size: 22px;
  }
  
  .card button {
    border: none;
    outline: 0;
    padding: 12px;
    color: white;
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