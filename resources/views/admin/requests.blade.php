@extends('admin.panel')

@section('content')
    <div class="content-section">
        <div class="container-liquid">
            <div class="row">

                @if(\Illuminate\Support\Facades\Auth::user()->status == 5)
                    <div class="col-xs-12">
                        <div class="sec-box">
                            <a class="closethis">Close</a>
                            <header>
                                <h2 class="heading">Requests</h2>
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
                                                    Full Name
                                                </th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                                    rowspan="1" colspan="1" style="width: 164px;"
                                                    aria-label="Browser: activate to sort column ascending">
                                                    Email
                                                </th>
                                                <th class="sorting_desc" role="columnheader" tabindex="0"
                                                    aria-controls="example" rowspan="1" colspan="1" style="width: 164px;"
                                                    aria-sort="descending"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    Phone
                                                </th>
                                                <th class="center sorting" role="columnheader" tabindex="0"
                                                    aria-controls="example" rowspan="1" colspan="1" style="width: 164px;"
                                                    aria-label="Engine version: activate to sort column ascending">
                                                    Agency
                                                </th>
                                                <th class="center sorting" role="columnheader" tabindex="0"
                                                    aria-controls="example" rowspan="1" colspan="1" style="width: 164px;"
                                                    aria-label="CSS grade: activate to sort column ascending">
                                                    Tour
                                                </th>
                                                <th class="center sorting" role="columnheader" tabindex="0"
                                                    aria-controls="example" rowspan="1" colspan="1" style="width: 164px;"
                                                    aria-label="CSS grade: activate to sort column ascending">
                                                    Date
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
                                                                                   value="Search"
                                                                                   class="search_init"></th>
                                                <th rowspan="1" colspan="1"><input type="text" name="search_browser"
                                                                                   value="Search"
                                                                                   class="search_init"></th>
                                                <th rowspan="1" colspan="1"><input type="text" name="search_platform"
                                                                                   value="Search"
                                                                                   class="search_init"></th>
                                                <th rowspan="1" colspan="1"><input type="text" name="search_version"
                                                                                   value="Search"
                                                                                   class="search_init"></th>
                                                <th rowspan="1" colspan="1"><input type="text" name="search_grade"
                                                                                   value="Search"
                                                                                   class="search_init"></th>
                                                <th rowspan="1" colspan="1"><input type="text" name="search_grade"
                                                                                   value="Search"
                                                                                   class="search_init"></th>
                                            </tr>
                                            </tfoot>
                                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                            @foreach($requests as $req)
                                                <tr class="gradeA odd">
                                                    <td class="">{{$req->client_full_name}}</td>
                                                    <td class="  sorting_1">{{$req->client_email}} </td>
                                                    <td class="center ">{{$req->client_phone}}</td>
                                                    <td class="center ">{{$req->user_name}}</td>
                                                    <td class="center ">{{$req->tour_name}}</td>
                                                    <td class="center ">{{date("d M Y",strtotime($req->date))}}</td>
                                                    <td class="center ">
                                                        <a  href="{{url('removeRequest', $req->id)}}">
                                                            <button type="button" class="btn btn-danger ">
                                                                <span class="glyphicon glyphicon-remove" aria-hidden="true">
                                                                    Remove</span>
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
                                <h2 class="heading">Requests</h2>
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
                                                    Full Name
                                                </th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                                    rowspan="1" colspan="1" style="width: 164px;"
                                                    aria-label="Browser: activate to sort column ascending">
                                                    Email
                                                </th>
                                                <th class="sorting_desc" role="columnheader" tabindex="0"
                                                    aria-controls="example" rowspan="1" colspan="1" style="width: 164px;"
                                                    aria-sort="descending"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    Phone
                                                </th>
                                                <th class="center sorting" role="columnheader" tabindex="0"
                                                    aria-controls="example" rowspan="1" colspan="1" style="width: 164px;"
                                                    aria-label="CSS grade: activate to sort column ascending">
                                                    Tour
                                                </th>
                                                <th class="center sorting" role="columnheader" tabindex="0"
                                                    aria-controls="example" rowspan="1" colspan="1" style="width: 164px;"
                                                    aria-label="CSS grade: activate to sort column ascending">
                                                    Date
                                                </th>
                                            </tr>
                                            </thead>

                                            <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1"><input type="text" name="search_engine"
                                                                                   value="Search"
                                                                                   class="search_init"></th>
                                                <th rowspan="1" colspan="1"><input type="text" name="search_browser"
                                                                                   value="Search"
                                                                                   class="search_init"></th>
                                                <th rowspan="1" colspan="1"><input type="text" name="search_platform"
                                                                                   value="Search"
                                                                                   class="search_init"></th>
                                                <th rowspan="1" colspan="1"><input type="text" name="search_version"
                                                                                   value="Search"
                                                                                   class="search_init"></th>
                                                <th rowspan="1" colspan="1"><input type="text" name="search_grade"
                                                                                   value="Search"
                                                                                   class="search_init"></th>
                                            </tr>
                                            </tfoot>
                                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                            @foreach($requests as $req)
                                                <tr class="gradeA odd">
                                                    <td class="">{{$req->client_full_name}}</td>
                                                    <td class="  sorting_1">{{$req->client_email}} </td>
                                                    <td class="center ">{{$req->client_phone}}</td>
                                                    <td class="center ">{{$req->tour_name}}</td>
                                                    <td class="center ">{{date("d M Y",strtotime($req->date))}}</td>
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