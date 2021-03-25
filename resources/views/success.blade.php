@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 style="text-align:center;">{{$message}}</h3>
    
    <a href="{{ route('allshows') }}">
                    <div class="card-header">User</div>
                </a>
@endsection