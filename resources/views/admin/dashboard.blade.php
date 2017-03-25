@extends('admin.panel')

@section('content')
    <div class="content-section">
        <div class="container-liquid">
            <div class="row">
                <div class="col-xs-2">
                    <div class="stat-box colorfour">
                        <i class="users">&nbsp;</i>
                        <h4>New requests</h4>
                        <h1>{{\Illuminate\Support\Facades\Auth::user()->requests()['0']->new_requests}}</h1>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="stat-box colortwo">
                        <i class="chart">&nbsp;</i>
                        <h4>Overall requests up to date</h4>
                        <h1>{{\Illuminate\Support\Facades\Auth::user()->requests()['0']->all_requests}}</h1>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="stat-box colorthree">
                        <i class="pages">&nbsp;</i>
                        <h4>Tours</h4>
                        <h1>{{$tours['count']['0']->count}}</h1>
                    </div>
                </div>

                @if(\Illuminate\Support\Facades\Auth::user()->status == 5)
                <div class="col-xs-12">
                    <div class="sec-box">
                        <a class="closethis">Close</a>
                        <header>
                            <h2 class="heading">New tours</h2>
                        </header>
                        <div class="contents">
                            <a class="togglethis">Toggle</a>
                            <div class="table-box">
                                <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
                                <div id="example_wrapper" class="dataTables_wrapper" role="grid">

                                    <table class="display table dataTable" id="example" aria-describedby="example_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                                rowspan="1" colspan="1" style="width: 163px;"
                                                aria-label="Rendering engine: activate to sort column ascending">
                                                Title
                                            </th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                                rowspan="1" colspan="1" style="width: 164px;"
                                                aria-label="Browser: activate to sort column ascending">
                                                Agency
                                            </th>
                                            <th class="sorting_desc" role="columnheader" tabindex="0"
                                                aria-controls="example" rowspan="1" colspan="1" style="width: 164px;"
                                                aria-sort="descending"
                                                aria-label="Platform(s): activate to sort column ascending">
                                                Price
                                            </th>
                                            <th class="center sorting" role="columnheader" tabindex="0"
                                                aria-controls="example" rowspan="1" colspan="1" style="width: 164px;"
                                                aria-label="Engine version: activate to sort column ascending">
                                                Hot Offer
                                            </th>
                                            <th class="center sorting" role="columnheader" tabindex="0"
                                                aria-controls="example" rowspan="1" colspan="1" style="width: 164px;"
                                                aria-label="CSS grade: activate to sort column ascending">
                                                Expire date
                                            </th>
                                            <th class="center sorting" role="columnheader" tabindex="0"
                                                aria-controls="example" rowspan="1" colspan="1" style="width: 164px;"
                                                aria-label="Action: activate to sort column ascending">Action
                                            </th>
                                        </tr>
                                        </thead>

                                        <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1"><input type="text" name="search_engine"
                                                                               value="Search engines"
                                                                               class="search_init"></th>
                                            <th rowspan="1" colspan="1"><input type="text" name="search_browser"
                                                                               value="Search browsers"
                                                                               class="search_init"></th>
                                            <th rowspan="1" colspan="1"><input type="text" name="search_platform"
                                                                               value="Search platforms"
                                                                               class="search_init"></th>
                                            <th rowspan="1" colspan="1"><input type="text" name="search_version"
                                                                               value="Search versions"
                                                                               class="search_init"></th>
                                            <th rowspan="1" colspan="1"><input type="text" name="search_grade"
                                                                               value="Search grades"
                                                                               class="search_init"></th>
                                        </tr>
                                        </tfoot>
                                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                                        @foreach($tours as $tour)
                                        <tr class="gradeA odd">
                                            <td class="">{{$tour->title}}</td>
                                            <td class=" ">{{$tour->agency}}</td>
                                            <td class="  sorting_1">{{$tour->price}}</td>
                                            <td class="center ">
                                                @if($tour->is_hot)
                                                    Yes
                                                @else
                                                    No
                                                @endif
                                            </td>
                                            <td class="center ">{{$tour->expire_date}}</td>
                                            <td class="center ">
                                                <a href="{{url('acceptTour', $tour->id)}}">
                                               <button type="button" class="btn btn-success " aria-label="Left Align">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                                </button>
                                                </a>
                                                <a  href="{{url('declineTour', $tour->id)}}">
                                                <button type="button" class="btn btn-danger ">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </button>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach

                                        </tbody>
                                    </table>

                                </div>
                                <script>
                                    var asInitVals = new Array();
                                    $(document).ready(function () {
                                        var oTable = $('#example').dataTable({
                                            "oLanguage": {
                                                "sSearch": "Search all columns:"
                                            }
                                        });

                                        $("tfoot input").keyup(function () {
                                            /* Filter on the column (the index) of this element */
                                            oTable.fnFilter(this.value, $("tfoot input").index(this));
                                        });


                                        /*
                                         * Support functions to provide a little bit of 'user friendlyness' to the textboxes in
                                         * the footer
                                         */
                                        $("tfoot input").each(function (i) {
                                            asInitVals[i] = this.value;
                                        });

                                        $("tfoot input").focus(function () {
                                            if (this.className == "search_init") {
                                                this.className = "";
                                                this.value = "";
                                            }
                                        });

                                        $("tfoot input").blur(function (i) {
                                            if (this.value == "") {
                                                this.className = "search_init";
                                                this.value = asInitVals[$("tfoot input").index(this)];
                                            }
                                        });
                                    });

                                </script>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                @endif

                @if(\Illuminate\Support\Facades\Auth::user()->status == 1)
                    <div class="col-xs-12">
                        <div class="sec-box">
                            <a class="closethis">Close</a>
                            <header>
                                <h2 class="heading">My tours</h2>
                            </header>
                            <div class="contents">
                                <a class="togglethis">Toggle</a>
                                <div class="table-box">
                                    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
                                    <div id="example_wrapper" class="dataTables_wrapper" role="grid">

                                        <table class="display table dataTable" id="example" aria-describedby="example_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                                    rowspan="1" colspan="1" style="width: 163px;"
                                                    aria-label="Rendering engine: activate to sort column ascending">
                                                    Title
                                                </th>
                                                <th class="sorting_desc" role="columnheader" tabindex="0"
                                                    aria-controls="example" rowspan="1" colspan="1" style="width: 164px;"
                                                    aria-sort="descending"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    Price
                                                </th>
                                                <th class="center sorting" role="columnheader" tabindex="0"
                                                    aria-controls="example" rowspan="1" colspan="1" style="width: 164px;"
                                                    aria-label="Engine version: activate to sort column ascending">
                                                    Hot Offer
                                                </th>
                                                <th class="center sorting" role="columnheader" tabindex="0"
                                                    aria-controls="example" rowspan="1" colspan="1" style="width: 164px;"
                                                    aria-label="CSS grade: activate to sort column ascending">
                                                    Expire date
                                                </th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                                    rowspan="1" colspan="1" style="width: 164px;"
                                                    aria-label="Browser: activate to sort column ascending">
                                                    Active
                                                </th>
                                                <th class="center sorting" role="columnheader" tabindex="0"
                                                    aria-controls="example" rowspan="1" colspan="1" style="width: 164px;"
                                                    aria-label="Action: activate to sort column ascending">
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>

                                            <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1"><input type="text" name="search_engine"
                                                                                   value="Search engines"
                                                                                   class="search_init"></th>
                                                <th rowspan="1" colspan="1"><input type="text" name="search_browser"
                                                                                   value="Search browsers"
                                                                                   class="search_init"></th>
                                                <th rowspan="1" colspan="1"><input type="text" name="search_platform"
                                                                                   value="Search platforms"
                                                                                   class="search_init"></th>
                                                <th rowspan="1" colspan="1"><input type="text" name="search_version"
                                                                                   value="Search versions"
                                                                                   class="search_init"></th>
                                                <th rowspan="1" colspan="1"><input type="text" name="search_grade"
                                                                                   value="Search grades"
                                                                                   class="search_init"></th>
                                            </tr>
                                            </tfoot>
                                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                            @foreach($tours['tours'] as $tour)
                                                <tr class="gradeA odd">
                                                    <td class="">{{$tour->title}}</td>
                                                    <td class="  sorting_1">{{$tour->price}}</td>
                                                    <td class="center ">
                                                        @if($tour->is_hot)
                                                            Yes
                                                        @else
                                                            No
                                                        @endif
                                                    </td>
                                                    <td class="center ">{{$tour->expire_date}}</td>
                                                    <td class="center ">
                                                        @if($tour->status == 1)
                                                            Yes
                                                        @else
                                                            No
                                                        @endif
                                                    </td>
                                                    <td class="center ">
                                                        <a href="{{url('acceptTour', $tour->id)}}">
                                                            <button type="button" class="btn btn-success " aria-label="Left Align">
                                                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                                            </button>
                                                        </a>
                                                        <a  href="{{url('declineTour', $tour->id)}}">
                                                            <button type="button" class="btn btn-danger ">
                                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                            </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>

                                    </div>
                                    <script>
                                        var asInitVals = new Array();
                                        $(document).ready(function () {
                                            var oTable = $('#example').dataTable({
                                                "oLanguage": {
                                                    "sSearch": "Search all columns:"
                                                }
                                            });

                                            $("tfoot input").keyup(function () {
                                                /* Filter on the column (the index) of this element */
                                                oTable.fnFilter(this.value, $("tfoot input").index(this));
                                            });


                                            /*
                                             * Support functions to provide a little bit of 'user friendlyness' to the textboxes in
                                             * the footer
                                             */
                                            $("tfoot input").each(function (i) {
                                                asInitVals[i] = this.value;
                                            });

                                            $("tfoot input").focus(function () {
                                                if (this.className == "search_init") {
                                                    this.className = "";
                                                    this.value = "";
                                                }
                                            });

                                            $("tfoot input").blur(function (i) {
                                                if (this.value == "") {
                                                    this.className = "search_init";
                                                    this.value = asInitVals[$("tfoot input").index(this)];
                                                }
                                            });
                                        });

                                    </script>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <!-- Row End -->
        </div>
    </div>

@endsection