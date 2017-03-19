<!DOCTYPE HTML>
<html>

<!-- Mirrored from www.extracoding.com/demo/html/adminise/layouts1.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Mar 2017 21:54:23 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Adminise - Clean And Corporate Admin Panel Template</title>
    <!--// Stylesheets //-->
    <link href="assets/css/style.css" rel="stylesheet" media="screen" />
    <link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />
    <link href="css/bootstrap-tagsinput.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!--// Javascript //-->
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.accordion.js"></script>
    <script type="text/javascript" src="assets/js/jquery.custom-scrollbar.min.js"></script>
    <script type="text/javascript" src="assets/js/icheck.min.js"></script>
    <script type="text/javascript" src="assets/js/selectnav.min.js"></script>
    <script type="text/javascript" src="assets/js/functions.js"></script>
    <script type="text/javascript" src="js/bootstrap-tagsinput.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

    <script>
        function getCities() {
            console.log('d');
            if ($('#countries').val().length > 1){
                var country = $(this).val();
                console.log(country);
                // $.ajax({url: "/getCities/" + country, success: function(result){
                //     $("#div1").html(result);
                // }});
            }
        }
    </script>
    <![endif]-->
</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">
    <div class="structure-row">
        <!-- Sidebar Start -->
        <aside class="sidebar">
            <div class="sidebar-in">
                <!-- Sidebar Header Start -->
                <header>
                    <!-- Logo Start -->
                    <div class="logo">
                        <a href="dashboard1.html"><img src="assets/images/logo.png" alt="Adminise" /></a>
                    </div>
                    <!-- Logo End -->
                    <!-- Toggle Button Start -->
                    <a href="#" class="togglemenu">&nbsp;</a>
                    <!-- Toggle Button End -->
                    <div class="clearfix"></div>
                </header>
                <!-- Sidebar Header End -->
                <!-- Sidebar Navigation Start -->
                <nav class="navigation">
                    <ul class="navi-acc" id="nav2">
                        <li>
                            <a href="#dashboard" class="dashboard">Dashboard</a>
                        </li>
                        <li>
                            <a href="#layouts" class="ui-elements">Tours</a>
                        </li>
                        <li>
                            <a href="{{url('addTour')}}" class="pages">New Tour</a>
                        </li>
                        <li>
                            <a href="#mailbox" class="mailbox">Requests<span class="label label-custom1">05</span></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </nav>
                <!-- Sidebar Navigation End -->
                <!-- Shadow Start -->
                <span class="shadows"></span>
                <!-- Shadow End -->
            </div>
        </aside>
        <!-- Sidebar End -->
        <!-- Right Section Start -->
        <div class="right-sec">
            <!-- Right Section Header Start -->
            <header>
                <!-- User Section Start -->
                <div class="user">
                    <figure>
                        <a href="#"><img src="uploads/cover_images/{{$user->cover_image}}" alt="Adminise" /></a>
                    </figure>
                    <div class="welcome">
                        <p>Welcome</p>
                        <h5><a href="#">{{$user->name}}</a></h5>
                    </div>
                </div>
                <!-- User Section End -->

                <!-- Header Top Navigation Start -->
                <nav class="topnav">
                    <ul id="nav1">
                        <li class="tasks">
                            <a href="#"><i class="glyphicon glyphicon-check"></i>Tasks<span>(04)</span></a>
                            <div class="popdown">
                                <div class="taskslist">
                                    <ul>
                                        <li>
                                            <h6><a href="#">Vel lundium natoque</a><span class="pull-right">25%</span></h6>
                                            <div class="progress">
                                                <div style="width: 15%" class="progress-bar progress-bar-success">
                                                    <span class="sr-only">35% Complete (success)</span>
                                                </div>
                                                <div style="width: 5%" class="progress-bar progress-bar-warning">
                                                    <span class="sr-only">20% Complete (warning)</span>
                                                </div>
                                                <div style="width: 5%" class="progress-bar progress-bar-danger">
                                                    <span class="sr-only">10% Complete (danger)</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <h6><a href="#">Vel lundium natoque</a><span class="pull-right">75%</span></h6>
                                            <div class="progress">
                                                <div style="width: 30%" class="progress-bar progress-bar-success">
                                                    <span class="sr-only">35% Complete (success)</span>
                                                </div>
                                                <div style="width: 30%" class="progress-bar progress-bar-warning">
                                                    <span class="sr-only">20% Complete (warning)</span>
                                                </div>
                                                <div style="width: 15%" class="progress-bar progress-bar-danger">
                                                    <span class="sr-only">10% Complete (danger)</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <h6><a href="#">Vel lundium natoque</a><span class="pull-right">52%</span></h6>
                                            <div class="progress">
                                                <div style="width: 30%" class="progress-bar progress-bar-success">
                                                    <span class="sr-only">35% Complete (success)</span>
                                                </div>
                                                <div style="width: 15%" class="progress-bar progress-bar-warning">
                                                    <span class="sr-only">20% Complete (warning)</span>
                                                </div>
                                                <div style="width: 7%" class="progress-bar progress-bar-danger">
                                                    <span class="sr-only">10% Complete (danger)</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <h6><a href="#">Vel lundium natoque</a><span class="pull-right">90%</span></h6>
                                            <div class="progress">
                                                <div style="width: 30%" class="progress-bar progress-bar-success">
                                                    <span class="sr-only">35% Complete (success)</span>
                                                </div>
                                                <div style="width: 30%" class="progress-bar progress-bar-warning">
                                                    <span class="sr-only">20% Complete (warning)</span>
                                                </div>
                                                <div style="width: 30%" class="progress-bar progress-bar-danger">
                                                    <span class="sr-only">10% Complete (danger)</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <a href="#" class="viewall">View All Tasks</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </li>
                        <li class="notifi">
                            <a href="#"><i class="glyphicon glyphicon-bell"></i>Notifications</a>
                            <div class="popdown">
                                <div class="notificationlist">
                                    <ul>
                                        <li>
                                            <h6><a href="#">Vel lundium natoque</a></h6>
                                            <p>In parturient! Vel lundium natoque</p>
                                            <span><i class="glyphicon glyphicon-time"></i>2hrs ago</span>
                                        </li>
                                        <li>
                                            <h6><a href="#">Vel lundium natoque</a></h6>
                                            <p>In parturient! Vel lundium natoque</p>
                                            <span><i class="glyphicon glyphicon-time"></i>2hrs ago</span>
                                        </li>
                                        <li>
                                            <h6><a href="#">Vel lundium natoque</a></h6>
                                            <p>In parturient! Vel lundium natoque</p>
                                            <span><i class="glyphicon glyphicon-time"></i>2hrs ago</span>
                                        </li>
                                        <li>
                                            <h6><a href="#">Vel lundium natoque</a></h6>
                                            <p>In parturient! Vel lundium natoque</p>
                                            <span><i class="glyphicon glyphicon-time"></i>2hrs ago</span>
                                        </li>
                                    </ul>
                                    <a href="#" class="viewall">View All Notifications</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </li>
                        <li class="inbox">
                            <a href="inbox.html"><i class="glyphicon glyphicon-envelope"></i>Inbox<span>(03)</span></a>
                        </li>
                        <li class="settings">
                            <a href="#"><i class="glyphicon glyphicon-wrench"></i>Settings</a>
                            <div class="popdown popdown-right settings">
                                <nav>
                                    <a href="#"><i class="glyphicon glyphicon-user"></i>Your Profile</a>
                                    <a href="#"><i class="glyphicon glyphicon-pencil"></i>Edit Account</a>
                                    <a href="#"><i class="glyphicon glyphicon-question-sign"></i>Get Help</a>
                                    <a href="#"><i class="glyphicon glyphicon-log-out"></i>Log out</a>
                                </nav>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Header Top Navigation End -->
                <div class="clearfix"></div>
            </header>
            <!-- Right Section Header End -->
            <!-- Content Section Start -->
            @yield('content')
            <!-- Content Section End -->
        </div>
        <!-- Right Section End -->
    </div>
</div>
<!-- Wrapper End -->

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-42761673-1', 'extracoding.com');
    ga('send', 'pageview');

</script>

</body>

<!-- Mirrored from www.extracoding.com/demo/html/adminise/layouts1.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Mar 2017 21:54:26 GMT -->
</html>
