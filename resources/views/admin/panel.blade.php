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
                            <a href="dashboard1.html"><img src="assets/images/logo.png" alt="Adminise"/></a>
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
                                <a href="{{url('getTours')}}" class="ui-elements">Tours</a>
                            </li>
                            @if(\Illuminate\Support\Facades\Auth::user()->status == 5)
                                <li>
                                    <a href="{{url('getAgencies')}}" class="extras">Agencies</a>
                                </li>
                                <li>
                                    <a href="{{url('addAgency')}}" class="loginoptions">New Agency</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{url('addTour')}}" class="pages">New Tour</a>
                                </li>
                            @endif
                            <li>
                                <a href="{{url('getRequests')}}" class="mailbox">Requests
                                    @if(\Illuminate\Support\Facades\Auth::user()->requests()['0']->new_requests > 0)
                                    <span class="label label-custom1">{{\Illuminate\Support\Facades\Auth::user()->requests()['0']->new_requests}}</span>
                                    @endif
                                </a>
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
                        @if( \Illuminate\Support\Facades\Auth::check())
                        <figure>

                            <img src="uploads/cover_images/{{\Illuminate\Support\Facades\Auth::user()->cover_image}}" alt="Adminise"/>

                        </figure>
                        <div class="welcome">
                            <p>Welcome</p>
                            <h5><a href="{{url('updateProfile')}}">{{\Illuminate\Support\Facades\Auth::user()->name}}</a></h5>
                        </div>
                        @endif
                    </div>
                    <!-- User Section End -->

                    <!-- Header Top Navigation Start -->
                    <nav class="topnav">
                        <ul id="nav1">
                            @if(\Illuminate\Support\Facades\Auth::user()->status == 5)
                                <li class="notifi">
                                    <a href="#"><i
                                                class="glyphicon glyphicon-bell"></i>Notifications<span>(04)</span></a>
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
                            @endif
                            <li class="inbox">
                                <a href="inbox.html"><i class="glyphicon glyphicon-envelope"></i>Inbox<span>(03)</span></a>
                            </li>
                            <li class="settings">
                                <a href="#"><i class="glyphicon glyphicon-wrench"></i>Settings</a>
                                <div class="popdown popdown-right settings">
                                    <nav>
                                        @if(\Illuminate\Support\Facades\Auth::user()->status != 5)
                                        <a href="#"><i class="glyphicon glyphicon-user"></i>Your Profile</a>
                                        <a href="#"><i class="glyphicon glyphicon-pencil"></i>Edit Account</a>
                                        @endif
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                                    class="glyphicon glyphicon-log-out"></i>Log out</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
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