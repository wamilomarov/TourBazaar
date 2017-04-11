@extends('withHeader')

@section('content')
    <style>
        .carousel-inner .item img {
            height: 100%;
        !important;
        }
    </style>
    <!--// Content //-->
    <div class="kd-content">

        <!--// Page Section //-->
        <section class="kd-pagesection" style=" padding: 0px 0px 10px 0px; ">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="kd-package-list">
                            <div class="row text-right">
                                <div class="col-md-3 sort-by text-left">
                                    <span></span>
                                    <label>{{__('messages.sortBy')}}</label>
                                    <select>
                                        <option>{{__('messages.relevance')}}</option>
                                        <option>{{__('messages.priceLowToHigh')}}</option>
                                        <option>{{__('messages.priceHighToLow')}}</option>
                                        <option>{{__('messages.hotOffer')}}</option>
                                        <option>{{__('messages.new')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">

                                @foreach($tours as $tour)
                                    <a href="{{url('getTour', $tour->id)}}">

                                    <article class="col-md-3">

                                            <figure>

                                                <div id="defaultPicture">
                                                    <img src="../uploads/tour_images/{{$tour->photos[0]->photo}}"
                                                         alt="">
                                                </div>
                                                <div id="myCarousel" class="carousel slide" data-ride="carousel"
                                                     data-interval="2000" style="display:none">
                                                    <!-- Wrapper for slides -->
                                                    <div class="carousel-inner" role="listbox">
                                                        @foreach($tour->photos as $photo)
                                                            @if($loop->last)
                                                                <div class="item active">
                                                                    <img src="../uploads/tour_images/{{$photo->photo}}">
                                                                </div>
                                                            @else
                                                                <div class="item">
                                                                    <img src="../uploads/tour_images/{{$photo->photo}}">
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <figcaption>
                                                    <span class="package-price thbg-color"> @if($tour->currency == 'AZN')
                                                            &#8380; @else &#36; @endif {{$tour->price }} </span>
                                                    <div class="kd-bottomelement">
                                                        <h5 class="tourTitle">{{$tour->title}}
                                                        </h5>
                                                        <div class="days-counter">
                                                            Until {{date("d M Y", strtotime($tour->expire_date))}}</div>
                                                    </div>
                                                    @if($tour->is_hot)
                                                        <div class="hot-offer"><span>{{__('messages.hotOffer')}}</span>
                                                        </div>
                                                    @endif
                                                </figcaption>
                                            </figure>

                                    </article>

                                    </a>
                                @endforeach

                            </div>


                            <div class="pagination-wrap">
                                {{$tours->links()}}
                                {{--<div class="pagination">--}}
                                {{--<a href="#"><i class="fa fa-angle-double-left"></i></a>--}}
                                {{--<a href="#">1</a>--}}
                                {{--<a href="#">2</a>--}}
                                {{--<span>3</span>--}}
                                {{--<a href="#">4</a>--}}
                                {{--<a href="#">5</a>--}}
                                {{--<a href="#">6</a>--}}
                                {{--<a href="#"><i class="fa fa-angle-double-right"></i></a>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--// Page Section //-->

    </div>
    <!--// Content //-->

@endsection
