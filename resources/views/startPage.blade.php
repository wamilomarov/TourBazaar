@extends('withHeader')

@section('content')

    <div class="kd-content"">
        <div id="main">
            <div class="exp aze">
                <div class="backgroundImage"></div>
                <div class="backgroundOverLay"></div>

                <a class="expLink" href="{{url('setToursType?tourType=local')}}">
                    <div class="expLinkContent">{{__('messages.startPageExploreAzerbaijan')}}</div>
                </a>
            </div>
            <div class="exp world">
                <div class="backgroundImage"></div>
                <div class="backgroundOverLay"></div>

                <a class="expLink" href="{{url('setToursType?tourType=world')}}">
                    <div class="expLinkContent">{{__('messages.startPageExploreWorld')}}</div>
                </a>
            </div>
            <a class="extraBtn" href="{{url('setToursType?tourType=all')}}">
                <div class="">{{__('messages.startPageSeeAllTours')}}</div>
            </a>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.js">
    </script>
@endsection