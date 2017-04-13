@extends('withHeader')

@section('content')
    <link rel="stylesheet" href="../assets/css/firstPage.css">
    <div id="firstPageMain">

        <div class="exp aze ">
            <div class="backgroundImage"></div>
            <div class="backgroundOverLay"></div>

            <a class="expLink" href="{{url('/setToursType?tourType=local')}}">
                <div class="expLinkContent">Explore Azerbaijan</div>
            </a>
        </div>

        <div class="exp world ">
            <div class="backgroundImage"></div>
            <div class="backgroundOverLay"></div>

            <a class="expLink" href="{{url('/setToursType?tourType=world')}}">
                <div class="expLinkContent">Explore World</div>
            </a>
        </div>

        <div class="extraBtn">
            <a href="{{url('/setToursType?tourType=all')}}">
                <div>See All Tours</div>
            </a>
        </div>

    </div>

@endsection