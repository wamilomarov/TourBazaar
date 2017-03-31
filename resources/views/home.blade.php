@extends('withHeader')

@section('content')
    <style>
        .carousel-inner .item img {
            height: 100%; !important;
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
                                    <label>Sort by</label>
                                    <select>
                                        <option>Relevance</option>
                                        <option>Price: Low to High</option>
                                        <option>Price: High to Low</option>
                                        <option>Hot Offer</option>
                                        <option>New</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($tours as $tour)
                                <article class="col-md-3">
                                    <figure>
                                        <a href="{{url('getTour', $tour->id)}}">
                                            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                                                <!-- Wrapper for slides -->
                                                <div class="carousel-inner" role="listbox">
                                                    @foreach($tour->photos as $photo)
                                                        @if($loop->first)
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
                                        </a>
                                        <figcaption>
                                            <span class="package-price thbg-color">{{$tour->price ." ". $tour->currency}}</span>
                                            <div class="kd-bottomelement">
                                                <h5><a href="{{url('getTour', $tour->id)}}">{{$tour->title}}</a></h5>
                                                <div class="days-counter"> Until {{date("d M Y", strtotime($tour->expire_date))}}</div>
                                            </div>
                                            @if($tour->is_hot)
                                            <div class="hot-offer"><span>Hot Offer</span></div>
                                            @endif
                                        </figcaption>
                                    </figure>
                                </article>

                                @endforeach
                                <article class="col-md-3">
                                    <figure>
                                        <a href="#"><img src="extraimages/pakege3.jpg" alt=""></a>
                                        <figcaption>
                                            <span class="package-price thbg-color">$7,600</span>
                                            <div class="kd-bottomelement">
                                                <h5><a href="#">Paris and Bordeaux</a></h5>
                                                <div class="days-counter" style="background-color: #00c4d6;"><span>15</span> <br> days</div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="col-md-3">
                                    <figure>
                                        <a href="#"><img src="extraimages/pakege4.jpg" alt=""></a>
                                        <figcaption>
                                            <span class="package-price thbg-color">$7,600</span>
                                            <div class="kd-bottomelement">
                                                <h5><a href="#">Paris and Bordeaux</a></h5>
                                                <div class="days-counter" style="background-color: #e61010;"><span>15</span> <br> days</div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="col-md-3">
                                    <figure>
                                        <a href="#"><img src="extraimages/pakege3.jpg" alt=""></a>
                                        <figcaption>
                                            <span class="package-price thbg-color">$7,600</span>
                                            <div class="kd-bottomelement">
                                                <h5><a href="#">Paris and Bordeaux</a></h5>
                                                <div class="days-counter" style="background-color: #00c4d6;"><span>15</span> <br> days</div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="col-md-3">
                                    <figure>
                                        <a href="#"><img src="extraimages/pakege4.jpg" alt=""></a>
                                        <figcaption>
                                            <span class="package-price thbg-color">$7,600</span>
                                            <div class="kd-bottomelement">
                                                <h5><a href="#">Paris and Bordeaux</a></h5>
                                                <div class="days-counter" style="background-color: #e61010;"><span>15</span> <br> days</div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="col-md-3">
                                    <figure>
                                        <a href="#"><img src="extraimages/pakege2.jpg" alt=""></a>
                                        <figcaption>
                                            <span class="package-price thbg-color">$7,600</span>
                                            <div class="kd-bottomelement">
                                                <h5><a href="#">Paris and Bordeaux</a></h5>
                                                <div class="days-counter"><span>15</span> <br> days</div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="col-md-3">
                                    <figure>
                                        <a href="#"><img src="extraimages/pakege2.jpg" alt=""></a>
                                        <figcaption>
                                            <span class="package-price thbg-color">$7,600</span>
                                            <div class="kd-bottomelement">
                                                <h5><a href="#">Paris and Bordeaux</a></h5>
                                                <div class="days-counter"><span>15</span> <br> days</div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="col-md-3">
                                    <figure>
                                        <a href="#"><img src="extraimages/pakege2.jpg" alt=""></a>
                                        <figcaption>
                                            <span class="package-price thbg-color">$7,600</span>
                                            <div class="kd-bottomelement">
                                                <h5><a href="#">Paris and Bordeaux</a></h5>
                                                <div class="days-counter"><span>15</span> <br> days</div>
                                            </div>
                                            <div class="hot-offer"><span>Hot Offer</span></div>

                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="pagination-wrap">
                                <div class="pagination">
                                    <a href="#"><i class="fa fa-angle-double-left"></i></a>
                                    <a href="#">1</a>
                                    <a href="#">2</a>
                                    <span>3</span>
                                    <a href="#">4</a>
                                    <a href="#">5</a>
                                    <a href="#">6</a>
                                    <a href="#"><i class="fa fa-angle-double-right"></i></a>
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
