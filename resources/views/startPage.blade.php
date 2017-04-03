@extends('app')

@section('body')

    <div id="main">
        <div class="exp aze">
            <div class="backgroundImage"></div>
            <div class="backgroundOverLay"></div>

            <a class="expLink" href="{{url('localTours')}}">
                <div class="expLinkContent">Explore Azerbaijan</div>
            </a>
        </div>
        <div class="exp world">
            <div class="backgroundImage"></div>
            <div class="backgroundOverLay"></div>

            <a class="expLink" href="{{url('worldTours')}}">
                <div class="expLinkContent">Explore World</div>
            </a>
        </div>
        <a class="extraBtn" href="{{url('tours')}}">
            <div class="">See All Tours</div>
        </a>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.js">
    </script>
@endsection