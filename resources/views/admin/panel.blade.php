@extends('admin.app')

@section('panel')
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
                                <a href="{{url('admin')}}" class="dashboard">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{url('getMyTours')}}" class="ui-elements">Tours</a>
                            </li>
                            <li>
                                <a href="{{url('addTour')}}" class="pages">New Tour</a>
                            </li>
                            <li>
                                <a href="{{url('getRequestsToMe')}}" class="mailbox">Requests<span class="label label-custom1">05</span></a>
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

@endsection