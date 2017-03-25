@extends('admin.panel')

@section('content')
    <style>
        .col-md-4, .col-md-6{
            margin-bottom: 30px;
            margin-top: 0;
        }
    </style>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h2>Upload Profile Image</h2>

            <form class="form-horizontal" role="form" method="POST" action="{{ route('updateAgency') }}">
                {{ csrf_field() }}

               <input type="hidden" name="id" value="{{$id}}">
                <div class="form-group">
                    <label for="image" class="col-md-4 control-label">Logo image</label>

                    <div class="col-md-6">
                        <input id="image" type="file" class="form-control" name="cover_image">

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
