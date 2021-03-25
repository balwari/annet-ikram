@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Update</h3>
                </div>
                <ul class="breadcrumb">
                    <li><a href="{{route('all')}}">Home </a></li> /
                    <li><a href="{{route('theatre-home')}}">Theatres </a></li> /
                    <li>Update</li>
                </ul>
                <div class="panel-body">
                    <form class="form-horizontal" method="get" action="{{ route('theatre-update', ['id'=>$theatre->id]) }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="name" value="{{ $theatre->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="city" class="col-md-4 control-label">City</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="city" placeholder="city" required>{{ $theatre->city }}</textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection