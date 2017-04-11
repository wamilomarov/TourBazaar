@extends('withHeader')

@section('content')

    <!--// Content //-->
    <div class="kd-content">

        <!--// Page Section //-->
        <section class="kd-pagesection" style=" padding: 0px 0px 0px 0px; background: #ffffff; ">
            <div class="container">
                <div class="row">

                    <!--// Package Detail //-->
                    <div class="col-md-8">
                        <div class="col-md-12">
                            <div class="kd-modrentitle thememargin">
                                <h3>{{$tour->title}}</h3>
                            </div>
                        </div>
                        <div class="kd-package-detail">

                            <figure class="detail-thumb">
                                <!--<a href="#"><img src="" alt=""></a>-->
                                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                        <li data-target="#myCarousel" data-slide-to="3"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        @foreach($tour->photos as $photo)
                                            @if($loop->first)
                                        <div class="item active">
                                            <img src="../uploads/tour_images/{{$photo->photo}}" width="800" height="600">
                                        </div>
                                            @else
                                        <div class="item">
                                            <img src="../uploads/tour_images/{{$photo->photo}}" width="800" height="600">
                                        </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </figure>
                            <div class="kd-pkg-info">
                                <ul>
                                    <li><i class="fa fa-map-marker"></i> <strong>{{__('messages.countries')}} : </strong>
                                        @foreach($tour->countries as $country) {{$country->name}}
                                            @if(!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </li>
                                    <li><i class="fa fa-paper-plane"></i> <strong>{{__('messages.cities')}} : </strong>
                                        @foreach($tour->cities as $city) {{$city->name}}
                                            @if(!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </li>
                                    <li><i class="fa fa-calendar"></i> <strong>{{__('messages.expireDate')}} : </strong>
                                        {{date("d M Y", strtotime($tour->expire_date))}}
                                    </li>
                                    <li><i class="fa fa-tag"></i> <strong>{{__('messages.price')}} : </strong> @if($tour->currency == 'AZN') &#8380; @else &#36; @endif {{$tour->price}}
                                    </li>
                                </ul>
                                <a href="#" class="kd-booking-btn thbg-color" data-toggle="modal" data-target="#searchmodalbox">{{__('messages.bookNow')}}</a>
                                <!-- Modal -->
                                <div class="modal fade kd-loginbox" id="searchmodalbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                                                <div class="kd-login-title">
                                                    <h2>{{__('messages.enterYourDetails')}}</h2>
                                                </div>
                                                <form method="post" action="{{url('sendRequest')}}">
                                                    {{csrf_field()}}
                                                    <p><i class="fa fa-user"></i><input type="text" name="client_full_name" placeholder="{{__('messages.enterYourFullName')}}"></p>
                                                    <p><i class="fa fa-phone"></i><input type="tel" name="client_phone" placeholder="{{__('messages.enterYourPhoneNumber')}}"></p>
                                                    <p><i class="fa fa-envelope-o"></i><input type="email" name="client_email" placeholder="{{__('messages.enterYourEmail')}}"></p>
                                                    <p><i class="fa fa-users"></i><input type="number" name="number_of_places" step="1" max="25" min="1" value="1" placeholder="{{__('messages.enterNumberOfPlaces')}}"></p>
                                                    <input type="hidden" name="tour_id" value="{{$tour->id}}">
                                                    <input type="hidden" name="user_id" value="{{$tour->user_id}}">
                                                    <p><input type="submit" value="{{__('messages.book')}}" class="thbg-color">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kd-rich-editor">
                                <h2>{{__('messages.description')}}</h2>
                                <p>{{$tour->description}}</p>
                            </div>



                            <!--<div class="kd-related-post kd-package-post">
                                <div class="kd-section-title">
                                    <h2>Other packages</h2>
                                </div>
                                <ul class="row">
                                    <li class="col-md-4">
                                        <figure>
                                            <a href="#"><img src="extraimages/package-detail3.jpg" alt=""></a>
                                            <figcaption><a href="#">Paris and Bordeaux</a></figcaption>
                                        </figure>
                                    </li>
                                    <li class="col-md-4">
                                        <figure>
                                            <a href="#"><img src="extraimages/package-detail4.jpg" alt=""></a>
                                            <figcaption><a href="#">Paris and Bordeaux</a></figcaption>
                                        </figure>
                                    </li>
                                    <li class="col-md-4">
                                        <figure>
                                            <a href="#"><img src="extraimages/package-detail5.jpg" alt=""></a>
                                            <figcaption><a href="#">Paris and Bordeaux</a></figcaption>
                                        </figure>
                                    </li>
                                </ul>
                            </div>-->

                        </div>
                    </div>
                    <!--// Package Detail //-->

                    <aside class="col-md-4">
                        <div class="about-agency">
                            <figure>
                                <img src="../uploads/cover_images/{{$tour->user_cover}}" alt="" width="50%" style="border-radius: 50%" draggable="false">
                            </figure>
                            <div class="agency-details">
                                <h2>{{$tour->user_name}}</h2>
                                <small>
                                    <i class="fa fa-mobile fa-2x fa-fw"></i>
                                    <span>{{$tour->user_mobile_phone}}</span>
                                </small><br><br>
                                <small>
                                    <i class="fa fa-phone fa-2x fa-fw"></i>
                                    <span>{{$tour->user_work_phone}}</span>
                                </small><br><br>
                                <small>
                                    <i class="fa fa-envelope-o fa-2x fa-fw"></i>
                                    <span>{{$tour->user_email}}</span>
                                </small>
                            </div>
                            <hr>
                        </div>

                        <!--<div class="widget widget_search">
                            <div class="kd-widget-title">
                                <h2>Search Widget</h2>
                            </div>
                            <form>
                                <input type="text" placeholder="Search">
                                <input type="submit" value="">
                                <i class="fa fa-search"></i>
                            </form>
                        </div>-->

                        <div class="widget widget-blogpost">
                            <div class="kd-widget-title">
                                <h2>{{__('messages.otherToursOf')}} {{$tour->user_name}}</h2>
                            </div>
                            <ul>
                                @foreach($tour->tours as $tour)
                                <li>
                                    <figure>
                                        <a href="#"><img src="../uploads/tour_images/{{$tour->photo}}" alt="{{$tour->title}}"></a>
                                    </figure>
                                    <div class="kd-post-info">
                                        <h6><a href="{{url('getTour', $tour->id)}}">{{$tour->title}}</a></h6>
                                        <time> Until {{date("d M Y", strtotime($tour->expire_date))}}</time>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>

                </div>
            </div>
        </section>
        <!--// Page Section //-->

    </div>
    <!--// Content //-->

@endsection