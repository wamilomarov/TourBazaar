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
                                <h3>{{$tour->title_en}}</h3>
                            </div>
                        </div>
                        <div class="kd-package-detail">

                            <figure class="detail-thumb">
                                <!--<a href="#"><img src="extraimages/package-detail1.jpg" alt=""></a>-->
                                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="4000">
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
                                            <img src="../uploads/tour_images/{{$photo->photo}}" width="460" height="345">
                                        </div>
                                            @else
                                        <div class="item">
                                            <img src="../uploads/tour_images/{{$photo->photo}}" width="460" height="345">
                                        </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </figure>
                            <div class="kd-pkg-info">
                                <ul>
                                    <li><i class="fa fa-map-marker"></i> <strong>Countries:</strong>
                                        @foreach($tour->countries as $country) {{$country->name}}
                                            @if(!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </li>
                                    <li><i class="fa fa-paper-plane"></i> <strong>Cities:</strong>
                                        @foreach($tour->cities as $city) {{$city->name}}
                                            @if(!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </li>
                                    <li><i class="fa fa-calendar"></i> <strong>Expire Date:</strong>
                                        {{date("d M Y", strtotime($tour->expire_date))}}
                                    </li>
                                    <li><i class="fa fa-tag"></i> <strong>Price:</strong> {{$tour->price}}
                                    {{$tour->currency}}</li>
                                </ul>
                                <a href="#" class="kd-booking-btn thbg-color" data-toggle="modal" data-target="#searchmodalbox">bOOK nOW</a>
                                <!-- Modal -->
                                <div class="modal fade kd-loginbox" id="searchmodalbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                                                <div class="kd-login-title">
                                                    <h2>Enter Your Details</h2>
                                                </div>
                                                <form>
                                                    <p><i class="fa fa-user"></i><input type="text" placeholder="Enter Your Full Name"></p>
                                                    <p><i class="fa fa-phone"></i><input type="tel" placeholder="Enter Your Phone Number"></p>
                                                    <p><i class="fa fa-envelope-o"></i><input type="email" placeholder="Enter Your e-Mail"></p>
                                                    <p><input type="submit" value="Book" class="thbg-color">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <blockquote>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim </blockquote>
                            <div class="kd-rich-editor">
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
                                    kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                    voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                                    nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor
                                    sit amet</p>
                                <!--// Image Frame //-->
                                <div class="kd-imageframe">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <figure>
                                                <a href="#"><img src="extraimages/package-detail2.jpg" alt=""></a>
                                                <a href="#" class="thumb-hover"><i class="fa fa-play-circle-o"></i></a>
                                            </figure>
                                        </div>
                                        <div class="col-md-7">
                                            <h2>Consetetur sadipscing elitr, sed diam nonumy</h2>
                                            <div class="kd-list-style icon-style">
                                                <ul>
                                                    <li><i class="fa fa-circle-o"></i> Lorem ipsum dolor sit amet, consetetur sadipscing elitr,</li>
                                                    <li><i class="fa fa-circle-o"></i> At vero eos et accusam et justo duo dolores et</li>
                                                    <li><i class="fa fa-circle-o"></i> Dolor sit amet, consetetur sadipscing elitr,</li>
                                                    <li><i class="fa fa-circle-o"></i> Vero eos et accusam et justo duo dolores et</li>
                                                    <li><i class="fa fa-circle-o"></i> Eos et accusam et justo duo dolores et</li>
                                                    <li><i class="fa fa-circle-o"></i> Psum dolor sit amet, consetetur sadipscing elitr,</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--// Image Frame //-->
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
                                    kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                    voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                                    nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor
                                    sit amet. </p>
                                <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit
                                    augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                                <h2>DAY 1</h2>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
                                    kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                    voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. </p>
                                <h2>DAY 2</h2>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
                                    kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                    voluptua.
                                </p>
                                <h2>DAY 3</h2>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
                                    kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt </p>
                            </div>

                            <!--// User Tag //-->
                            <div class="kd-user-tag">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="kd-tag">
                                            <span><i class="fa fa-tag"></i> Tags:</span>
                                            <ul>
                                                <li><a href="#">Videos</a></li>
                                                <li><a href="#">Wallpapers</a></li>
                                                <li><a href="#">Travel</a></li>
                                                <li><a href="#">Cruise</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--<div class="kd-social-network">
                                            <ul>
                                                <li><a href="#" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#" data-original-title="Tumblr"><i class="fa fa-tumblr"></i></a></li>
                                                <li><a href="#" data-original-title="Dribbble"><i class="fa fa-dribbble"></i></a></li>
                                                <li><a href="#" data-original-title="Youtube"><i class="fa fa-youtube"></i></a></li>
                                            </ul>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                            <!--// User Tag //-->

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
                                <img src="extraimages/hilton.jpg" alt="" draggable="false">
                            </figure>
                            <div class="agency-details">
                                <h2>Hilton Hotels and Resorts</h2>
                                <small>
                                    <i class="fa fa-map-marker"></i>
                                    <span>Baku, Azerbaijan</span>
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

                        <div class="widget widget_tab">
                            <div class="kd-widget-title">
                                <h2>Widget Tab</h2>
                            </div>
                            <div class="kd-bookingtab">

                                <!-- Nav tabs -->
                                <!--<ul class="nav nav-tabs" role="tablist">
                                    <li class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Recent Posts</a></li>
                                    <li><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Latest Posts</a></li>
                                </ul>-->

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!--<div role="tabpanel" class="tab-pane active" id="home">
                                        <div class="widget-blogpost">
                                            <ul>
                                                <li>
                                                    <figure>
                                                        <a href="#"><img alt="" src="extraimages/widget1.jpg"></a>
                                                    </figure>
                                                    <div class="kd-post-info">
                                                        <h6><a href="#">Watch this Chinese airport dummy...</a></h6>
                                                        <time datetime="2008-02-14 20:00">January 15, 2015</time>
                                                    </div>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <a href="#"><img alt="" src="extraimages/widget1.jpg"></a>
                                                    </figure>
                                                    <div class="kd-post-info">
                                                        <h6><a href="#">Watch this Chinese airport dummy...</a></h6>
                                                        <time datetime="2008-02-14 20:00">January 15, 2015</time>
                                                    </div>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <a href="#"><img alt="" src="extraimages/widget1.jpg"></a>
                                                    </figure>
                                                    <div class="kd-post-info">
                                                        <h6><a href="#">Watch this Chinese airport dummy...</a></h6>
                                                        <time datetime="2008-02-14 20:00">January 15, 2015</time>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>-->
                                    <!--<div role="tabpanel" class="tab-pane" id="profile">
                                        <div class="widget-blogpost">
                                            <ul>
                                                <li>
                                                    <figure>
                                                        <a href="#"><img alt="" src="extraimages/widget1.jpg"></a>
                                                    </figure>
                                                    <div class="kd-post-info">
                                                        <h6><a href="#">Watch this Chinese airport dummy...</a></h6>
                                                        <time datetime="2008-02-14 20:00">January 15, 2015</time>
                                                    </div>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <a href="#"><img alt="" src="extraimages/widget1.jpg"></a>
                                                    </figure>
                                                    <div class="kd-post-info">
                                                        <h6><a href="#">Watch this Chinese airport dummy...</a></h6>
                                                        <time datetime="2008-02-14 20:00">January 15, 2015</time>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>-->
                                </div>

                            </div>
                        </div>

                        <div class="widget widget_categories">
                            <div class="kd-widget-title">
                                <h2>Categories</h2>
                            </div>
                            <!--<ul>
                                <li><a href="#">Business</a> (25)</li>
                                <li><a href="#">Creative</a> (45)</li>
                                <li><a href="#">Ecommerce</a> (5)</li>
                                <li><a href="#">Photography</a> (2)</li>
                                <li><a href="#">Wordpress</a> (25)</li>
                                <li><a href="#">Business</a> (25)</li>
                                <li><a href="#">Creative</a> (45)</li>
                            </ul>-->
                        </div>
                        <div class="widget widget-blogpost">
                            <div class="kd-widget-title">
                                <h2>Our Latest Posts</h2>
                            </div>
                            <ul>
                                <li>
                                    <figure>
                                        <a href="#"><img src="extraimages/widget1.jpg" alt=""></a>
                                    </figure>
                                    <div class="kd-post-info">
                                        <h6><a href="#">Watch this Chinese airport dummy...</a></h6>
                                        <time datetime="2008-02-14 20:00">January 15, 2015</time>
                                    </div>
                                </li>
                                <li>
                                    <figure>
                                        <a href="#"><img src="extraimages/widget1.jpg" alt=""></a>
                                    </figure>
                                    <div class="kd-post-info">
                                        <h6><a href="#">Watch this Chinese airport dummy...</a></h6>
                                        <time datetime="2008-02-14 20:00">January 15, 2015</time>
                                    </div>
                                </li>
                                <li>
                                    <figure>
                                        <a href="#"><img src="extraimages/widget1.jpg" alt=""></a>
                                    </figure>
                                    <div class="kd-post-info">
                                        <h6><a href="#">Watch this Chinese airport dummy...</a></h6>
                                        <time datetime="2008-02-14 20:00">January 15, 2015</time>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="widget kd-gallery-widget">
                            <div class="kd-widget-title">
                                <h2>Flicker Gallery</h2>
                            </div>
                            <ul>
                                <li>
                                    <a href="#"><img src="extraimages/widget-gallery1.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="extraimages/widget-gallery2.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="extraimages/widget-gallery3.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="extraimages/widget-gallery5.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="extraimages/widget-gallery6.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="extraimages/widget-gallery2.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="extraimages/widget-gallery3.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="extraimages/widget-gallery5.jpg" alt=""></a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget widget_tag">
                            <div class="kd-widget-title">
                                <h2>Tag Cloud</h2>
                            </div>
                            <div class="kd-tag">
                                <a href="#">Clean</a>
                                <a href="#">Flexable</a>
                                <a href="#">Headline</a>
                                <a href="#">Clean</a>
                                <a href="#">Flexable</a>
                                <a href="#">Headline</a>
                            </div>
                        </div>

                    </aside>

                </div>
            </div>
        </section>
        <!--// Page Section //-->

    </div>
    <!--// Content //-->

@endsection