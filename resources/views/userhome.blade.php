@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <a href="{{ route('all') }}">
                    <div class="card-header">Admin</div>
                </a>
                <a href="{{ route('allshows') }}">
                    <div class="card-header">User</div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection