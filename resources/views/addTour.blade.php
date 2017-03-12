@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('addTour') }}">
                            {{ csrf_field() }}

                            <input type="number" name="user_id" value="34">

                            <div class="input_fields_wrap countries">
                                <button class="add_countries_button">Add More Countries</button>
                                <div><input class="cnt" type="text" name="countries[]" list="countries" placeholder="Countries"></div>
                            </div>

                            <div class="input_fields_wrap cities">
                                <button class="add_cities_button">Add More Cities</button>
                                <div><input class="ct" type="text" name="cities[]" list="cities" placeholder="Cities"></div>
                            </div>

                            <input type="text" name="title_az" placeholder="Title az">

                            <input type="text" name="title_en" placeholder="Title en"><br>

                            <input type="date" name="expire_time">

                            <input type="number" name="price">

                            <select name="currency">
                                <option value="USD">USD</option>
                                <option value="AZN">AZN</option>
                            </select><br>

                            <textarea name="description_az" placeholder="Description AZ"></textarea>

                            <textarea name="description_en" placeholder="Description EN"></textarea><br>

                            Hot Offer! <input type="checkbox" name="is_hot">

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>

                        <datalist id="countries">
                            @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </datalist>

                        <datalist id="cities">
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </datalist>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
