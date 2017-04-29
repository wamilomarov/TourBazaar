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
                                    <form action="{{url('searchTours')}}" method="get">
                                    <select name="order" onchange='this.form.submit()'>
                                        <option value=1 @if($form['order'] == 1) selected @endif>{{__('messages.priceLowToHigh')}}</option>
                                        <option value=2 @if($form['order'] == 2) selected @endif>{{__('messages.priceHighToLow')}}</option>
                                        <option value=3 @if($form['order'] == 3) selected @endif>{{__('messages.new')}}</option>
                                        <option value=4 @if($form['order'] == 4) selected @endif>{{__('messages.is_hot')}}</option>
                                    </select>
                                        @foreach($form as $key => $value)
                                            @if($key != 'order')
                                                <input type="hidden" name="{{$key}}" value="{{$value}}">
                                            @endif
                                        @endforeach
                                    </form>
                                </div>
                            </div>
                            <div class="row">

                                @foreach($tours['tours'] as $tour)
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

                                <div class="pagination">
                                    @if($tours['prev'] != '#')<a href="{{$tours['prev']}}" ><i class="fa fa-angle-double-left"></i></a>@endif
                                {{--<a href="#">1</a>--}}
                                {{--<a href="#">2</a>--}}
                                {{--<span>3</span>--}}
                                {{--<a href="#">4</a>--}}
                                {{--<a href="#">5</a>--}}
                                {{--<a href="#">6</a>--}}
                                    @if($tours['next'] != '#')<a href="{{$tours['next']}}" ><i class="fa fa-angle-double-right"></i></a>@endif
                                </div>
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
