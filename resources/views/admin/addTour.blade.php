@extends('admin.app')

@section('content')
    <style>
        .heading{
            margin-top: 37px;
        }
        .submit{
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
    <div class="content-section">
        <div class="container-liquid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="sec-box">
                        <a class="closethis">Close</a>
                        <header>
                            <h2 class="heading">Create new tour</h2>
                        </header>
                        <div class="contents">
                            <a class="togglethis">Toggle</a>
                            <div class="table-box col-xs-12">
                                {{--<table class="table">--}}
                                    {{--<thead>--}}
                                    {{--<tr>--}}
                                        {{--<th class="col-md-4">Description</th>--}}
                                        {{--<th class="col-md-8">Form Elements</th>--}}
                                    {{--</tr>--}}
                                    {{--</thead>--}}
                                    {{--<tbody>--}}
                                    <form action="{{url('addTour')}}" method="post">
                                        {{ csrf_field() }}

                                        <div class="col-md-2 heading">Titles:</div>
                                        <div class="col-md-5"><input type="text" placeholder="Title (AZ)" class="form-control" name="title_az" value="{{old('title_az')}}"></div>
                                        <div class="col-md-5"><input type="text" placeholder="Title (EN)" class="form-control" name="title_en" value="{{old('title_en')}}"></div>


                                    <div id="places">
                                        <div class="col-md-2 heading">Places of visit:</div>
                                        <div class="col-md-4"><input type="text" name="countries[]" placeholder="Countries" list="list_countries1" id="countries1" onkeyup="getCountriesList('countries1')" class="form-control"></div>
                                        <div class="col-md-4"><input type="text" name="cities[]" placeholder="Cities" list="list_cities1" id="cities1" onfocus="getCitiesList('countries1', 'cities1')" class="form-control"></div>
                                        <div class="col-md-2"><button class=" btn add_field_button">Add More Fields</button></div>
                                            <datalist id="list_countries1">

                                            </datalist>
                                            <datalist id="list_cities1">

                                            </datalist>
                                    </div>




                                        <div class="col-md-2 heading">Expire Date:</div>
                                        <div class="col-md-4"><input type="date" class="form-control" name="expire_date" value="{{old('expire_date')}}"></div>


                                        <div class="col-md-1 heading">Price:</div>
                                        <div class="col-md-3" style="display: inline;"><input type="number" placeholder="Price" name="price" class="form-control" style="display: inline;"></div>
                                            <div class="col-md-2"><select class="form-control" name="currency" style="display: inline;">
                                                <option value="AZN">AZN</option>
                                                <option value="USD">USD</option>
                                            </select></div>

                                        <div class="col-md-2">Descriptions</div>
                                        <div class="col-md-5"><textarea rows="4" class="form-control" placeholder="Description (AZ)" name="description_az"></textarea></div>
                                        <div class="col-md-5"><textarea rows="4" class="form-control" placeholder="Description (EN)" name="description_en"></textarea></div>

                                        <div class="col-md-2 heading">Hot offer</div>
                                        <div class="col-md-4">
                                            <div class="onoffswitch android">
                                                <input type="checkbox" name="is_hot" class="onoffswitch-checkbox" id="android">
                                                <label class="onoffswitch-label" for="android">
                                                    <div class="onoffswitch-inner">
                                                        <div class="onoffswitch-active"><div class="onoffswitch-switch">YES</div></div>
                                                        <div class="onoffswitch-inactive"><div class="onoffswitch-switch">NO</div></div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-2 heading">Photos (Max. 3 photos)</div>
                                        <div class="col-md-4 heading"><input type="file" name="photos" multiple></div>

                                        <div class="col-md-12"><button type="submit" class="btn btn-primary submit center-block">Add</button></div>

                                    </form>
                                    {{--</tbody>--}}
                                {{--</table>--}}

                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
    </div>
@endsection