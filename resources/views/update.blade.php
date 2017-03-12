@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$user->name}}'s Profile</div>

                    <div class="panel-body">

                            <img src="/uploads/cover_images/{{$user->cover_image}}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;">
                            <h1>{{$user->email}}</h1>
                        <form enctype="multipart/form-data" method="POST" action="{{ route('updateAgency') }}">
                            <label> Update profile image</label>
                            <input type="file" name="cover_image">
                            <input type="hidden" value="{{$user->id}}" name="id">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="submit" name="submit" class="pull-right btn btn-sm btn-primary" value="Submit">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
