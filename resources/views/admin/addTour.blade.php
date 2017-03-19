@extends('admin.app')

@section('content')
    <div class="content-section">
        <div class="container-liquid">
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <div class="sec-box">
                        <a class="closethis">Close</a>
                        <header>
                            <h2 class="heading">Create new tour</h2>
                        </header>
                        <div class="contents">
                            <a class="togglethis">Toggle</a>
                            <div class="table-box">
                                <table class="table">
                                    <thead>
                                    {{--<tr>--}}
                                        {{--<th class="col-md-4">Description</th>--}}
                                        {{--<th class="col-md-8">Form Elements</th>--}}
                                    {{--</tr>--}}
                                    </thead>
                                    <tbody>
                                    <form action="{{url('addTour')}}" method="post">
                                        {{ csrf_field() }}
                                    <tr>
                                        <td class="col-md-4">Title (AZ)</td>
                                        <td class="col-md-8"><input type="text" placeholder="Title (AZ)" class="form-control" name="title_az" id="title_az" ></td>
                                    </tr>

                                    <tr>
                                        <td class="col-md-4">Title (EN)</td>
                                        <td class="col-md-8"><input type="text" placeholder="Title (EN)" class="form-control" name="title_en"></td>
                                    </tr>

                                    <tr>
                                        <td class="col-md-4">Places of visit</td>
                                        <td class="col-md-8">
                                            <input type="text" name="countries" placeholder="Countries" list="countries" id="countries" onkeyup="getCountries()" class="form-control">
                                            <input type="text" name="cities" placeholder="Cities" list="cities" id="cities" onfocus="getCitiesList()" onkeyup="getCities()" class="form-control">
                                        </td>
                                    </tr>



                                    <tr>
                                        <td class="col-md-4">Expire Date</td>
                                        <td class="col-md-8"><input type="date" class="form-control"></td>
                                    </tr>

                                    <tr>
                                        <td class="col-md-4">Price</td>
                                        <td class="col-md-8"><input type="number" placeholder="Price" class="form-control" style="display: inline; width: auto;">
                                            <select class="form-control" style="display: inline; width: auto;">
                                                <option value="AZN">AZN</option>
                                                <option value="USD">USD</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4">Suggest as a hot offer</td>
                                        <td class="col-md-8">
                                            <div class="onoffswitch android">
                                                <input type="checkbox" name="is_hot" class="onoffswitch-checkbox" id="android">
                                                <label class="onoffswitch-label" for="android">
                                                    <div class="onoffswitch-inner">
                                                        <div class="onoffswitch-active"><div class="onoffswitch-switch">YES</div></div>
                                                        <div class="onoffswitch-inactive"><div class="onoffswitch-switch">NO</div></div>
                                                    </div>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4">Description (AZ)</td>
                                        <td class="col-md-8"><textarea rows="3" class="form-control" name="description_az"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4">Description (EN)</td>
                                        <td class="col-md-8"><textarea rows="3" class="form-control" name="description_en"></textarea></td>
                                    </tr>

                                    <tr>
                                        <td class="col-md-4">Photos (Max. 3 photos)</td>
                                        <td class="col-md-8"><input type="file" name="photos" multiple></td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4"></td>
                                        <td class="col-md-6"><button type="submit" class="btn btn-primary btn-lg">Add</button></td>
                                    </tr>
                                    </form>
                                    </tbody>
                                </table>

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