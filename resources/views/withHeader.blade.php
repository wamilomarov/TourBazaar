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
                                            <a class="lang_sel_sel icl-en" href="#">EN</a>
                                            <ul>
                                                <li class="icl-fr">
                                                    <a href="#">FR</a>
                                                </li>
                                                <li class="icl-de">
                                                    <a href="#">DE</a>
                                                </li>
                                                <li class="icl-nl">
                                                    <a href="#">NL</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div id="lang_sel">
                                    <ul>
                                        <li>
                                            <a class="lang_sel_sel icl-en" id="currency_sel" href="#">AZN</a>
                                            <ul>
                                                <li class="icl-fr">
                                                    <a href="#">AZN</a>
                                                </li>
                                                <li class="icl-de">
                                                    <a href="#">USD</a>
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
                                <i class="fa fa-phone"></i> Phone: +44 123 456 789
                            </li>
                            <li>
                                <i class="fa fa-envelope-o"></i> <a href="#">Email: Info@kodeforest.com</a>
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
                        <a href="index-2.html" class="logo"><img src="images/logo.png" alt=""></a>
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
                                        <li><a href="index-2.html">Home</a>
                                            <ul class="sub-dropdown">
                                                <li><a href="index-map.html">Map HomePage</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="#">Blog</a>
                                            <ul class="sub-dropdown">
                                                <li><a href="blog-grid.html">Blog Grid</a></li>
                                                <li><a href="blog-large.html">Blog Large</a></li>
                                                <li><a href="blog-medium.html">Blog Medium</a></li>
                                                <li><a href="blog-detail.html">Single Post Layout</a>
                                                    <ul class="sub-dropdown">
                                                        <li><a href="blog-detail-video.html">Video & Soundcloud</a></li>
                                                        <li><a href="blog-detail.html">Single Image Layout</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="package-list.html">Tour Packages</a>
                                            <ul class="sub-dropdown">
                                                <li><a href="package-list.html">Packages List</a></li>
                                                <li><a href="package-detail.html">Package Single Layout</a>
                                                    <ul class="sub-dropdown">
                                                        <li><a href="package-video.html">Video & Soundcloud</a></li>
                                                        <li><a href="package-detail.html">Package Single Image</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="gallery.html">Gallery</a>
                                            <ul class="sub-dropdown">
                                                <li><a href="gallery-2column.html">Gallery 2Column</a></li>
                                                <li><a href="gallery-3column.html">Gallery 3Column</a></li>
                                                <li><a href="gallery.html">Gallery 4Column</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Pages</a>
                                            <ul class="sub-dropdown">
                                                <li><a href="undercunstruction.html">Undercunstruction</a></li>
                                                <li><a href="404.html">404</a></li>
                                                <li><a href="services.html">Services</a></li>
                                                <li><a href="#">Team</a>
                                                    <ul class="sub-dropdown">
                                                        <li><a href="team-grid.html">Team Grid</a></li>
                                                        <li><a href="team-medium.html">Team Medium</a></li>
                                                        <li><a href="team-detail.html">Team Detail</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">ShortCode</a>
                                            <ul class="sub-dropdown">
                                                <li><a href="accordian.html">Accordian</a></li>
                                                <li><a href="button.html">Button</a></li>
                                                <li><a href="frame.html">Frame</a></li>
                                                <li><a href="list.html">list Style</a></li>
                                                <li><a href="message.html">Alert Message</a></li>
                                                <li><a href="sepratore.html">Sepratore</a></li>
                                                <li><a href="services.html">Services</a></li>
                                                <li><a href="skills.html">Skills</a></li>
                                                <li><a href="table.html">Table</a></li>
                                                <li><a href="tabs.html">Tabs</a></li>
                                                <li><a href="shortcode.html">Testimonial & Actions</a></li>
                                                <li><a href="video.html">Video</a></li>
                                                <li><a href="map.html">Map</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact-us.html">contact us</a></li>
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
                            <a href="#" class="formbtn">Find the tour</a>
                            <form action="" method="POST">
                                <ul>
                                    <li>
                                        <span>Country</span>
                                        <label>
                                            <select>
                                                <option>France</option>
                                                <option>Germany</option>
                                                <option>UK</option>
                                                <option>Cyprus</option>
                                            </select>
                                        </label>
                                    </li>
                                    <li>
                                        <span>City</span>
                                        <label>
                                            <select>
                                                <option>Paris</option>
                                                <option>Berlin</option>
                                                <option>London</option>
                                                <option>Nicosia</option>
                                            </select>
                                        </label>
                                    </li>
                                    <li>
                                        <span>Min price</span>
                                        <label>
                                            <select>
                                                <option>$ 1000</option>
                                                <option>$ 10000</option>
                                                <option>$ 20000</option>
                                                <option>$ 50000</option>
                                            </select>
                                        </label>
                                    </li>
                                    <li>
                                        <span>Max price</span>
                                        <label>
                                            <select>
                                                <option>$ 1000</option>
                                                <option>$ 10000</option>
                                                <option>$ 20000</option>
                                                <option>$ 50000</option>
                                            </select>
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