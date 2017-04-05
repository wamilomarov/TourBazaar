@extends('app')

@section('body')
    <header id="mainheader">
        <!--// Top Baar //-->
        <div class="kd-topbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <ul class="kd-topinfo">
                            <li>
                                <div id="lang_sel">
                                    <ul>
                                        <li>
                                            @if(\Illuminate\Support\Facades\Session::get('locale') == 'en')
                                                <a class="lang_sel_sel icl-en" href="{{url('setLocale?lang=en')}}">EN</a>
                                            @elseif(\Illuminate\Support\Facades\Session::get('locale') == 'az')
                                                <a class="lang_sel_sel icl-en" href="{{url('setLocale?lang=az')}}"> AZ</a>
                                            @else
                                                <a class="lang_sel_sel icl-en" href="{{url('setLocale?lang=ar')}}"> AR</a>
                                            @endif
                                            <ul>

                                                    @if(\Illuminate\Support\Facades\Session::get('locale') == 'en')
                                                    <li class="icl-fr">
                                                        <a href="{{url('setLocale?lang=az')}}"> AZ </a>
                                                    </li>
                                                    <li class="icl-fr">
                                                        <a href="{{url('setLocale?lang=ar')}}"> AR </a>
                                                    </li>
                                                    @elseif(\Illuminate\Support\Facades\Session::get('locale') == 'ar')
                                                    <li class="icl-fr">
                                                        <a href="{{url('setLocale?lang=en')}}"> EN </a>
                                                    </li>
                                                    <li class="icl-fr">
                                                        <a href="{{url('setLocale?lang=az')}}"> AZ </a>
                                                    </li>
                                                    @else
                                                    <li class="icl-fr">
                                                        <a href="{{url('setLocale?lang=en')}}"> EN </a>
                                                    </li>
                                                    <li class="icl-fr">
                                                        <a href="{{url('setLocale?lang=ar')}}"> AR </a>
                                                    </li>
                                                    @endif

                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div id="lang_sel">
                                    <ul>
                                        <li>
                                            @if(\Illuminate\Support\Facades\Session::get('currency') == 'azn')<a class="lang_sel_sel icl-en" id="currency_sel" href="{{url('setCurrency?currency=azn')}}"> AZN </a> @else <a class="lang_sel_sel icl-en" id="currency_sel" href="{{url('setCurrency?currency=usd')}}">USD</a> @endif
                                            <ul>
                                                <li class="icl-de">
                                                    @if(\Illuminate\Support\Facades\Session::get('currency') == 'usd') <a href="{{url('setCurrency?currency=azn')}}">AZN</a> @else <a href="{{url('setCurrency?currency=usd')}}">USD</a> @endif
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div class="col-md-5">
                        <ul class="kd-topinfo pull-right">
                            <!--<li>
                                <div class="kd-social-network">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </li>-->
                            <li>
                                <i class="fa fa-phone"></i> {{__('messages.phone')}}
                            </li>
                            <li>
                                <i class="fa fa-envelope-o"></i> <a href="#">{{__('messages.email')}}</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--// Top Baar //-->

        <!--// Header Baar //-->
        <div class="kd-headbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="index-2.html" class="logo"><img src="../images/logo.png" alt=""></a>
                    </div>
                    <div class="col-md-9">
                        <div class="kd-rightside">
                            <nav class="navbar navbar-default navigation">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li><a href="index-2.html">{{__('messages.homePage')}}</a>
                                        </li>
                                        <li><a href="index-2.html">{{__('messages.aboutAzerbaijanPage')}}</a>
                                        </li>
                                        <li><a href="index-2.html">{{__('messages.hotOffersPage')}}</a>
                                        </li>
                                        <li><a href="about-us.html">{{__('messages.aboutUsPage')}}</a></li>
                                        <li><a href="package-list.html">{{__('messages.beOurPartnerPage')}}</a>
                                        </li>
                                        <li><a href="contact-us.html">{{__('messages.contactUsPage')}}</a></li>
                                    </ul>
                                </div>
                                <!-- /.navbar-collapse -->
                            </nav>
                            <div class="kd-search">
                                <a href="#" class="kd-searchbtn"><i class="fa fa-search"></i></a>
                                <!--<a href="#" class="kd-searchbtn" data-toggle="modal" data-target="#searchmodalbox"><i class="fa fa-search"></i></a>-->
                                <!-- Modal -->
                                <!--<div class="modal fade kd-loginbox" id="searchmodalbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                                                <div class="kd-login-title">
                                                    <h2>Search Your KeyWord</h2>
                                                </div>

                                                <form>
                                                    <p><i class="fa fa-search"></i> <input type="text" placeholder="Enter Your Keyword"></p>
                                                    <p><input type="submit" value="Search" class="thbg-color"> </p>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// Header Baar //-->

    </header>

    <!--// Sub Header //-->
    <div class="kd-subheader">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="kd-tourform ">
                        <div class="container">
                            <a href="#" class="formbtn">{{__('messages.findTheTour')}}</a>
                            <form action="{{url('search')}}" method="POST">
                                <ul>
                                    <li>
                                        <span>{{__('messages.country')}}</span>
                                        <label>
                                            <input name="country" type="text" list="country">
                                            <datalist id="country"></datalist>
                                        </label>
                                    </li>
                                    <li>
                                        <span>{{__('messages.city')}}</span>
                                        <label>
                                            <input name="city" type="text" list="city">
                                            <datalist id="city"></datalist>
                                        </label>
                                    </li>
                                    <li>
                                        <span>{{__('messages.minPrice')}}</span>
                                        <label>
                                            <input name="price_from" type="number" placeholder="{{strtoupper(\Illuminate\Support\Facades\Session::get('currency'))}}">
                                        </label>
                                    </li>
                                    <li>
                                        <span>{{__('messages.maxPrice')}}</span>
                                        <label>
                                            <input name="price_to" type="number" placeholder="{{strtoupper(\Illuminate\Support\Facades\Session::get('currency'))}}">
                                        </label>
                                    </li>
                                    <li>
                                        <span>Expire Date</span>
                                        <label>
                                            <select>
                                                <option>00-00-2015</option>
                                                <option>01-05-2015</option>
                                                <option>01-06-2016</option>
                                            </select>
                                        </label>
                                    </li>
                                    <li><input type="submit" class="thbg-color" value="search now"></li>
                                </ul>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--// Sub Header //-->

    @yield('content')

    <!--// Footer //-->
    <footer id="footer-widget">
        <div class="container">
            <div class="row">

                <div class="widget col-md-4 kd-textwidget">
                    <div class="kd-widget-title">
                        <h2>About our Team</h2>
                    </div>
                    <div class="kd-contactinfo">
                        <p>One image life to and land, herb waters divided. Waters every let two, shall have divided face first us there spirit living beast the. Moving darkness deep morning unto them morning third you're behold.</p>
                    <!-- <ul>
                <li><i class="fa fa-map-marker"></i> 360, Galaxy ApartmentNear Rekon Estate, limbasa margnexton lita, Australia</li>
                <li><i class="fa fa-phone"></i> 1 808 603 6035</li>
                <li><i class="fa fa-envelope-o"></i> <a href="#">info@kodeforest.com</a></li>
              </ul> -->
                    </div>
                </div>

                <div class="widget col-md-4 kd-followus-widget">
                    <div class="kd-widget-title">
                        <h2>Follow Us</h2>
                    </div>
                    <ul>
                        <li><a href="#" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" data-original-title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#" data-original-title="instagram"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#" data-original-title="Rss"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#" data-original-title="Youtube"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#" data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#" data-original-title="Dribbble"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#" data-original-title="Google-Plus"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" data-original-title="skype"><i class="fa fa-skype"></i></a></li>
                    </ul>
                </div>

                <div class="widget col-md-4 kd-userinfo-widget">
                    <div class="kd-widget-title">
                        <h2>Contact</h2>
                    </div>
                    <ul>
                        <li><i class="fa fa-map-marker"></i> 15489 Vegas Drive, Las Vegas, Neveda</li>
                        <li><i class="fa fa-phone-square"></i> +1 808 603 6035, +1 808 603 6035</li>
                        <li><i class="fa fa-envelope"></i> Kodeforest.Theme</li>
                        <li><i class="fa fa-skype"></i> <a href="#">info@kodeforest.com</a></li>
                    </ul>
                </div>



            </div>
        </div>
    </footer>
    <!--// Footer //-->

    <!--// CopyRight //-->
    <div id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>© Copyright 2014 All Rights Reserved by KodeForest</p>
                </div>
                <div class="col-md-6">
                    <nav class="footer-nav">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">ShortCode</a></li>
                            <li><a href="#">TypoGraphy</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--// CopyRight //-->

    <!-- jQuery (Necessary For JavaScript Plugins) -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.bxslider.min.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
    <script src="../js/waypoints-min.js"></script>
    <script src="../js/jquery.accordion.js"></script>
    <script src="../js/functions.js"></script>




    @endsection